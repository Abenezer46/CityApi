<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // In-meomry array (NO database)
    private static array $cities =[
        ['id' => 1, 'name' => 'Addis Ababa', 'country' => 'Ethiopia'],
        ['id' => 2, 'name' => 'Nairobi', 'country' => 'Kenya'],
    ];

    // GET /api/cities
    public function index()
    {
        return response()->json(self::$cities);
    }


    // GET /api/cities/{id}
    public function show($id)
    {
        $city = collect(self::$cities)->firstWhere('id', (int)$id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        return response()->json($city);
    }

    // POST /api/cities
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
        ]);

        // Create a new city
        $nextId = collect(self::$cities)->max('id') + 1;
        $city = [
            'id' => $nextId,
            'name' => $request->input('name'),
            'country' => $request->input('country'),
        ];

        self::$cities[] = $city;

        return response()->json($city, 201);
    }

    // PUT /api/cities/{id}
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
        ]);

        // Update the city
        foreach (self::$cities as $index => $city) {
            if ($city['id'] == $id) {
                self::$cities[$index]['name'] = $request->name ?? $city['name'];
                self::$cities[$index]['country'] = $request->country ?? $city['country'];

                return response()->json(self::$cities[$index]);
            }
        }

        return response()->json(['message' => 'City not found'], 404);
    }

    // DELETE /api/cities/{id}
    public function destroy($id)
    {
        foreach (self::$cities as $index => $city) {
            if ($city['id'] == $id) {
                array_splice(self::$cities, $index, 1);
                return response()->json(['message' => 'City deleted']);
            }
        }

        return response()->json(['message' => 'City not found'], 404);
    }

}
