<?php

?>
@extends('layouts.layout')

@section('content')

<div class="showCourse">
    <div class="container">
        <div class="row">
            <a href="{{url('admin/courses')}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card text-dark">
                    <div class="card-body">
                        <h4 class="card-title text-center mt-2 mb-4">Thông tin khóa học</h4>
                        <p>Tên Khóa học : <b>{{$course -> name_course}}</b></p>
                        <p>Mô tả : <b>{{$course -> description}}</b></p>
                        <p>Thời gian bắt đầu : <b>{{$course -> start_date}}</b></p>
                        <p>Thời gian kết thúc : <b>{{$course -> end_date}}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
