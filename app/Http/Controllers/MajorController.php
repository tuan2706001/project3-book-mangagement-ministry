<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\SubjectInfo;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $majors = Major::where('ma_name', 'like', "%$search%")->orderBy('ma_id', 'asc')->paginate(3);
        return view('major.index', [
            "majors" => $majors,
            "search" => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $major = new Major();
        $major->ma_name = $name;
        $major->save();
        return Redirect::route('major.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $count = SubjectInfo::where('ma_id', '=', $id)->count();;
        $idMajor = $id;
        $subject = Subject::all();
        $subjectinfo = DB::table('subjectinfo')
            ->join('major', 'major.ma_id', '=', 'subjectinfo.ma_id')
            ->join('subject', 'subject.sub_id', '=', 'subjectinfo.sub_id')
            ->select('subjectinfo.sub_id', 'subject.sub_name', 'subject.duration', 'major.ma_name')->where('major.ma_id', '=', $idMajor)->get();

        return view('major.show', [
            "subjectinfo" => $subjectinfo,
            "count" => $count,
            "idMajor" => $idMajor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::find($id);
        return view('major.edit', [
            "major" => $major
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $major = Major::find($id);
        $major->ma_name = $request->get('name');
        $major->save();
        return Redirect::route('major.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubjectInfo::find($id)->delete();
        return view('major.show');
    }
}
