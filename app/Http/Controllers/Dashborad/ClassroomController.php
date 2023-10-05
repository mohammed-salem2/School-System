<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        $classrooms = Classroom::with('grade')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.classroom.index' , compact('classrooms' , 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = new Classroom();
        $grades = Grade::all();
        return view('dashboard.classroom.create' , compact('classrooms' , 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        $all_data = $request->get('kt_docs_repeater_basic');
        foreach($all_data as $data){
            Classroom::create([
                'name' => ['en' => $data['name_en'] , 'ar' => $data['name']],
                'slug' => Str::slug($data['name_en']),
                'grade_id' => $data['grade_id'],
                'admin_data' => auth()->user(),
            ]);
        }
        return redirect(route('classrooms.index'))->with('success' , __('messages.success'));
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
        $classrooms=Classroom::findOrFail($id);
        $grades = Grade::all();
        return view('dashboard.classroom.edit' , compact('classrooms' , 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, string $id)
    {
        $classrooms=Classroom::findOrFail($id);
        $classrooms->update([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'slug' => Str::slug($request->get('name_en')),
            'grade_id' => $request->get('grade_id'),
            'admin_data' => auth()->user(),
        ]);
        return redirect(route('classrooms.index'))->with('success' , __('messages.Update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::destroy($id);
        return redirect(route('classrooms.index'))->with('success' ,  __('messages.Delete'));
    }
}
