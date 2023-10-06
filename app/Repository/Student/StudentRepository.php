<?php

namespace App\Repository\Student;

use App\Models\Blood;
use App\Models\ChildParent;
use App\Models\Grade;
use App\Models\nationality;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentRepository implements StudentInterface{

    public function getAllStudents(){
        $students = Student::search(request()->query())->with(
            'blood' ,
            'nationality' ,
            'religion' ,
            'classroom' ,
            'section',
            'parent',
            'grade',
        )->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.student.index' , compact('students'));
    }

    public function CreateStudents(){
        $students = new Student();
        $nationalities = nationality::all();
        $bloods = Blood::all();
        $religions = Religion::all();
        $grades = Grade::all();
        $parents = ChildParent::all();
        return view('dashboard.student.create' , compact(
        'students' ,
        'nationalities' ,
        'bloods' ,
        'religions' ,
        'grades',
        'parents',
        )
    );
    }

    public function StoreStudents($request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('uploads' , [
                'disk' => 'public',
            ]);
        }
        Student::create([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'email' => $this->RandomEmail('school.com'),
            'password' => Hash::make($request->get('national_id')),
            'nationality_id' => $request->get('nationality_id'),
            'blood_id' => $request->get('blood_id'),
            'religion_id' => $request->get('religion_id'),
            'classroom_id' => $request->get('classroom_id'),
            'section_id' => $request->get('section_id'),
            'grade_id' => $request->get('grade_id'),
            'parent_id' => $request->get('parent_id'),
            'academic_year' => $request->get('academic_year'),
            'status' => $request->get('status'),
            'gender' => $request->get('gender'),
            'date_birth' => $request->get('date_birth'),
            'national_id' => $request->get('national_id'),
            'image' => $image ?? null ,
            'admin_data'=> auth()->user(),
        ]);
        return redirect(route('students.index'))->with('success' , __('messages.success'));
    }

    public function ShowStudents($id){
        $students = Student::with(
            'blood' ,
            'nationality' ,
            'religion' ,
            'classroom' ,
            'section',
            'parent',
            'grade',
        )->findOrFail($id);
        $nationalities = nationality::all();
        $bloods = Blood::all();
        $religions = Religion::all();
        $grades = Grade::all();
        $parents = ChildParent::all();

        return view('dashboard.student.show' , compact(
        'students' ,
        'nationalities' ,
        'bloods' ,
        'religions' ,
        'grades',
        'parents',
            )
        );
    }

    public function RandomEmail($domain){
        $unique = false;
        if (!$unique) {
            $email = Str::random(8) . '@' . $domain; // Generate a random email
            $students = Student::where('email', $email)->first();
            if (!$students) {
                $unique = true; // Email is unique
            }
        }
        return $email;
    }

    public function EditStudents($id){
        $students = Student::findOrFail($id);
        $nationalities = nationality::all();
        $bloods = Blood::all();
        $religions = Religion::all();
        $grades = Grade::all();
        $parents = ChildParent::all();
        return view('dashboard.student.edit' , compact(
        'students' ,
        'nationalities' ,
        'bloods' ,
        'religions' ,
        'grades',
        'parents',
        )
    );

    }

    public function UpdateStudents($request , $id){

        $students = Student::findOrFail($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('uploads' , [
                'disk' => 'public',
            ]);
        }
        else {
            $image = $students->image;
        }

        $students->update([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'password' => Hash::make($request->get('national_id')),
            'nationality_id' => $request->get('nationality_id'),
            'blood_id' => $request->get('blood_id'),
            'religion_id' => $request->get('religion_id'),
            'classroom_id' => $request->get('classroom_id'),
            'section_id' => $request->get('section_id'),
            'grade_id' => $request->get('grade_id'),
            'parent_id' => $request->get('parent_id'),
            'academic_year' => $request->get('academic_year'),
            'status' => $request->get('status'),
            'gender' => $request->get('gender'),
            'date_birth' => $request->get('date_birth'),
            'national_id' => $request->get('national_id'),
            'image' => $image ?? null ,
            'admin_data'=> auth()->user(),
        ]);
        return redirect(route('students.index'))->with('success' , __('messages.Update'));
    }

    public function DeleteStudents($id){
        Student::destroy($id);
        return redirect(route('students.index'))->with('success' ,  __('messages.Graduating'));
    }

    public function CreateGraduation()
    {
        $grades = Grade::all();
        return view('dashboard.student.graduation', compact('grades'));
    }

    public function StoreGraduation($request)
    {
        $sections = Section::findOrFail($request->get('section_id'));
        $students = $sections->students;
        if($students->count() < 1){
            return redirect()->back()->with('fail', __('لاتوجد بيانات في جدول الطلاب'));
        } else {
            foreach($students as $student)
            {
                Student::destroy($student->id);
            }
            return redirect(route('students.index'))->with('success' , __('messages.success'));
        }
    }

    public function getAllGraduates()
    {
        $students = Student::onlyTrashed()->with(
            'blood' ,
            'nationality' ,
            'religion' ,
            'classroom' ,
            'section',
            'parent',
            'grade',
        )->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.student.trash' , compact('students'));
    }

    public function RestoreGraduates($id)
    {
        $students = Student::onlyTrashed()->findOrFail($id);
        $students->restore();
        return redirect(route('students.trash'))->with('success', __('messages.restore'));

    }

    public function ForceDeleteGraduates($id)
    {
        $students = Student::onlyTrashed()->findOrFail($id);
        $students->forceDelete();
        return redirect(route('students.trash'))->with('success', __('messages.Delete'));
    }
}

