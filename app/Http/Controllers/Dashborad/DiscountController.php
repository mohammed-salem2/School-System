<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Discount\DiscountInterface;


class DiscountController extends Controller
{


    protected $discounts;

    public function __construct(DiscountInterface $discounts){
        $this->discounts = $discounts;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->discounts->getAllDiscounts();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->discounts->CreateDiscounts();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->discounts->StoreDiscounts($request);
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
        return $this->discounts->EditDiscounts($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->discounts->UpdateDiscounts($request , $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->discounts->DeleteDiscounts($id);
    }
}
