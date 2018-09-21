<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Course;
use App\User;
use DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user()->staff_id;
            $type = Auth::user()->type;
            if($type == 'admin'){
                $courses = Course::orderBy('course_code', 'asc')->get();
            }else if($type == 'coordinator'){
                $courses = Course::orderBy('course_code', 'asc')
                ->where('user_id', $user)
                ->where('publish', '1')
                ->get();
            }
            
            return view('courses.index')->with('courses', $courses);
       } else {
            return view('auth.login');
       }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    public function createajax(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'course_code' => 'required',
            'course_name' => 'required',
            'course_type' => 'required'
        ]);
        $id = $request->course_id;
        $course = Course::find($id);
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->course_type = $request->input('course_type');
        $course->save();
        return $course;
        return view('courses.create');
    }

    public function publish(Request $request)
    {
        $id = $request->id;
        $course = Course::find($id);
        if($course->publish == '1'){
            $course->publish = '0';
        }else{
            $course->publish = '1';
        }
        $course->save();
        // return view('temp')->with('p', $course->publish);
        return $course;
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_code' => 'required',
            'course_name' => 'required',
            'course_type' => 'required'
        ]);
        $course = new Course;
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->course_type = $request->input('course_type');
        $course->save();

        return redirect('/courses')->with('success', 'Course Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = User::find($id);
        // return $type->type;
        if($type->type == 'admin'){
            $courses = Course::all();
        }else if($type->type == 'coordinator'){
            $courses = Course::where('user_id', $id)
            ->where('publish', '0')
            ->get();
        }
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_code' => 'required',
            'course_name' => 'required',
            'course_type' => 'required'
        ]);
        $course = Course::find($id);
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->course_type = $request->input('course_type');
        $course->publish = '0';
        $course->save();

        return redirect('/courses')->with('success', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->publish = '0';
        $course->save();
        return redirect('/courses')->with('success', 'Course Deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $course = Course::find($id);
        $course->publish = '1';
        $course->save();
        return redirect('/courses')->with('success', 'Course Published');
    }
}
