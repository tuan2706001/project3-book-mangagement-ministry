<?php

namespace App\Http\Controllers;

use App\Models\BookSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ErrorQuantity extends Controller
{
    public function showError(Request $request)
    {
        $id = $request->session()->get('id_book');
        $sumcount = BookSub::where('status', '=', 0)
            ->where('bookid', '=', $id)
            ->count();


        $count = DB::select('SELECT classes.cl_name,COUNT(classes.cl_id) AS soLuong from booksubscription JOIN students on booksubscription.stu_id = students.stu_id JOIN classes ON classes.cl_id = students.cl_id WHERE booksubscription.bookid = :idBook  AND booksubscription.status = 0 GROUP BY (classes.cl_name)', ['idBook' => $id]);
        return view('book.show', [
            "sumcount" => $sumcount,
            "count" => $count,
            "idBook" => $id,
            "error" => 1

        ]);
    }
}
