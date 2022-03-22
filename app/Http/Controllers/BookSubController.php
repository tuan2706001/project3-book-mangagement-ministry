<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookSub;
use App\Models\Student;
use App\Models\Classes;
use Booksubcription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class BookSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $booksub = BookSub::all();
        $student = Student::all();
        $class = Classes::all();
        $search = $request->get('search');
        $books = DB::table('booksubscription')
            ->join('book', 'book.book_id', '=', 'booksubcription.book_id')
            ->join('students', 'booksubcription.stu_id', '=', 'students.stu_id')
            ->join('classes', 'classes.cl_id', '=', 'students.cl_id')
            ->where('book_title', 'like', "%$search%")->orderBy('book_id', 'asc')
            ->paginate(3);
        return view('booksub.index', [
            "books" => $books,
            "search" => $search,
            "booksub" => $booksub,
            "student" => $student,
            "class" => $class
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
