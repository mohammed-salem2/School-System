<?php

namespace App\Repository\Attendance;

interface AttendanceInterface
{
    public function getAllAttendances();

    public function getAllStudents($id);

    public function CreateAttendances();

    public function StoreAttendances($request);

    public function EditAttendances($id);

    public function UpdateAttendances($request , $id);

    public function DeleteAttendances($id);
}
