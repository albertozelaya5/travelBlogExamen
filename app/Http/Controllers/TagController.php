<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function suggest(Request $request)
    {
        $query = $request->get('query');

        // Consulta en la base de datos para obtener sugerencias de tags
        $tags = Tag::where('name', 'LIKE', "%{$query}%")->pluck('name');

        return response()->json($tags);
    }
}
