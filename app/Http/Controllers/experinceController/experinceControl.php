<?php

namespace App\Http\Controllers\experinceController;

use App\Http\Controllers\Controller;
use App\Models\experinceModel;
use Illuminate\Http\Request;

class experinceControl extends Controller
{
    public function index()
    {
        $data=experinceModel::all();
        return view('admin.pages.experince.experinceList',compact('data'));
    }

    public function add()
    {

        return view('admin.pages.experince.experincedd');
    }

    public function save(Request $request)
    {

        $data = $request->validate([
            'experinceName' => 'required|max:25|min:3',
            'experinceSection' => 'required',
            'experinceDate' => 'max:225',
            'status' => ''
        ]);

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }
        experinceModel::create([
            'experinceName' => $request->experinceName,
            'experinceSection' => $request->experinceSection,
            'experinceDescriptions' => $request->experinceDescriptions,
            'experinceDate' => $request->experinceDate,
            'status' => $status,
        ]);
        alert()->success('Başarılı', 'Kayıt İşlemi Tamamlandı')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);

        return redirect()->route('manager.experince.list');

    }

    public  function  delete (Request $request ){
        $id = $request->data;
        $delete=experinceModel::where('id', $id)->delete();
        return response()->json(['silme işlemi  başarılı'], 200);
    }

    public  function  changeStatus(Request $request){
        $newStatus = null;
        $id = $request->data;
        $change=experinceModel::find($id);
        $status = $change->status;

        if ($status) {
            $status = 0;
            $newStatus = 'Pasif';
        } else {
            $status = 1;
            $newStatus = 'Aktif';
        }
        $change->status = $status;
        $change->save();

        return response()->json([
            'newStatus' => $newStatus,
            'data' => $id,
            'status' => $status
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->experinceId;

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

       $data=experinceModel::where('id',$id)->update([

           'experinceName'=>$request->experinceName,
           "experinceSection" => $request->experinceSection,
           "experinceDate" => $request->experinceDate,
           'experinceDescriptions'=>$request->experinceDescriptions,
           "status" => $status
       ]);






        alert()->success('Başarılı', 'Güncelleme İşlemi Tamamlandı')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);

        return redirect()->route('manager.experince.list');

    }

    public function update(Request $request)
    {


        $id = $request->experinceId;

        $data = experinceModel::findOrFail($id);


        return view('admin.pages.experince.experinceddEdit', compact('data'));

    }

    public function addPost(Request $request)
    {

        $data = $request->validate([
            'edicationDate' => 'required|max:25|min:3',
            'edicationUniversity' => 'required',
            'edicationSection' => 'required',
            'edicationDescriptions' => 'max:225',
            'status' => ''
        ]);
        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        experinceModel::create([
            "edicationDate" => $request->edicationDate,
            "edicationUniversity" => $request->edicationUniversity,
            "edicationSection" => $request->edicationSection,
            "edicationDescriptions" => $request->edicationDescriptions,
            "status" => $status

        ]);

        alert()->success('Başarılı', 'Kayıt İşlemi Tamamlandı')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);

        return redirect()->route('manager.education.list');

    }

}
