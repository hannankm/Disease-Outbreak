<?php

namespace App\Http\Controllers;

use App\Models\Woreda;
use App\Models\Zone;
use Illuminate\Http\Request;

class WoredaController extends Controller
{
    // Display a listing of the woredas for a specific zone
    public function index($zoneId)
    {
        $zone = Zone::findOrFail($zoneId);
        $woredas = $zone->woredas;
        return response()->json($woredas);
    }

    // Store a newly created woreda
    public function store(Request $request, $zoneId)
    {
        $zone = Zone::findOrFail($zoneId);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $woreda = $zone->woredas()->create([
            'name' => $request->name,
        ]);

        return response()->json($woreda, 201);
    }

    // Display the specified woreda
    public function show($zoneId, $id)
    {
        $zone = Zone::findOrFail($zoneId);
        $woreda = $zone->woredas()->findOrFail($id);
        return response()->json($woreda);
    }

    // Update the specified woreda
    public function update(Request $request, $zoneId, $id)
    {
        $zone = Zone::findOrFail($zoneId);
        $woreda = $zone->woredas()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $woreda->update([
            'name' => $request->name,
        ]);

        return response()->json($woreda);
    }

    // Remove the specified woreda
    public function destroy($zoneId, $id)
    {
        $zone = Zone::findOrFail($zoneId);
        $woreda = $zone->woredas()->findOrFail($id);
        $woreda->delete();

        return response()->json(null, 204);
    }
}

