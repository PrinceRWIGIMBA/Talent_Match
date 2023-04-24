<?php

namespace App\Http\Controllers;

use App\Models\Rectruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use HttpResponses;
class RectruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json('recruiter');
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
    public function show(Rectruiter $rectruiter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rectruiter $rectruiter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rectruiter $rectruiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rectruiter $rectruiter)
    {
        //
    }
}
