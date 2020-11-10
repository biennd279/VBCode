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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'question' => 'required|string',
            'point' => 'required|alpha_num'
        ]);

        $problem = $contest->problems()->create($validatedData);
        return new \App\Http\Resources\Problem($problem);
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
        return new \App\Http\Resources\Problem($problem);
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'question' => 'required|string',
            'point' => 'required|alpha_num'
        ]);
        $problem->update($validatedData);
        $problem->save();
        return new \App\Http\Resources\Problem($problem);
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
        $problem->delete();
        return response()->json([
            'message' => 'remove success'
        ], 200);
    }
}
