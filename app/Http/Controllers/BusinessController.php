<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Http\Requests\UserRequest;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class BusinessController extends Controller
{
    public function index()
    {
        $businesss = Business::with('locations')->where('deleted_at', null)->get();
        return view('business.index',compact('businesss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $users = User::all();
        return view('business/create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request)
    {
        
        
        $business  = new Business;
        $business->business_name = $request['business_name'];
        $business->email = $request['email'];
        
        
        if ($request->has('file')) {
            $image = $request->file('file');
            $fileName = time().'.'.$image->getClientOriginalExtension();
        
            // Store the file in the public/images directory
            $image->move(public_path('images'), $fileName);
        
            // Save the file name or path to the database
            $business->file = $fileName;
        }
        $business->user_id = $request['user_id'];
        $business->address = $request['address'];
        $business->save();

        return redirect('businesses');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business,$id)
    {
        $business =  Business::find($id);
        $users = User::all();

        return view('business/edit',compact('business','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request,$id)
    {
        $business =  Business::find($id);
        $business->business_name = $request['business_name'];
        $business->email = $request['email'];

        if ($request->has('file')) {
            $image = $request->file('file');
            $fileName = time().'.'.$image->getClientOriginalExtension();
        
            // Store the file in the public/images directory
            $image->move(public_path('images'), $fileName);
        
            // Save the file name or path to the database
            $business->file = $fileName;
        }
        $business->user_id = $request['user_id'];
        $business->address = $request['address'];

        $business->save();

        
        return redirect('/businesses');
    }

    /**
     * Remove the specified resource from storage.
     */
         public function destroy(Business $role,$id)
    {

        $business =  Business::find($id);
        $filePath = public_path('images').'/'.$business->file;    
       
       if(File::exists($filePath)) {
           unlink($filePath);
        }
        Business::find($id)->delete();
        return redirect()->back();
    }

    public function trash(){
        $businesss = Business::onlyTrashed()->get();
        return view('business/trash',compact('businesss'));
    }

    public function restore($id)
    {
         Business::withTrashed()->find($id)->restore();
        return redirect('businesses');
    }

    public function forcedelete($id)
    {
        Business::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}