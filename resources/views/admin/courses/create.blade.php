<?php

?>
@extends('layouts.layout')

@section('content')

<div class="addCourse">
    <div class="container">
        <div class="row">
            <a href="{{url('admin/courses')}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card text-dark">
                    <div class="card-body">
                        <h4 class="card-title text-center mt-2 mb-4">Thêm khóa học</h4>
                        <form class="row g-3 needs-validation" method="post" action="{{url('admin/courses/store')}}"
                            enctype="multipart/form-data">
                            {{--<input type="hidden" name="_token" value="{!! csrf_token() !!}">--}}
                            {!! csrf_field() !!}
                            <div class="col-md-4">
                                <label for="name_course" class="form-label">Tên khóa học</label>
                                <input type="text" class="form-control" id="name_course" name="name_course"
                                    value="{{old('name_course')}}">
                                @if($errors->has('name_course'))
                                <span class="text-danger">{{$errors->first('name_course')}}</span>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <label for="description" class="form-label">Mô tả</label>
                                <textarea class="form-control" id="description"
                                    name="description">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                <input class="form-control" type="date" name="start_date" id="start_date"
                                    value="{{old('start_date')}}">
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="end_date" class="form-label">Ngày kết thúc</label>
                                <input class="form-control" type="date" name="end_date" id="end_date"
                                    value="{{'end_date'}}">
                                @if($errors->has('end_date'))
                                <span class="text-danger">{{$errors->first('end_date')}}</span>
                                @endif
                            </div>
                            <div class="col-12 modal-footer">
                                <button type="submit" class="btn btn-primary">Add Courses</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
