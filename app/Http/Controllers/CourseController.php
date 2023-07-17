<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    //
    public $name_course, $description, $start_date, $end_date;
    public function index(){
        $courses = Course::paginate(5);
        return view('admin.courses.index',compact('courses'));
    }
    public function create()
    {
        return view('admin.courses.create');
    }
    public function store(Request $request){
        //validate
        $request->validate([
            'name_course'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $course = new Course();
        $course->name_course = $request->name_course;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->save();
        return redirect('admin/courses')->withSuccess('Thêm thành công');
    }
    public function edit($id){
         $course = Course::where('id',$id)->first();
        return view('admin.courses.edit',['course'=> $course]);
    }
    public function update(Request $request, $id){
         $request->validate([
             'name_course'=>'required',
             'description'=>'required',
             'start_date'=>'required',
             'end_date'=>'required',
         ]);
         $course = Course::where('id',$id)->first();
         $course->name_course = $request->name_course;
         $course->description = $request->description;
         $course->start_date = $request->start_date;
         $course->end_date = $request->end_date;
         $course->save();
        return redirect('admin/courses')->withSuccess('Sửa thành công');
    }
    public function destroy($id){
       $course = Course::where('id',$id)->first();
       $course -> delete();
       return redirect('admin/courses')->withSuccess('Xóa thành công');
    }
    public function show($id){
        $course = Course::where('id',$id)->first();
        return view('admin.courses.show',['course'=>$course]);
    }
}
