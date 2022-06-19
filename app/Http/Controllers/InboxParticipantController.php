<?php

namespace App\Http\Controllers;

use App\Models\InboxParticipant;
use App\Http\Requests\StoreInboxParticipantRequest;
use App\Http\Requests\UpdateInboxParticipantRequest;

class InboxParticipantController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInboxParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInboxParticipantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InboxParticipant  $inboxParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(InboxParticipant $inboxParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InboxParticipant  $inboxParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(InboxParticipant $inboxParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInboxParticipantRequest  $request
     * @param  \App\Models\InboxParticipant  $inboxParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInboxParticipantRequest $request, InboxParticipant $inboxParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InboxParticipant  $inboxParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(InboxParticipant $inboxParticipant)
    {
        //
    }
}
