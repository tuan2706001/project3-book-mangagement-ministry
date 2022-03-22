<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classes;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Book;
use App\Models\Ministry;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::count();
        $major = Major::count();
        $grade = Classes::count();
        $student = Student::count();
        $subject = Subject::count();
        $ministry = Ministry::count();
        $book = Book::count();

        // $courses = DB::table('course')->count();
        // $majors = DB::table('major')->count();
        // $grades = DB::table('grade')->count();
        // $students = DB::table('student')->count();
        // $subjects = DB::table('subject')->count();

        return view('dashboard.index', [
            "course" => $course,
            "major" => $major,
            "grade" => $grade,
            "student" => $student,
            "subject" => $subject,
            "ministry" => $ministry,
            "book" => $book,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
