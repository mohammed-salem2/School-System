<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::search(request()->query())->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.grade.index' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = new Grade();
        return view('dashboard.grade.create' , compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
            $grades = Grade::create([
                'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
                'note' => $request->get('note'),
            ]);

            return redirect(route('grades.index'))->with('success' , __('messages.success'));
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
        $grades = Grade::findOrFail($id);
        return view('dashboard.grade.edit' , compact('grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, string $id)
    {
        $grades = Grade::findOrFail($id);
        $grades->update([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'note' => $request->get('note'),
        ]);

        return redirect(route('grades.index'))->with('success' , __('messages.Update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $grades = Grade::destroy($id);
            return redirect(route('grades.index'))->with('success' ,  __('messages.Delete'));
        }catch (\Exception $e) {
            return redirect(route('grades.index'))->with('fail' , __('grade.delete_fail'));
        }
    }
}
