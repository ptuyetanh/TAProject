<?php

?>
@extends('layouts.layout')

@section('content')

    <div class="showCourse">
        <div class="container">
            <div class="row">
                <a href="{{url('admin/users')}}"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card text-dark">
                        <h4 class="card-title text-center mt-2 mb-4">Thông tin người dùng</h4>
                        <div class="card-body showContent">
                            <div class="row">
                                <div class="inforUser col-sm-7">
                                    <p>Họ tên : <b>{{$user -> name}}</b></p>
                                    <p>Email : <b>{{$user -> email}}</b></p>
                                    <p>Ngày sinh : <b>{{$user -> birthday}}</b></p>
                                    <p>Số điện thoại : <b>{{$user -> phonenumber}}</b></p>
                                    <p>Danh sách khóa học :
                                        <b>
                                            @if ($user->courses->isEmpty())
                                                No courses
                                            @else
                                                {{implode(' && ',$user->courses->pluck('name_course')->toArray()) }}
                                            @endif
                                        </b>
                                    </p>
                                </div>
                                <div class="img col-sm-5">
                                    <img src="/users/{{$user->image}}" class="img-fluid round-cir" alt=""
                                         width="80%" height="60%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
