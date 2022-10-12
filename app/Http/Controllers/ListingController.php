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
//    dd($formFields);
    listing::create($formFields);

    // session()->flash('success', 'Listing created successfully');

    return redirect("/")->with('success', 'Listing created successfully');

}
}
