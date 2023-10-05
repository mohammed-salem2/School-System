<?php

namespace App\Repository\ProcessFee;

interface ProcessFeeInterface
{
    public function getAllProcessFees();

    public function StoreProcessFees($request);

    public function ShowProcessFees($id);

    public function DeleteProcessFees($id);
}
