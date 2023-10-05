<?php

namespace App\Repository\Invoice;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Invoice;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InvoiceRepository implements InvoiceInterface{

    public function getAllInvoices(){
        $invoices = Invoice::with('grade' , 'classroom' , 'fee' , 'student')->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.invoice.index' , compact('invoices'));
    }

    public function ShowInvoices($id){
        $fees = Fee::with('grade' , 'classroom')->findOrFail($id);
        return view('dashboard.fee.show' , compact('fees'));
    }

    public function CreateInvoices($id){
        $students = Student::findOrFail($id);
        $classroom = $students->classroom_id;
        $invoices = new Invoice();
        $fees = Fee::where('classroom_id' , '=' , $classroom)->get();
        return view('dashboard.invoice.create' , compact('fees' , 'invoices' , 'students'));
    }

    public function StoreInvoices($request){
        DB::beginTransaction();
        // dd($request);
        try{
            $students = Student::findOrFail($request->get('student_id'));
            $invoices = Invoice::create([
                'amount' => $request->get('amount'),
                'grade_id' => $students->grade_id,
                'classroom_id' => $students->classroom_id,
                'description' => $request->get('description') ?? __('app.nothing'),
                'fee_id' => $request->get('fee_id'),
                'student_id' => $request->get('student_id'),
                'type' => "Invoice",
                'admin_data'=> auth()->user(),
            ]);

            // $x = DB::raw('debit +' .$invoices->amount);
            // dd($x);
            StudentAccount::create([
                'student_id' => $invoices->student_id,
                'invoice_id' => $invoices->id,
                'type' => $invoices->type,
                'description' => $invoices->description,
                'credit' => 0.00 ,
                'admin_data' => $invoices->admin_data,
                'debit' => DB::raw('debit +' .$invoices->amount),
            ]);
            DB::commit();
            return redirect(route('invoices.index'))->with('success' , __('messages.success'));

        }catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('fail' , $e->getMessage());
        }
    }

    public function DeleteInvoices($id){
        Invoice::destroy($id);
        return redirect(route('invoices.index'))->with('success' ,  __('messages.Delete'));
    }
}

