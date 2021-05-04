<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
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
			$user=Auth::user();
			
			$company = Company::find($id);
		if ($user->can('view', $company)) {
			
			return view('company',['company' => $company]);
	
		} else {
			echo 'Not Authorized.';
		}



				
		}
		public function create()
				{
								 return view('submitcompany');
				}

		public function company_list()
		{	
			
					$id=Auth::id();
					$user = User::find($id);
					$companies= $user->companies()->get();
		
		// if ($request->ajax()) {
		return response()->json(['html' => view('company_list',['companies'=>$companies])->render()]);
			//}
			//return view('campaigns_list', compact('campaigns'));
			//return response()->json(['id'=>'2','name'=>'Test1','buget'=>'2']);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */


		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			 $data=$request->validate([
					'name' => 'required|max:255|unique:companies,name',
					'cui'  => 'required|unique:companies,cui',
				]);
				$company = Company::create([
					'name' => $request->name,
					'adres'=>$request->adres,
					'cui'=>$request->cui
				]);
					$id=Auth::id();
					$company->users()->attach($id);
					$companies = $company->save();

				return redirect()->route('user_index',['company'=>$company]);
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
		public function destroy(Request $request)
		{
				 $comp = Company::find($request->id);
				 $comp->users()->detach();
				 $campaigns=$comp->campaigns()->get();
				//  foreach ($campaigns as $camp) {
				// 	$camp->campaignData->delete();
				// $camp->delete();	
				//  }
				 $comp->delete();
		}
}
