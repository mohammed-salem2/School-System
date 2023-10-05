<?php

namespace App\Repository\Payment;

use App\Models\Fee;
use App\Models\FundAccount;
use App\Models\Grade;
use App\Models\Payment;
use App\Models\ProcessFee;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentRepository implements PaymentInterface{

    public function getAllPayments(){
        $payments = Payment::with('student')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.payment.index' , compact('payments'));
    }

    public function ShowPayments($id){
        $students = Student::findOrFail($id);
        $account = StudentAccount::where('student_id' , '=' , $students->id)->get();
        $debit = $account->sum('debit');
        $credit = $account->sum('credit');
        $balance = $debit - $credit;
        $payments = new Payment();
        return view('dashboard.payment.create', compact('students', 'payments' , 'balance'));
    }


    public function StorePayments($request){
        DB::beginTransaction();
        try{
            $payments=Payment::create([
                'student_id' => $request->student_id,
                'amount' => $request->amount,
                'description' => $request->description,
                'admin_data' => auth()->user(),
            ]);


            FundAccount::create([
                'payment_id' => $payments->id,
                'debit' => 0.00,
                'description' => $payments->description,
                'credit' => $request->amount,
                'admin_data' => $payments->admin_data,
            ]);

            StudentAccount::Create([
                'student_id' => $payments->student_id,
                'payment_id' => $payments->id,
                'type' => "Payment",
                'description' => $payments->description,
                'debit' => $request->amount,
                'credit' => 0.00,
                'admin_data' => $payments->admin_data,
            ]);


            DB::commit();
            return redirect(route('payments.index'))->with('success', __('messages.success'));
        }catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeletePayments($id){
        Payment::destroy($id);
        return redirect(route('payments.index'))->with('success' ,  __('messages.Delete'));
    }
}

