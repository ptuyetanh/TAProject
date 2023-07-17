<?php
?>
@extends('layouts.layout')

@section('content')

    <div class="addUser">
        <div class="container">
            <div class="row">
                <a href="{{url('admin/users')}}"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card text-dark">
                        <div class="card-body">
                            <h4 class="card-title text-center mt-2 mb-4">Thêm người dùng</h4>
                            <form class="row g-3 needs-validation" method="post" action="{{url('admin/users/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Họ Tên</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="birthday" class="form-label">Ngày sinh</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control"
                                               aria-describedby="inputGroupPrepend" name="birthday" id="birthday" value="{{old('birthday')}}">
                                    </div>
                                    @if($errors->has('birthday'))
                                        <span class="text-danger">{{$errors->first('birthday')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="phonenumber" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{old('phonenumber')}}">
                                    @if($errors->has('phonenumber'))
                                        <span class="text-danger">{{$errors->first('phonenumber')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="courses" class="form-label">Danh sách khóa học</label>
                                    <select class="form-select form-select-lg" id="courses" multiple name="course[]">
                                        <option value="">Select course</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->name_course}}</option>
                                        @endforeach
                                    </select>
{{--                                    @if($errors->has('course[]'))--}}
{{--                                        <span class="text-danger">{{$errors->first('course[]')}}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-9">
                                    <label for="image" class="form-label">Ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image" id="image" value="">
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                                <div class="col-12 modal-footer">
                                    <button class="btn btn-primary" type="submit">Add User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


