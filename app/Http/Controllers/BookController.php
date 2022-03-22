<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use App\Models\Subject;
use App\Models\BookSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $search = $request->get('search');
        $books = Book::where('book_title', 'like', "%$search%")->orderBy('book_id', 'asc')->paginate(3);
        $count = BookSub::where('status', '=', 0)->count();
        return view('book.index', [
            "books" => $books,
            "search" => $search,
            "count" => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booktype = BookType::all();
        $subject = Subject::all();
        $book = DB::table('books')->join('booktype', 'books.bt_id', '=', 'booktype.bt_id')
            ->join('subject', 'subject.sub_id', '=', 'books.sub_id')
            ->select('books.*', 'booktype.*', 'subject.*')
            ->get();
        return view('book.create', [
            "book" => $book,
            "booktype" => $booktype,
            "subject" => $subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title = $request->get('name');
        $author = $request->get('author');
        $bt = $request->get('bt_id');
        $sub = $request->get('sub_id');
        $remain = $request->get('remain');

        $img = $request->file('img');


        $book = new Book();
        $folder = 'assets/img';
        $nameImage = $img->getClientOriginalName();
        $img->move($folder, $nameImage);
        $book->book_title = $title;
        $book->book_img = $folder . '/' . $nameImage;
        $book->author = $author;
        $book->bt_id = $bt;
        $book->sub_id = $sub;
        $book->remain = $remain;
        $book->save();
        return Redirect::route('book.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $sumcount = BookSub::where('status', '=', 0)
            ->where('book_id', '=', $id)
            ->count();


        $count = DB::select('SELECT classes.cl_name,COUNT(classes.cl_id) AS soLuong from booksubscription JOIN students on booksubscription.stu_id = students.stu_id JOIN classes ON classes.cl_id = students.cl_id WHERE booksubscription.book_id = :idBook  AND booksubscription.status = 0 GROUP BY (classes.cl_name)', ['idBook' => $id]);
        return view('book.show', [
            "sumcount" => $sumcount,
            "count" => $count,
            "idBook" => $id,
            "error" => 0
        ]);
    }
    //abc
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::all();
        $booktype = BookType::all();
        $book = Book::find($id);
        return view('book.edit', [
            "book" => $book,
            "booktype" => $booktype,
            "subject" => $subject
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



        $title = $request->get('name');
        $img = $request->file('img');
        $author = $request->get('author');
        $booktype = $request->get('bt_id');
        $subject = $request->get('sub_id');
        $remain = $request->get('remain');
        $book = Book::find($id);
        $folder = 'assets/img';
        $nameImage = $img->getClientOriginalName();
        $img->move($folder, $nameImage);

        $book = new Book();
        $book->book_title = $title;
        $book->book_img = $folder . '/' . $nameImage;
        $book->author = $author;
        $book->bt_id = $booktype;
        $book->sub_id = $subject;
        $book->remain = $remain;
        $book->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return Redirect::route('book.index');
    }
    public function export($id)
    {
    }
}
