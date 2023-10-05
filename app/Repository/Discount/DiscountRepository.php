<?php

namespace App\Repository\Discount;

use App\Models\Discount;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class DiscountRepository implements DiscountInterface{

    public function getAllDiscounts(){
        $discounts = Discount::orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.discount.index' , compact('discounts'));
    }

    public function ShowDiscounts($id){
        $fees = Fee::with('grade' , 'classroom')->findOrFail($id);
        return view('dashboard.fee.show' , compact('fees'));
    }

    public function CreateDiscounts(){
        $discounts = new Discount();
        return view('dashboard.discount.create' , compact('discounts'));
    }

    public function StoreDiscounts($request){

        $discount = $request->get('discount') / 100;
        Discount::create([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'discount' => $discount,
            'admin_data'=> auth()->user(),
        ]);
        return redirect(route('discounts.index'))->with('success' , __('messages.success'));
    }

    public function EditDiscounts($id){
        $discounts = Discount::findOrFail($id);
        return view('dashboard.discount.edit' , compact('discounts'));
    }

    public function UpdateDiscounts($request , $id){

        $discounts = Discount::findOrFail($id);
        $discount = $request->get('discount') / 100;
        $discounts->update([
            'name' => ['en' => $request->get('name_en') , 'ar' => $request->get('name')],
            'discount' => $discount,
            'admin_data'=> auth()->user(),
        ]);

        return redirect(route('discounts.index'))->with('success' , __('messages.Update'));
    }

    public function DeleteDiscounts($id){
        Discount::destroy($id);
        return redirect(route('discounts.index'))->with('success' ,  __('messages.Delete'));
    }
}

