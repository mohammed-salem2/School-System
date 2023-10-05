<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Repository\Invoice\InvoiceInterface;


class InvoiceController extends Controller
{

    protected $invoices;

    public function __construct(InvoiceInterface $invoices){
        $this->invoices = $invoices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->invoices->getAllInvoices();
    }

    public function CreateInvoice(String $id)
    {
        return $this->invoices->CreateInvoices($id);
        // $students = Student::findOrFail($id);
        // dd($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->invoices->StoreInvoices($request);
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
        return $this->invoices->DeleteInvoices($id);
    }
}
