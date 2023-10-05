<?php

namespace App\Repository\ProcessFee;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\ProcessFee;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProcessFeeRepository implements ProcessFeeInterface{

    public function getAllProcessFees(){
        $processes = ProcessFee::with('student')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.process.index' , compact('processes'));
    }

    public function ShowProcessFees($id){
        $students = Student::findOrFail($id);
        $account = StudentAccount::where('student_id' , '=' , $students->id)->get();
        $debit = $account->sum('debit');
        $credit = $account->sum('credit');
        $balance = $debit - $credit;
        $processes = new ProcessFee();
        return view('dashboard.process.create', compact('students', 'processes' , 'balance'));
    }


    public function StoreProcessFees($request){
        DB::beginTransaction();
        try{
            $processes=ProcessFee::create([
                'student_id' => $request->student_id,
                'amount' => $request->amount,
                'description' => $request->description,
                'admin_data' => auth()->user(),
            ]);

            StudentAccount::Create([
                'student_id' => $processes->student_id,
                'process_id' => $processes->id,
                'type' => "Exclude Fees",
                'description' => $processes->description,
                'debit' => 0.00,
                'credit' => $request->amount,
                'admin_data' => $processes->admin_data,
            ]);
            DB::commit();
            return redirect(route('processes.index'))->with('success', __('messages.success'));
        }catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteProcessFees($id){
        ProcessFee::destroy($id);
        return redirect(route('processes.index'))->with('success' ,  __('messages.Delete'));
    }
}

