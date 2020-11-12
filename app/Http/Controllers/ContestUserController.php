<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\User;
use Illuminate\Http\Request;

class ContestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function index(Contest $contest)
    {
        return \App\Http\Resources\User::collection($contest->users()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contest $contest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contest  $contest
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest, User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contest  $contest
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contest  $contest
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest, User $user)
    {
        //
    }
}
