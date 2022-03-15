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
}
