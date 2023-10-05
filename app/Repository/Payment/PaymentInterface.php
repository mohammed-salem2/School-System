<?php

namespace App\Repository\Payment;

interface PaymentInterface
{
    public function getAllPayments();

    public function StorePayments($request);

    public function ShowPayments($id);

    public function DeletePayments($id);
}
