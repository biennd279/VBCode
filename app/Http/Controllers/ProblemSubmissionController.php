<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Submission;
use Illuminate\Http\Request;

class ProblemSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function index(Problem $problem)
    {
        return \App\Http\Resources\Submission::collection($problem->submissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Problem $problem)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem, Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problem  $problem
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problem  $problem
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem, Submission $submission)
    {
        //
    }
}
