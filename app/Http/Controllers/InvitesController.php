<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Auth;
class InvitesController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
				//
		}
		public function invites_list(Request $request)
		{   
			$id=Auth::id();
			//	$user = User::find($id);
			//	$companies= $user->companies()->get();
			$invites=Invite::where('user_id','=',$id)->get();
			$inviteing_companies=[];
			foreach ($invites as $invite) {
				$company=Company::find($invite->company_id);
				$inviteing_companies[]=$company;
			}
			return response()->json(['html' => view('invites_list',['inviteing_companies'=>$inviteing_companies])->render()]);			
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
			$id=User::where('email','=',$request->email)->first()->id;		
			$invite = Invite::create([
				'company_id' => $request->cid,
				'user_id'=> $id,
				//'company_id'=>$id
			]);

			$invites = $invite->save();
		}

		public function accept(Request $request)
		{
					$user=Auth::user();
					$cid=$request->id;
					//dd($cid);
					$user->companies()->sync($cid, false);
					//	return redirect()->route('company_index');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Invite  $invite
		 * @return \Illuminate\Http\Response
		 */
		public function show(Invite $invite)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Invite  $invite
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Invite $invite)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\Invite  $invite
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Invite $invite)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Invite  $invite
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Request $request)
		{		
				$uid=Auth::id();
				$invites=Invite::where('company_id','=',$request->id)->where('user_id','=',$uid)->get();
				foreach ($invites as $inv) {
					$inv->delete();
				}
				
		}
}
