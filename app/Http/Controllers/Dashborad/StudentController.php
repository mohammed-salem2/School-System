<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\StduentRequest;
use Illuminate\Http\Request;
use App\Repository\Student\StudentInterface;

class StudentController extends Controller
{

    protected $students;

    public function __construct(StudentInterface $students)
    {
        $this->students = $students;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->students->getAllStudents();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->students->CreateStudents();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StduentRequest $request)
    {
        return $this->students->StoreStudents($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->students->ShowStudents($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->students->EditStudents($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StduentRequest $request, string $id)
    {
        return $this->students->UpdateStudents($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->students->DeleteStudents($id);
    }

    public function CreateGraduation()
    {
        return $this->students->CreateGraduation();
    }

    public function StoreGraduation(Request $request)
    {
        return $this->students->StoreGraduation($request);
    }

    public function trash()
    {
        return $this->students->getAllGraduates();
    }
    public function restore($id)
    {
        return $this->students->RestoreGraduates($id);
    }
    public function forceDelete($id)
    {
        return $this->students->ForceDeleteGraduates($id);
    }
}
