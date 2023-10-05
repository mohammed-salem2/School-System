<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Payment\PaymentInterface;


class PaymentController extends Controller
{


    protected $payment;

    public function __construct(PaymentInterface $payment){
        $this->payment = $payment;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->payment->getAllPayments();
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
        return $this->payment->StorePayments($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->payment->ShowPayments($id);
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
        return $this->payment->DeletePayments($id);
    }
}
