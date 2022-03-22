@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh mục sách</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            
                        </div>
            </form> 
            <div class="text-right" >
                <h3>Tổng số lượng chưa phát: {{$sumcount}} </h3>
               
            </div>
                 
            @if ($error == 1)
            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <div class="alert alert-danger">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span class="text-center"><b> Số Lượng ko phù hợp</b></span>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            @endif
            
            

                                
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped" text-align: center>
                <thead>
                    <th>STT</th>
                    <th>Tên Lớp</th>
                    <th>Số lượng</th>
                    <th></th>
                </thead>
                <tbody >
                    @php
                         $index = 1;
                    @endphp
                    @foreach ($count as $counter)
                        <tr>
                            <td>{{$index ++}}</td>
                             <td>{{$counter->cl_name}}</td>
                             <td>{{$counter->soLuong}}</td>
                             <td>
                                 
                                 @if (Session::exists('error'))
                                <div class="alert alert-warning">
                                    {{ Session::get('error.message')}}
                                </div>
                                @endif
                                
                                <form action="{{route("updateStatusBookSub")}}" method="get">
                                    <input type="hidden" name="nameClass" value="{{ $counter->cl_name }}">
                                    <input type="hidden" name="id_book" value="{{ $idBook }}">
                                    <input type="hidden" name="quantily" value="{{$counter->soLuong}}">
                                    <button>Phát</button>
                                </form>
                               
                                
                            </td>
                        </tr> 
                @endforeach                              
                </tbody>
            </table>
            <div class="text-center">
                
            </div>
        </div>
    </div>
    @endsection