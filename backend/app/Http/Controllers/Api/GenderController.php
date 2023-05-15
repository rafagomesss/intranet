<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenderRequest;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Gender::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenderRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only('gender');
        return Gender::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
