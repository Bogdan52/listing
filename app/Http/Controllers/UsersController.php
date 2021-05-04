<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Invite;
use Illuminate\Http\Request;
use Auth;
class UsersController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
				$id=Auth::id();

				$user = User::find($id);
				$companies= $user->companies()->get();
				$invites=Invite::where('user_id','=',$id)->get();
				return view('user',['users' => $user, 'companies'=>$companies,'invites'=>$invites]);
		}


		public function user_list(Request $request)
				{   
						$user = Auth::user();
						$company = Company::find($request->id);
				if ($user->can('view', $company)) {
						$users= $company->users()->get();
							return response()->json(['html' => view('user_list',['users'=>$users])->render()]);
				} else {
						echo 'Not Authorized.';
				}
				
				// if ($request->ajax()) {
			
						//}
						//return view('campaigns_list', compact('campaigns'));
						//return response()->json(['id'=>'2','name'=>'Test1','buget'=>'2']);
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
				//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\User  $user
		 * @return \Illuminate\Http\Response
		 */
		public function show(User $user)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\User  $user
		 * @return \Illuminate\Http\Response
		 */
		public function edit(User $user)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\User  $user
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, User $user)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\User  $user
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(User $user)
		{
				//
		}
}
