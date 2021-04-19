<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Auth;

class CompaniesController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index($id)
		{
 				$user = Auth::user();
   			$company = Company::find($id);
 		if ($user->can('view', $company)) {
 							$users= $company->users()->get();
      				 return view('company',['company' => $company,'users'=>$users]);
    } else {
      echo 'Not Authorized.';
    }



				
		}
		public function submit()
				{
								 return view('submitcompany');
				}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
				//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			 $data=$request->validate([
												'name' => 'required|max:255',
												'cui'  => 'required'

								]);
								$exemple=Company::where('cui', '=', $request->cui)->exists();
							//	dd($exemple);
				 if ($exemple) {
  					  $comp=Company::where('cui', '=', $request->cui)->get()->first();
									$user = auth()->user();
									$user->companies()->sync($comp->id,false);
									//dd($comp);
				 }
				 else
				 {			 $company = Company::create([
								 				'name' => $request->name,
								 				'adres'=>$request->adres,
								 				'cui'=>$request->cui
								 ]);
								$id=Auth::id();
								$company->users()->attach($id);
				 				$companies = $company->save();
							    
				 }
								return redirect('/user');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Company  $company
		 * @return \Illuminate\Http\Response
		 */
		public function show(Company $company)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Company  $company
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Company $company)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\Company  $company
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Company $company)
		{
				//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Company  $company
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Company $company)
		{
			 // $comp = Company::findOrFail($company->id);
			 // $comp->delete();
		}
}
