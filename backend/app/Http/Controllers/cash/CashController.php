<?php

namespace App\Http\Controllers\cash;

use App\Http\Controllers\Controller;
use App\Http\Requests\cash\storeCash;
use App\Http\Requests\cash\updateCash;
use App\Models\Cash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $cashs = Cash::where('user_id', Auth::user()->id)->get(['id', 'name', 'nominal', 'date']);

        if ($cashs->isEmpty()) {
            return response()->json(['message' => "Data not found"], 404);
        }

        return response()->json(["message" => "Data found", "data" => $cashs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCash $request): JsonResponse
    {
        $request->validated();

        $newCash = Cash::create([
            'name' => $request->name,
            'nominal' => $request->nominal,
            'date' => $request->date,
            'user_id' => Auth::user()->id
        ]);


        return response()->json([
            'message' => "New cash successfully created",
            'data' => [
                'name' => $newCash->name,
                'nominal' => $newCash->nominal,
                'date' => $newCash->date,
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCash $request, string $id): JsonResponse
    {
        $request->validated();

        Cash::where('id', $id)->update(['name' => $request->name, 'nominal' => $request->nominal, 'date' => $request->date]);

        return response()->json(['message' => 'Update cash successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Cash::destroy($id);

        return response()->json(['message' => 'Delete cash successfully'], 200);
    }
}
