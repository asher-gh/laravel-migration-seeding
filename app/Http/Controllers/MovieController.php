<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Movie;
use App\Services\CommentStorer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($q = $request->input('q')) {
            $movies = Movie::where('name', 'like', "$q%")
                ->where('created_at', '>', now()->subWeek())
                ->orderBy('name')
                ->get();
        } else {
            $movies = Movie::all(); // Movie::with(['director', 'genres'])->orderBy('name')->get();
        }

        // Lazy-eager loading
        $movies->load(['director' => function ($query) {
            $query->withCount('movies');
        }, 'genres']);

        $message = 'Hello there!';

        $collections = Auth::user()->collections;

        return view('movies.index', compact('movies', 'message', 'collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }

    public function storeComment(StoreCommentRequest $request, CommentStorer $storer, Movie $movie)
    {
        $params = $request->validated();

        return $storer->storeComment($request->user(), $movie, $params['text']);
    }
}
