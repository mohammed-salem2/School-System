<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $sections = Section::find(3);
        // $teachers = $sections->teachers;
        // dd($teachers);
        $sections = Section::with('grade' , 'classroom')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.section.index' , compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = new Section();
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('dashboard.section.create' , compact('sections' , 'grades' , 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        $sections = Section::create([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'slug' => Str::slug($request->get('name_en')),
            'grade_id' => $request->get('grade_id'),
            'classroom_id' => $request->get('classroom_id'),
            'status' => $request->get('status'),
            'admin_data'=>auth()->user(),
        ]);
        $sections->teachers()->attach($request->teacher_id);
        return redirect(route('sections.index'))->with('success' , __('messages.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sections = Section::findOrFail($id);
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('dashboard.section.edit' , compact('sections' , 'grades' , 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, string $id)
    {
        $sections = Section::findOrFail($id);
        $sections->update([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'slug' => Str::slug($request->get('name_en')),
            'grade_id' => $request->get('grade_id'),
            'classroom_id' => $request->get('classroom_id'),
            'status' => $request->get('status'),
            'admin_data'=>auth()->user(),
        ]);
        if(isset($request->teacher_id)){
            $sections->teachers()->sync($request->teacher_id);
        } else {
            $sections->teachers()->sync(array());
        }
        return redirect(route('sections.index'))->with('success' , __('messages.Update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sections = Section::destroy($id);
        return redirect(route('sections.index'))->with('success' ,  __('messages.Delete'));
    }

    public function getclasses($id)
    {
        $classrooms = Classroom::where("grade_id", $id)->pluck("name", "id");

        return $classrooms;
    }

    public function getsection($id)
    {
        $sections = Section::where("classroom_id", $id)->pluck("name", "id");

        return $sections;
    }
}
