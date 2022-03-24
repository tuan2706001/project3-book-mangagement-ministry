<?php

namespace App\Http\Controllers;

use Book;
use Illuminate\Http\Request;
use App\Models\SubjectInfo;
use App\Models\Subject;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class SubjectInfoController extends Controller
{
    //Display Major's subject list
    public function showSubjectList(Request $request)
    {   //show
        $idMajor = $request->get("ma_id");
        $subject = Subject::all();
        $subjectinfo = DB::table('subjectinfo')
            ->join('major', 'major.ma_id', '=', 'subjectinfo.ma_id')
            ->join('subject', 'subject.sub_id', '=', 'subjectinfo.sub_id')
            ->select('subjectinfo.sub_id')->where('major.ma_id', '=', $idMajor)->get();
        return $idMajor;
    }
}
