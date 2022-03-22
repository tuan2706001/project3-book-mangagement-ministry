<?php

namespace App\Http\Controllers;

use App\Models\BookSub;
use App\Models\Classes;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UpdateBookSub extends Controller
{
    public function updateStatus(Request $request)
    {
        $idBook = $request->get("id_book");
        $nameClass = $request->get("nameClass");
        $quanlity = $request->get("quantily");
        $remain = Book::where("book_id", "=", $idBook)->select("remain")->get();
        $re = $remain[0]['remain'];
        //sql1
        //UPDATE booksubscription JOIN students on students.stu_id = booksubscription.stu_id JOIN classes ON classes.cl_id = students.cl_id 
        //SET booksubscription.status = 0 WHERE classes.cl_name = 'BKD07' and booksubscription.book_id = 4;

        if ($quanlity > $re) {
            return Redirect::route("errorQuantity")->with('id_book', $idBook);
        } else {
            $BookS = BookSub::join("students", "students.stu_id", "=", "booksubscription.stu_id")->join("classes", "classes.cl_id", "=", "students.cl_id")->where("classes.cl_name", "=", $nameClass)->where("booksubscription.book_id", "=", $idBook)->select("booksubscription.*")->get();

            // $Class = Classes::where("cl_name", "=", $nameClass)->first();
            // $idClass = $Class->cl_id;
            $idBookSub = $BookS[0]['id'];
            $BookSub = BookSub::where("id", "=", $idBookSub)->first();
            $BookSub->status = 1;
            $BookSub->save();

            //sql2asdhdas
            $Book = Book::where("book_id", "=", $idBook)->first();

            $soLuongSach = $Book->remain;
            $Book->remain = $soLuongSach - $quanlity;
            $Book->save();

            // $classes = Classes::where("cl_name", "=", $nameClass)->first();
            // return $idBook . $nameClass;
            // return $idBook . $nameClass . $quanlity;
            return Redirect::route("book.show");
        }
    }
}
