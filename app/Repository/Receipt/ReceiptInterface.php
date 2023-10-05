<?php

namespace App\Repository\Receipt;

interface ReceiptInterface
{
    public function getAllReceipts();

    public function StoreReceipts($request);

    public function ShowReceipts($id);

    public function DeleteReceipts($id);
}
