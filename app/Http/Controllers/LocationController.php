<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Business;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
     public function index()
    {
        
        $locations = Location::with('business')->where('deleted_at', null)->get();
        return view('location/index',compact('locations'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
       $businesss = Business::all();
        return view('location/create',compact('businesss'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        
        $location  = new Location;
        $location->location_name = $request['location_name'];
        $location->business_id = $request['business_id'];
        $location->email = $request['email'];
        $location->address = $request['address'];
        $location->save();
        
        $businesses_id = $request->business_id;
        $location->business()->attach($businesses_id);

        return redirect('locations');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business,$id)
    {
        $location = location::find($id);
        $business =  Business::all();
        return view('location/edit',compact('location','business'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $role,$id)
    {
        $location =  Location::find($id);
        $location->location_name = $request['location_name'];
        $location->business_id = $request['business_id'];
        $location->email = $request['email'];
        $location->address = $request['address'];
        $location->save();

        $businesses_id = $request->business_id;
        $location->business()->sync($businesses_id);

        return redirect('locations');

    }

    /**
     * Remove the specified resource from storage.
     */
         public function destroy($id)
    {

        // $location =  Location::find($id);
        // $filePath = public_path('images').'/'.$business->file;    
       
    //    if(File::exists($filePath)) {
    //        unlink($filePath);
    //     }
        Location::find($id)->delete();
        return redirect()->back();
    }

    public function trash(){
        $locations = Location::onlyTrashed()->get();
        return view('location/trash',compact('locations'));
    }

    public function restore(User $role,$id)
    {
         Location::withTrashed()->find($id)->restore();
        return redirect('locations');
    }

    public function forcedelete(User $role,$id)
    {
        Location::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}