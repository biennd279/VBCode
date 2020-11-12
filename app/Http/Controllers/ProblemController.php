<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $category = $request->input('category');
        if ($category) {
            return \App\Http\Resources\Problem::collection(Problem::whereHas('categories',
                function ($query) use ($category) {
                    $query->where('category', $category);
                })->paginate(10));
        }
        return \App\Http\Resources\Problem::collection(Problem::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        return \App\Http\Resources\Problem::make($problem);
    }
}
