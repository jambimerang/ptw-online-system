<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function index()
    {
        return Permit::all();
    }

    public function store(Request $request)
    {
        $permit = Permit::create($request->all());

        return response()->json($permit, 201);
    }

    public function show($id)
    {
        return Permit::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $permit = Permit::findOrFail($id);

        $permit->update($request->all());

        return response()->json($permit);
    }

    public function destroy($id)
    {
        Permit::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}