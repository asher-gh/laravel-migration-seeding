<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Actor::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($name = $request->name) {
            $actor = new Actor();

            $actor->update([ 'name'=>$name ]);
        }

        // this is a tes for the key testing keyboard sound using the jbl mic
        //  does the keyboard come through the 
        return Actor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
        //
        return view('actor.show', ['result' => 0]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        //
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
