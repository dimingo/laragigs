<?php

namespace App\Http\Controllers;

use App\Models\listing;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    // show all listings
    public function index()
    {
        return view('listings.index', [

            "listings" => listing::latest()->filter(request(['tag', 'search']))->simplepaginate(4 )
        ]);
    }
  
    // show create form
    public function create(){
        return view('listings.create');
    }

  // show single listing
  public function show(listing $listing){
    return view('listings.show', [
        "listing" => $listing
    ]);
     
}

// store listing
public function store(Request $request){
   
    $formFields = $request->validate([
        'title' => 'required',
        'tags' => 'required',
        'company' => ['required', Rule::unique('listings', 'company')],
        'location' => 'required',
        'email' =>['required', 'email'],
        'website' => 'required',
        'description' => 'required',
    ]);

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file("logo")->store('logos', 'public');
    }

    listing::create($formFields);

    return redirect("/")->with('success', 'Listing created successfully');

}

// Update listing
public function update(Request $request, listing $listing){
   
    $formFields = $request->validate([
        'title' => 'required',
        'tags' => 'required',
        'company' => ['required'],
        'location' => 'required',
        'email' =>['required', 'email'],
        'website' => 'required',
        'description' => 'required',
    ]);

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file("logo")->Update('logos', 'public');
    }

  $listing->update($formFields);

    return back()->with('success', 'Listing Updated successfully');

}



// show edit form
public function edit(listing $listing){
    // dd($listing);
    return view('edit', [
        "listing" => $listing
    ]);
}

// Delete listing
public function destroy(listing $listing){
    $listing->delete();
    return redirect("/")->with('success', 'Listing deleted successfully');
}

}
 
    



