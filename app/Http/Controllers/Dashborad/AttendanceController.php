<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Attendance\AttendanceInterface;


class AttendanceController extends Controller
{

    protected $attendances;

    public function __construct(AttendanceInterface $attendances){
        $this->attendances = $attendances;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->attendances->getAllAttendances();
    }

    public function index_student(String $id)
    {
        return $this->attendances->getAllStudents($id);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->attendances->StoreAttendances($request);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
