@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh sách các môn học của ngành
            </h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="" name="search" class="form-control" placeholder="Search...">
                        </div>
                        
            </form> 
            
            <div class="text-right">
                <a href="{{ route('subject.create') }}" class="btn btn-success btn-fill btn-wd">Thêm môn học mới</a>
                <a href="{{ route('CreateSubjectMajor',['major' =>$idMajor])  }}" class="btn btn-success btn-fill btn-wd">Thêm môn học cho ngành</a>
            </div>  
            <div class="text-right" >
                <h3>Tổng số môn học của ngành: {{$count}} </h3>
               
            </div>                       
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>STT</th>
                    <th>Tên môn học</th>
                    <th>Thời lượng môn học</th>
               
                </thead>
                <tbody>
                    @php
                         $index = 0;
                    @endphp
                    @foreach ($subjectinfo as $subjects)
                        <tr>
                            <td>{{$index+=1}}</td> 
                            <td>{{$subjects->sub_name}}</td> 
                            <td>{{$subjects->duration}}H</td>
                            
                            
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">

            </div>
        </div>
    </div>
    @endsection