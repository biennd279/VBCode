<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

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
        $category = request()->query('category');
        if ($category) {
            return \App\Http\Resources\Problem::collection(Problem::whereHas('categories',
                function ($query) use ($category) {
                    $query->where('category', $category);
                })->paginate(10)->withQueryString());
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

    public function getHistory(Problem $problem)
    {
        $user = auth()->user();
        $submissions = Submission::query()
            ->where('problem_id', $problem->id)
            ->where('user_id', $user->id)
            ->orderByDesc('id')
            ->get();
        return \App\Http\Resources\Submission::collection($submissions);
    }

    public function getPoint(Problem $problem)
    {
        $user = auth()->user();
        $point = Submission::selectRaw('max(submissions.point) as point')
            ->join('problems', 'problems.id', '=', 'submissions.problem_id')
            ->where('user_id', '=', $user->id)
            ->where('problem_id', '=', $problem->id)
            ->first();
        return JsonResource::make($point);
    }
}
