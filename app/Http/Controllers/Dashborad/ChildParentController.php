<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\ChildParent;
use App\Models\nationality;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ChildParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = ChildParent::search(request()->query())->orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.parent.index' , compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = new ChildParent();
        $nationalities = nationality::all();
        $bloods = Blood::all();
        $religions = Religion::all();
        return view('dashboard.parent.create' , compact('parents' , 'nationalities' , 'bloods' , 'religions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->get('national_id_father') != null){
            $password = Hash::make($request->get('national_id_father'));
        } else if ($request->get('national_id_mother') != null){
            $password = Hash::make($request->get('national_id_mother'));
        }
        ChildParent::create([
            'email' => $this->generateUniqueRandomEmail('school.com'),
            'password'=> $password,
            'name_father' => ['en' => $request->get('name_father_en') ?? 'No data' , 'ar' => $request->get('name_father') ?? "لا يوجد بيانات"],
            'job_father' => ['en' => $request->get('job_father_en') , 'ar' => $request->get('job_father')],
            'national_id_father' => $request->get('national_id_father') ,
            'passport_id_father' => $request->get('passport_id_father') ,
            'phone_father' => $request->get('phone_father') ,
            'nationality_father_id' => $request->get('nationality_father_id') ,
            'blood_father_id' => $request->get('blood_father_id') ,
            'religion_father_id' => $request->get('religion_father_id') ,
            'address_father' => $request->get('address_father') ,
            'name_mother' => ['en' => $request->get('name_mother_en') , 'ar' => $request->get('name_mother')],
            'job_mother' => ['en' => $request->get('job_mother_en') , 'ar' => $request->get('job_mother')],
            'national_id_mother' => $request->get('national_id_mother') ,
            'passport_id_mother' => $request->get('passport_id_mother') ,
            'phone_mother' => $request->get('phone_mother') ,
            'nationality_mother_id' => $request->get('nationality_mother_id') ,
            'blood_mother_id' => $request->get('blood_mother_id') ,
            'religion_mother_id' => $request->get('religion_mother_id') ,
            'address_mother' => $request->get('address_mother') ,
            'admin_data' => auth()->user(),
        ]);
        return redirect(route('parents.index'))->with('success' , __('messages.success'));
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
        $parents=ChildParent::findOrFail($id);
        $nationalities = nationality::all();
        $bloods = Blood::all();
        $religions = Religion::all();
        return view('dashboard.parent.edit' , compact('parents' , 'nationalities' , 'bloods' , 'religions'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $parents=ChildParent::findOrFail($id);
        if($request->get('national_id_father') != null){
            $password = Hash::make($request->get('national_id_father'));
        } else if ($request->get('national_id_mother') != null){
            $password = Hash::make($request->get('national_id_mother'));
        }
        $parents->update([
            'password'=> $password,
            'name_father' => ['en' => $request->get('name_father_en') ?? 'No data' , 'ar' => $request->get('name_father') ?? "لا يوجد بيانات"],
            'job_father' => ['en' => $request->get('job_father_en') , 'ar' => $request->get('job_father')],
            'national_id_father' => $request->get('national_id_father') ,
            'passport_id_father' => $request->get('passport_id_father') ,
            'phone_father' => $request->get('phone_father') ,
            'nationality_father_id' => $request->get('nationality_father_id') ,
            'blood_father_id' => $request->get('blood_father_id') ,
            'religion_father_id' => $request->get('religion_father_id') ,
            'address_father' => $request->get('address_father') ,
            'name_mother' => ['en' => $request->get('name_mother_en') , 'ar' => $request->get('name_mother')],
            'job_mother' => ['en' => $request->get('job_mother_en') , 'ar' => $request->get('job_mother')],
            'national_id_mother' => $request->get('national_id_mother') ,
            'passport_id_mother' => $request->get('passport_id_mother') ,
            'phone_mother' => $request->get('phone_mother') ,
            'nationality_mother_id' => $request->get('nationality_mother_id') ,
            'blood_mother_id' => $request->get('blood_mother_id') ,
            'religion_mother_id' => $request->get('religion_mother_id') ,
            'address_mother' => $request->get('address_mother') ,
            'admin_data' => auth()->user(),
        ]);
        return redirect(route('parents.index'))->with('success' , __('messages.Update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChildParent::destroy($id);
        return redirect(route('parents.index'))->with('success' ,  __('messages.Delete'));
    }

    public function generateUniqueRandomEmail($domain)
    {
        $unique = false;
        if (!$unique) {
            $email = Str::random(8) . '@' . $domain; // Generate a random email
            $parents = ChildParent::where('email', $email)->first();
            if (!$parents) {
                $unique = true; // Email is unique
            }
        }
        return $email;
    }
}
