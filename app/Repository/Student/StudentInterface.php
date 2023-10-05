<?php

namespace App\Repository\Student;

interface StudentInterface
{
    public function getAllStudents();

    public function CreateStudents();

    public function StoreStudents($request);

    public function ShowStudents($id);

    public function EditStudents($id);

    public function UpdateStudents($request , $id);

    public function DeleteStudents($id);

    public function RandomEmail($domain);

    public function CreateGraduation();

    public function StoreGraduation($request);

    public function getAllGraduates();

    public function RestoreGraduates($id);

    public function ForceDeleteGraduates($id);
}
