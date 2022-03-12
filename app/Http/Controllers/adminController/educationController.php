<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\educationModel;
use Illuminate\Http\Request;

class educationController extends Controller
{
    public function list()
    {
        $data=educationModel::all();
        return view('admin.pages.educations.educationList',compact('data'));
    }

    public function add()
    {
        return view('admin.pages.educations.educationAdd');
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

        educationModel::create([
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
