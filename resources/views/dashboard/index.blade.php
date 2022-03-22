@extends('layouts.app')
@section('content')
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title btn-center">Bảng tổng hợp số lượng các hạng mục</h4><br> 
               
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped text-center">
	                <thead class="card-title btn-center">
	                    <th>Tên mục</th>                       
						          <th>Số lượng</th>	
                      <th>Hành động</th>					
	                </thead>
	                <tbody>
                        <tr>
                          <th>Khóa</th>
                          <th>{{$course}}</th>
                          <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('course.index') }}"></a></th>
                        </tr>
                        <tr>
                          <th>Ngành</th>
                          <th>{{$major}}</th>
                        <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('major.index') }}"></a></th>
                        </tr>
                        <tr>
                          <th>Lớp</th>
                          <th>{{$grade}}</th>
                          <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('classes.index') }}"></a></th>
                        </tr>
                        <tr>
                          <th>Học sinh</th>
                          <th>{{$student}}</th>
                          <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('student.index') }}"></a></th>
                        </tr>                                                             
                        <tr>
                          <th>Môn học</th>
                          <th>{{$subject}}</th>
                          <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('subject.index') }}"></a></th>
                        </tr>
                        <tr>
                          <th>Giáo vụ</th>
                          <th>{{$ministry}}</th>
                          <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('ministry.index') }}"></a></th>
                        </tr>
                        <tr>
                          <th>Sách</th>
                          <th>{{$book}}</th>
                          <th><a rel="tooltip" data-original-title="Chi tiết"class="btn btn-info ti-eye" href="{{ route('book.index') }}"></a></th>
                        </tr>
	                </tbody>
	            </table>
	        </div>
	    </div>
    </div>
@endsection