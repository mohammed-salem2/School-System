<?php

namespace App\Repository\Fee;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class FeeRepository implements FeeInterface{

    public function getAllFees(){
        $fees = Fee::with('grade' , 'classroom')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.fee.index' , compact('fees'));
    }

    public function ShowFees($id){
        $fees = Fee::with('grade' , 'classroom')->findOrFail($id);
        return view('dashboard.fee.show' , compact('fees'));
    }

    public function CreateFees(){
        $fees = new Fee();
        $grades = Grade::all();
        return view('dashboard.fee.create' , compact('fees' , 'grades'));
    }

    public function StoreFees($request){
        // dd($request);
        Fee::create([
            'title' => ['en' => $request->get('title_en') , 'ar' => $request->get('title')],
            'amount' => $request->get('amount'),
            'grade_id' => $request->get('grade_id'),
            'classroom_id' => $request->get('classroom_id'),
            'year' => $request->get('year'),
            'description' => $request->get('description') ?? __('app.nothing'),
            'admin_data'=> auth()->user(),
        ]);
        return redirect(route('fees.index'))->with('success' , __('messages.success'));
    }

    public function EditFees($id){
        $fees = Fee::findOrFail($id);
        $grades = Grade::all();
        return view('dashboard.fee.edit' , compact('fees' , 'grades'));
    }

    public function UpdateFees($request , $id){

        $fees = Fee::findOrFail($id);

        $fees->update([
            'title' => ['en' => $request->get('title_en') , 'ar' => $request->get('title')],
            'amount' => $request->get('amount'),
            'grade_id' => $request->get('grade_id'),
            'classroom_id' => $request->get('classroom_id'),
            'year' => $request->get('year'),
            'description' => $request->get('description') ?? __('app.nothing'),
            'admin_data'=> auth()->user(),
        ]);

        return redirect(route('fees.index'))->with('success' , __('messages.Update'));
    }

    public function DeleteFees($id){
        Fee::destroy($id);
        return redirect(route('fees.index'))->with('success' ,  __('messages.Delete'));
    }
}

