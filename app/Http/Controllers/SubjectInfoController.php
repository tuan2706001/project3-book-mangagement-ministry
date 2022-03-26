<?php

namespace App\Http\Controllers;

use Book;
use Illuminate\Http\Request;
use App\Models\SubjectInfo;
use App\Models\Subject;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SubjectInfoController extends Controller
{
    //Create Major's subject
    public function CreateSubjectMajor(Request $request)
    {   //create
        $major = Major::all();
        $idMajor = $request->major;
        //SELECT * FROM `subject` WHERE sub_id NOT IN (SELECT sub_id FROM subjectinfo WHERE ma_id = 1)
        $subject = DB::select('SELECT * FROM `subject` WHERE sub_id NOT IN (SELECT sub_id FROM subjectinfo WHERE ma_id = :maID)', ['maID' => $idMajor]);
        return view('major.createe', [
            'subject' => $subject,
            'idMajor' => $idMajor
        ]);
    }
    public function StoreSubjectMajor(Request $request)
    {


        $insert = DB::table('subjectInfo')->insert([
            'sub_id' => $request->sub_id,
            'ma_id' => $request->ma_id,
        ]);
        return Redirect::route('major.index');
    }
}
