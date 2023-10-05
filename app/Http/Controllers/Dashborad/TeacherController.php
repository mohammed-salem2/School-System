<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\Teacher\TeacherInterface;

class TeacherController extends Controller
{
    protected $teachers;

    public function __construct(TeacherInterface $teachers){
        $this->teachers = $teachers;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->teachers->getAllTeachers();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->teachers->CreateTeachers();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        return $this->teachers->StoreTeachers($request);
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
        return $this->teachers->EditTeachers($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->teachers->UpdateTeachers($request , $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->teachers->DeleteTeachers($id);
    }
}
