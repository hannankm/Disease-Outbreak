<?php


namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Resources\RegionResource;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    // Display a listing of the regions
    public function index()
    {
        // Use RegionResource to format the response
        return RegionResource::collection(Region::with('zones.woredas')->get());
    }

    // Store a newly created region
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region = Region::create([
            'name' => $request->name,
        ]);

        // Wrap the created resource in RegionResource
        return new RegionResource($region);
    }

    // Display the specified region
    public function show(Region $region)
    {
        // Use RegionResource to format the response with relationships
        return new RegionResource($region->load('zones.woredas'));
    }

    // Update the specified region
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region->update([
            'name' => $request->name,
        ]);

        // Wrap the updated resource in RegionResource
        return new RegionResource($region);
    }

    // Remove the specified region
    public function destroy(Region $region)
    {
        $region->delete();

        // Return a JSON response with success message
        return response()->json(['message' => 'Region deleted successfully'], 204);
    }
}
