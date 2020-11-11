<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Problem;
use App\Models\Submission;
use Illuminate\Http\Request;

class ContestProblemSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Contest $contest
     * @param Problem $problem
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Contest $contest, Problem $problem)
    {
        return \App\Http\Resources\Submission::collection($problem->submissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Contest $contest
     * @param Problem $problem
     * @return void
     */
    public function store(Request $request, Contest $contest, Problem $problem)
    {
        $path = $request->file('file')->store('submissions');
        $user = auth()->user();

        $submission = $problem->submissions()->create([
            'file' => $path,
            'user_id' => $user->getAuthIdentifier(),
        ]);
        return \App\Http\Resources\Submission::make($submission);
    }

    /**
     * Display the specified resource.
     *
     * @param Problem $problem
     * @param Contest $contest
     * @param Submission $submission
     * @return \App\Http\Resources\Submission
     */
    public function show(Contest $contest, Problem $problem, Submission $submission)
    {
        return \App\Http\Resources\Submission::make($submission);
    }
    
}
