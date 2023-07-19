<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\UserCourse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::paginate(4);
        $courses = Course::all();
        $usercourses = UserCourse::all();
        return view('admin.users.index',compact('users','courses','usercourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('admin.users.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'birthday'=> 'required',
            'phonenumber'=>['required', 'regex:/^(0|\+84)[1-9][0-9]{8}$/'],
            'course' => 'nullable|array',
            'course.*' => 'nullable|exists:courses,id',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,img|max:10000',
        ]);
//        dd($request->all());
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('users'),$imageName);
//        dd($imageName);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->phonenumber = $request->phonenumber;
        $userCourses  = $request->course;
        $user->image = $imageName;
        $user->save();
        if(is_array($userCourses) || is_object($userCourses)){
            foreach ($userCourses as $course_id){
                if (!empty($course_id)) {
                    $userCourse = new UserCourse();
                    $userCourse->course_id = $course_id;
                    $userCourse->user_id = $user->id;
                    $userCourse->save();
                }
            }
        }
        return redirect('admin/users')->withSuccess('Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::where('id',$id)->first();
        $courses = Course::all();
        $usercourses = UserCourse::all();
        return view('admin.users.show',['user'=>$user,'courses'=>$courses,'usercourses'=>$usercourses]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::where('id',$id)->first();
        $courses = Course::all();
        $usercourses = UserCourse::all();
        return view('admin.users.edit',['user'=>$user,'courses'=>$courses,'usercourses'=>$usercourses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'birthday'=> 'required',
            'phonenumber'=>['required', 'regex:/^(0|\+84)[1-9][0-9]{8}$/'],
            'course' => 'nullable|array',
            'course.*' => 'nullable|exists:courses,id',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,img|max:10000',
        ]);
        $user = User::where('id',$id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('users'),$imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->phonenumber = $request->phonenumber;
        $userCourses  = $request->course;
        $user->save();
        if (is_array($userCourses) || is_object($userCourses)) {
            foreach ($userCourses as $course_id) {
                if (!empty($course_id)) {
                    // Kiểm tra xem bản ghi đã tồn tại chưa, nếu chưa thì thêm mới
                    $existingUserCourse = UserCourse::where('user_id', $user->id)
                        ->where('course_id', $course_id)
                        ->first();

                    if (!$existingUserCourse) {
                        $userCourse = new UserCourse();
                        $userCourse->course_id = $course_id;
                        $userCourse->user_id = $user->id;
                        $userCourse->save();
                    }
                }
            }
        }

        return redirect('admin/users')->withSuccess('Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect('admin/users')->withSuccess('Xóa thành công');
    }
}
