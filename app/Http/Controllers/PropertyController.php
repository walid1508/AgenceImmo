<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        if($price = $request->validated('price')){
            $query = $query->where('price', '<=', $price);
        }
        if($surface = $request->has('surface')){
            $query = $query->where('surface', '<=', $surface);
        }
        if($rooms = $request->has('rooms')){
            $query = $query->where('rooms', '<=', $rooms);
        }
        if($title = $request->has('title')){
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if ($slug === $expectedSlug){
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', ['property' => $property]);
    }
}
