<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Receipt\ReceiptInterface;


class ReceiptStudentController extends Controller
{


    protected $receipts;

    public function __construct(ReceiptInterface $receipts){
        $this->receipts = $receipts;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->receipts->getAllReceipts();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->receipts->StoreReceipts($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->receipts->ShowReceipts($id);
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
        return $this->receipts->DeleteReceipts($id);
    }
}
