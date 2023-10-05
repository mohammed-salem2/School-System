<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeRequest;
use Illuminate\Http\Request;
use App\Repository\Fee\FeeInterface;


class FeeController extends Controller
{


    protected $fees;

    public function __construct(FeeInterface $fees){
        $this->fees = $fees;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->fees->getAllFees();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->fees->CreateFees();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeRequest $request)
    {
        return $this->fees->StoreFees($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->fees->ShowFees($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->fees->EditFees($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeeRequest $request, string $id)
    {
        return $this->fees->UpdateFees($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->fees->DeleteFees($id);
    }
}
