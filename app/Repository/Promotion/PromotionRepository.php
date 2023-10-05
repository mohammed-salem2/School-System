<?php

namespace App\Repository\Promotion;

use App\Models\Blood;
use App\Models\ChildParent;
use App\Models\Grade;
use App\Models\nationality;
use App\Models\Promotion;
use App\Models\Religion;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PromotionRepository implements PromotionInterface
{


    public function getAllPromotions()
    {
        $promotions = Promotion::with(
            'ToGrade',
            'student',
            'FromGrade',
            'ToClassroom',
            'FromClassroom',
            'ToSection',
            'FromSection',
        )->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.promotion.index', compact('promotions'));
    }

    public function CreatePromotions()
    {
        $promotions = new Promotion();
        $grades = Grade::all();
        return view('dashboard.promotion.create', compact('promotions', 'grades'));
    }

    public function StorePromotions($request)
    {
        DB::beginTransaction();
        // dd($request);
        try {
            $students = Student::where('grade_id', $request->get('from_grade'))
                ->where('classroom_id', $request->get('from_classroom'))
                ->where('section_id', $request->get('from_section'))->where('academic_year', $request->get('academic_year_old'))->get();
            if ($students->count() < 1) {
                return redirect()->back()->with('fail', __('لاتوجد بيانات في جدول الطلاب'));
            }
            foreach ($students as $student) {
                $student->update([
                    'grade_id' => $request->get('to_grade'),
                    'classroom_id' => $request->get('to_classroom'),
                    'section_id' => $request->get('to_section'),
                    'academic_year' => $request->get('academic_year_new'),
                ]);

                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->get('from_grade'),
                    'from_classroom' => $request->get('from_classroom'),
                    'from_section' => $request->get('from_section'),
                    'academic_year_old' => $request->get('academic_year_old'),
                    'to_grade' => $request->get('to_grade'),
                    'to_classroom' => $request->get('to_classroom'),
                    'to_section' => $request->get('to_section'),
                    'academic_year_new' => $request->get('academic_year_new'),
                ]);
            }
            DB::commit();
            return redirect(route('promotions.index'))->with('success', __('messages.success'));
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function UndoPromotions($request)
    {
        DB::beginTransaction();
        try {
            if ($request->get('page_id') == 0) {
                $promotions = Promotion::all();
                foreach ($promotions as $promotion) {
                    $student_id = $promotion->student_id;
                    $student = Student::findOrFail($student_id);
                    $student->update([
                        'grade_id' => $promotion->from_grade,
                        'classroom_id' => $promotion->from_classroom,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->academic_year_old,
                    ]);
                // حذف البيانات من الجدول
                Promotion::truncate();
                }
                DB::commit();
                return redirect(route('promotions.index'))->with('success', __('messages.Delete'));
            } else {
                $promotions = Promotion::findOrFail($request->page_id);
                $student_id = $promotions->student_id;
                $student = Student::findOrFail($student_id);
                $student->update([
                    'grade_id' => $promotions->from_grade,
                    'classroom_id' => $promotions->from_classroom,
                    'section_id' => $promotions->from_section,
                    'academic_year' => $promotions->academic_year_old,
                ]);
                $promotions->delete();
                DB::commit();
                return redirect(route('promotions.index'))->with('success', __('messages.Delete'));
                // dd($student);
            }
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
