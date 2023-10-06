<?php

namespace App\Repository\Attendance;

use App\Models\Attendance;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class AttendanceRepository implements AttendanceInterface{

    public function getAllAttendances(){
        $sections = Section::with('grade' , 'classroom')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.attendance.index' , compact('sections'));
    }

    public function getAllStudents($id){
        $sections = Section::findOrFail($id);
        $students = $sections->students;
        return view('dashboard.attendance.students' , compact('students'));
    }

    public function CreateAttendances(){
        $teachers = new Teacher();
        $specializations = Specialization::all();
        return view('dashboard.teacher.create' , compact('teachers' , 'specializations'));
    }

    public function StoreAttendances($request){
        foreach ($request->attendences as $studentId => $attendance){
            $students = Student::findOrFail($studentId);
            if($attendance == 'presence'){
                $status = 1;
            } else if ($attendance == 'absent') {
                $status = 0;
            }
                Attendance::create([
                'student_id' => $students->id,
                'grade_id' => $students->grade_id,
                'classroom_id' => $students->classroom_id,
                'section_id' =>  $students->section_id,
                'teacher_id' => 1,
                'attendance_date' => date('Y-m-d'),
                'attendance_status' => $status,
            ]);
            // dd($x);
        }
        return redirect(route('attendances.index'))->with('success' , __('messages.success'));
    }

    public function EditAttendances($id){
        $teachers = Teacher::findOrFail($id);
        $specializations = Specialization::all();
        return view('dashboard.teacher.edit' , compact('teachers' , 'specializations'));
    }

    public function UpdateAttendances($request , $id){

        $teachers = Teacher::findOrFail($id);

        $validatedData = $request->validate([
            'email' => 'required|unique:teachers,email,' . $id,
            'name' => 'required',
            'name_en' => 'required',
            'specialization_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'joining_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'image' => ['nullable', 'image', 'max:512000'],
        ] , [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'specialization_id.required' => trans('validation.required'),
            'gender.required' => trans('validation.required'),
            'status.required' => trans('validation.required'),
            'joining_date.required' => trans('validation.required'),
            'address.required' => trans('validation.required'),
        ]);


        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('uploads' , [
                'disk' => 'public',
            ]);
        }
        else {
            $image = $teachers->image;
        }

        if(!empty($request->get('password'))){
            $password = Hash::make($request->get('password'));
        } else {
            $password = $teachers->password;
        }

        $teachers->update([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'email' => $request->get('email'),
            'password' => $password,
            'specialization_id' => $request->get('specialization_id'),
            'status' => $request->get('status'),
            'gender' => $request->get('gender'),
            'joining_date' => $request->get('joining_date'),
            'address' => $request->get('address'),
            'image' => $image ?? null ,
            'admin_data'=> auth()->user(),
        ]);
        return redirect(route('teachers.index'))->with('success' , __('messages.Update'));
    }

    public function DeleteAttendances($id){
        Teacher::destroy($id);
        return redirect(route('teachers.index'))->with('success' ,  __('messages.Delete'));
    }
}

