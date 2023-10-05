<?php

namespace App\Repository\Fee;

interface FeeInterface
{
    public function getAllFees();

    public function CreateFees();

    public function StoreFees($request);

    public function ShowFees($id);

    public function EditFees($id);

    public function UpdateFees($request , $id);

    public function DeleteFees($id);
}
