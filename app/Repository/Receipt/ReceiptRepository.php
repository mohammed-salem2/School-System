<?php

namespace App\Repository\Receipt;

use App\Models\Discount;
use App\Models\Fee;
use App\Models\FundAccount;
use App\Models\Grade;
use App\Models\ReceiptStudent;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReceiptRepository implements ReceiptInterface
{

    public function getAllReceipts()
    {
        $receipts = ReceiptStudent::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.receipt.index', compact('receipts'));
    }

    public function ShowReceipts($id)
    {
        $students = Student::findOrFail($id);
        $receipts = new ReceiptStudent();
        return view('dashboard.receipt.create', compact('students', 'receipts'));
    }

    public function StoreReceipts($request)
    {
        // dd($request);
        DB::beginTransaction();

        try {

            $receipts = ReceiptStudent::create([
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description,
                'admin_data' => auth()->user(),
            ]);

            FundAccount::create([
                'receipt_id' => $receipts->id,
                'debit' => $request->debit,
                'description' => $request->description,
                'credit' => 0.00,
                'admin_data' => $receipts->admin_data,
            ]);

            StudentAccount::Create([
                'student_id' => $receipts->student_id,
                'invoice_id' => null,
                'receipt_id' => $receipts->id,
                'type' => "Receipt",
                'description' => $receipts->description,
                'debit' => 0.00,
                'credit' => $request->debit,
                'admin_data' => $receipts->admin_data,
            ]);
            DB::commit();
            return redirect(route('receipts.index'))->with('success', __('messages.success'));
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function DeleteReceipts($id)
    {
        ReceiptStudent::destroy($id);
        return redirect(route('receipts.index'))->with('success',  __('messages.Delete'));
    }
}
