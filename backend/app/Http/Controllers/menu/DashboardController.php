<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardResource;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
    public function show(string $id)
    {
        $dashboard = User::with(['cashs', 'transactions'])->find($id, ['id', 'username']);

        return response()->json(['message' => "User found", 'data' => new DashboardResource($dashboard)]);
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
