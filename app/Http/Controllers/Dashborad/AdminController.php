<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::orderBy('id' , 'desc')->paginate(10);
        return view('dashboard.admin.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = new Admin();
        return view('dashboard.admin.create' , compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('uploads' , [
                'disk' => 'public',
            ]);
        }
        $admins = Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'status'=> $request->get('status'),
            'role' => $request->get('role'),
            'image'=> $image ?? null ,
        ]);
        return redirect(route('admins.index'))->with('success' , 'Admin Created is done');
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
        $admins = Admin::findOrFail($id);
        return view('dashboard.admin.edit' , compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admins=Admin::findOrFail($id);
        $validator = Validator($request->all() , [
            'name' => ['required'],
            'email' => ['required' , 'email' , Rule::unique('admins')->ignore($admins->id)],
            'password' => ['min:8'],
            'image' =>['nullable','image','max:512000'],
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('uploads' , [
                'disk' => 'public',
            ]);
        }
        else {
            $image = $admins->image;
        }

        if(!empty($request->get('password'))){
            $password = Hash::make($request->get('password'));
        } else {
            $password = $admins->password;
        }
        $admins->update([
            'name' => $request->get('name'),
            'status'=> $request->get('status'),
            'email' => $request->get('email'),
            'password' => $password,
            'role' => $request->get('role'),
            'image'=> $image,
        ]);
        return redirect(route('admins.index'))->with('success' , 'Admin Updated is done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::destroy($id);
        return redirect(route('admins.index'))->with('success' , 'Admin is now in the recycle bin');
    }

    // public function trash(Request $request)
    // {
    //     $admins = Admin::onlyTrashed()->orderBy('id', 'desc');
    //     if($request['name'] ?? false){
    //         $admins = Admin::onlyTrashed()->where('name' , 'like' , '%' . $request['name'] . '%');
    //     }
    //     if($request['email'] ?? false){
    //         $admins = Admin::onlyTrashed()->where('email' , 'like' , '%' . $request['email'] . '%');
    //     }
    //     $admins = $admins->paginate(5);
    //     return view('dashborad.admin.trash' , compact('admins'));
    // }
    // public function restore($id)
    // {
    //     $admins = Admin::onlyTrashed()->findOrFail($id);
    //     $admins->restore();
    //     return redirect(route('admins.trash'))->with('success' , 'Admin Restored is done');
    // }
    // public function restoreAll()
    // {
    //     $admins = Admin::onlyTrashed()->restore();
    //     return redirect(route('admins.trash'))->with('success' , 'Admin Restored is done');
    // }
    // public function forceDelete($id)
    // {
    //     $admins = Admin::onlyTrashed()->findOrFail($id);
    //     $admins->forceDelete();
    //     return redirect(route('admins.trash'))->with('success' , 'Admin Deleted is done');
    // }
}
