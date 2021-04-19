<?php

namespace App\Http\Controllers;

use App\Models\CampaignData;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignDataController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CampaignData  $campaignData
     * @return \Illuminate\Http\Response
     */
    public function show(CampaignData $campaignData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CampaignData  $campaignData
     * @return \Illuminate\Http\Response
     */
    public function edit(CampaignData $campaignData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CampaignData  $campaignData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampaignData $campaignData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CampaignData  $campaignData
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignData $campaignData)
    {
        //
    }
}
