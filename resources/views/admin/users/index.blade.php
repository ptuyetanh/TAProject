<?php
?>
@extends('layouts.layout')

@section('content')

<div class="managerUser">
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
    <div class="tittleUser">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Quản lý người dùng</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- end tittle -->
    <div class="createUser">
        <div class="container">
            <a href="users/create" class="btn btn-primary">Thêm</a>
        </div>
    </div>
    <!-- end addUser -->
    <div class="contentUser">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th class="col-1" scope="col">STT</th>
                            <th class="col-1" scope="col">Họ tên</th>
                            <th class="col-2" scope="col">Email</th>
                            <th class="col-1" scope="col">Ngày sinh</th>
                            <th class="col-2" scope="col">Số điện thoại</th>
                            <th class="col-1" scope="col">Ảnh đại diện</th>
                            <th class="col-2" scope="col">Danh sách khóa học</th>
                            <th class="col-1" scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->phonenumber}}</td>
                                <td><img src="/users/{{$user->image}}" class="img-fluid" alt=""
                                         style="height:50px;width:50px"></td>
                                <td>
                                    @if ($user->courses->isEmpty())
                                        No courses
                                    @else
                                        {{implode(' && ',$user->courses->pluck('name_course')->toArray()) }}
                                    @endif
                                </td>
                                <td class="action">
                                    <div class="viewUser">
                                        <a href="users/{{$user->id}}/show" class="btn btn-primary btn-lg" >
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
{{--                                    end viewUser--}}
                                    <div class="update">
                                        <a href="users/{{$user->id}}/edit" class="btn btn-primary btn-lg"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <!-- end update  -->
                                    <div class="delete">
                                        <form method="post" action="users/{{$user->id}}/delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="" id="" class="btn btn-primary"><i
                                                    class="fa-solid fa-delete-left"></i></button>
                                        </form>
                                    </div>
                                    <!-- end delete -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end contentUser -->
</div>
<!-- end managerUser -->
@endsection
