@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh mục sách</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
            <div class="text-right">
                
            </div>                          
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped" text-align: center>
                <thead>
                    <th>STT</th>
                    <th>Tên Lớp</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                    
                </thead>
                <tbody >
                    @php
                         $index = 0;
                    @endphp
                    @foreach ($books as $book)
                        <tr>
                            <td>{{$index+=1}}</td> 
                            <td>{{$book->cl_name}}</td> 
                            <td>{{$book->author}}</td>
                            <td width="150px" height="200px" ><img src="{{$book->book_img}}" ></td>
                            <td>{{$book->remain}}</td>
                            
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">
                {{ $books->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection