<?php

namespace App\Repository\Teacher;

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherInterface{

    public function getAllTeachers(){
        $teachers = Teacher::orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.teacher.index' , compact('teachers'));
    }

    public function CreateTeachers(){
        $teachers = new Teacher();
        $specializations = Specialization::all();
        return view('dashboard.teacher.create' , compact('teachers' , 'specializations'));
    }

    public function StoreTeachers($request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('uploads' , [
                'disk' => 'public',
            ]);
        }
        Teacher::create([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'specialization_id' => $request->get('specialization_id'),
            'status' => $request->get('status'),
            'gender' => $request->get('gender'),
            'joining_date' => $request->get('joining_date'),
            'address' => $request->get('address'),
            'image' => $image ?? null ,
            'admin_data'=> auth()->user(),
        ]);
        return redirect(route('teachers.index'))->with('success' , __('messages.success'));
    }

    public function EditTeachers($id){
        $teachers = Teacher::findOrFail($id);
        $specializations = Specialization::all();
        return view('dashboard.teacher.edit' , compact('teachers' , 'specializations'));
    }

    public function UpdateTeachers($request , $id){

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

    public function DeleteTeachers($id){
        Teacher::destroy($id);
        return redirect(route('teachers.index'))->with('success' ,  __('messages.Delete'));
    }
}

