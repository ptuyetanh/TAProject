<?php


?>
@extends('layouts.layout')

@section('content')
<div class="managerCourse">
    @if($message = Session::get('success'))
    <div class="container">
        <div class="row">
            <div class="col-sm-2 offset-sm-11">
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    {{$message}}
                    <button type="button" class="btn-close message" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="tittleCourse">
        <div class="container text-center">
            <div class="row">
                <h2>Quản lý khóa học</h2>
            </div>
        </div>
    </div>
    <!-- end tittleCourse -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="courses/create">
                    <button type="button" class="btn btn-primary btn-lg">
                        Thêm khóa học
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-- end addcourse -->
    <div class="contentCourse">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="col-1 text-center" scope="col">STT</th>
                                <th class="col-2" scope="col">Tên khóa học</th>
                                <th class="col-4" scope="col">Mô tả</th>
                                <th class="col-2" scope="col">Thời gian bắt đầu</th>
                                <th class="col-2" scope="col">Thời gian kết thúc</th>
                                <th class="col-2" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr class="">
                                <td>{{$course->id}}</td>
                                <td>{{$course->name_course}}</td>
                                <td>{{$course->description}}</td>
                                <td>{{$course->start_date}}</td>
                                <td>{{$course->end_date}}</td>
                                <td class="actionCourse">
                                    <div class="viewCourse">
                                        <a href="courses/{{$course->id}}/show" class="btn btn-primary btn-lg" >
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                    <div class="updateCourse">
                                        <a href="courses/{{$course->id}}/edit" class="btn btn-primary btn-lg"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <!-- end updateCourse -->
                                    <div class="deleteCourse">
                                        <form method="post" action="courses/{{$course->id}}/delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="" id="" class="btn btn-primary"><i
                                                    class="fa-solid fa-delete-left"></i></button>
                                        </form>
                                    </div>
                                    <!-- end deleteCourse -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $courses->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end contentCourse -->
</div>
<!-- end managerCourse -->
@endsection
