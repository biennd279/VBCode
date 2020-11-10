<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Problem;
use Illuminate\Http\Request;

class ContestProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function index(Contest $contest)
    {
        return \App\Http\Resources\Problem::collection($contest->problems);
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
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest, Problem $problem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contest  $contest
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest, Problem $problem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contest  $contest
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest, Problem $problem)
    {
        //
    }
}
