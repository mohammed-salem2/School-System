<?php

namespace App\Repository\Teacher;

interface TeacherInterface
{
    public function getAllTeachers();

    public function CreateTeachers();

    public function StoreTeachers($request);

    public function EditTeachers($id);

    public function UpdateTeachers($request , $id);

    public function DeleteTeachers($id);
}
