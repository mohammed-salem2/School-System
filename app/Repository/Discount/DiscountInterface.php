<?php

namespace App\Repository\Discount;

interface DiscountInterface
{
    public function getAllDiscounts();

    public function CreateDiscounts();

    public function StoreDiscounts($request);

    public function ShowDiscounts($id);

    public function EditDiscounts($id);

    public function UpdateDiscounts($request , $id);

    public function DeleteDiscounts($id);
}
