<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\AddMovieToCollectionRequest;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Auth::user()->collections;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collections.create');
    }

    public function addMovie(AddMovieToCollectionRequest $request, Collection $collection)
    {

        $movieId = $request->validated('movie_id');

        // ensure no duplicates
        $collection->movies()->detach($movieId);
        $collection->movies()->attach($movieId);

        // bounce the user to the page containing details for the given collection
        return redirect()->route('collections.show', $collection);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        // return Auth::user();
        $params = $request->validated();
        return Auth::user()->collections()->create($params);
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        $collection->load('movies');

        return $collection;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
