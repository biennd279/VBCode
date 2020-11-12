<?php

namespace App\Http\Controllers;

use App\Http\Resources\User;
use App\Models\Contest;
use App\Http\Resources\Contest as ContestResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContestResource::collection(Contest::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'time_start' => 'required|date',
            'time_end' => 'required|date'
        ]);

        $contest = Contest::create($validateData);
        return new ContestResource($contest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        return new ContestResource($contest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'time_start' => 'required|date',
            'time_end' => 'required|date'
        ]);

        $contest->update($validateData);
        $contest->save();
        return new ContestResource($contest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contest $contest
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Contest $contest)
    {
//        $contest->participants()->delete();
//        $contest->delete();
//        return response()->json([
//            'message' => 'Delete success'
//        ], 202);
    }

    public function join(Contest $contest)
    {
        $user = auth()->user();
        $contest->users()->attach($user);
        return response()->json([
            'message' => 'join success',
        ], 200);
    }

    public function leave(Contest $contest)
    {
        $user = auth()->user();
        $contest->users()->detach($user);
        return response()->json([
            'message' => 'leave success',
        ], 200);
    }
}
