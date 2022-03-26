@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="GET" action="{{ route('StoreSubjectMajor')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm môn học thuộc ngành 
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Chọn Môn học</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Chọn Môn" data-size="7" name="sub_id">
                        @foreach ($subject as $subjects)
                            <option value="{{$subjects->sub_id}}">{{$subjects->sub_name}}</option>                                   
                        @endforeach                       
                    </select>
                    <select class="hidden" data-style="btn btn-danger btn-block" title="Chọn Môn" data-size="7" name="ma_id">
                              <option value="{{$idMajor}}"></option>              
                    </select>
                </div>
                <div>
                <div class="card-footer text-center">                                       
                    @if (Session::exists('error'))
                        <div class="alert alert-warning">
                            {{ Session::get('error.message')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-fill btn-info" value="{{$idMajor}}">Thêm</button> 
                </div>
               
            </div>
	    </form>
	</div>
@endsection