<?php

namespace App\Repository\Invoice;

interface InvoiceInterface
{
    public function getAllInvoices();

    public function CreateInvoices($id);

    public function StoreInvoices($request);

    public function ShowInvoices($id);

    public function DeleteInvoices($id);
}
