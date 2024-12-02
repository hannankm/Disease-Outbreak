<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Resources\ZoneResource;

class ZoneController extends Controller
{
    // Display a listing of the zones for a specific region
    public function index($regionId)
    {
        $region = Region::findOrFail($regionId);

        // Use ZoneResource for structured response
        return ZoneResource::collection($region->zones);
    }

    // Store a newly created zone
    public function store(Request $request, $regionId)
    {
        $region = Region::findOrFail($regionId);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $zone = $region->zones()->create([
            'name' => $request->name,
        ]);

        // Wrap the created zone in ZoneResource
        return new ZoneResource($zone);
    }

    // Display the specified zone
    public function show($regionId, $id)
    {
        $region = Region::findOrFail($regionId);
        $zone = $region->zones()->findOrFail($id);

        // Wrap the zone in ZoneResource
        return new ZoneResource($zone);
    }

    // Update the specified zone
    public function update(Request $request, $regionId, $id)
    {
        $region = Region::findOrFail($regionId);
        $zone = $region->zones()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $zone->update([
            'name' => $request->name,
        ]);

        // Wrap the updated zone in ZoneResource
        return new ZoneResource($zone);
    }

    // Remove the specified zone
    public function destroy($regionId, $id)
    {
        $region = Region::findOrFail($regionId);
        $zone = $region->zones()->findOrFail($id);
        $zone->delete();

        // Return a success response
        return response()->json(['message' => 'Zone deleted successfully'], 204);
    }
}
