<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function top(Request $request){
        $type = $request->query('type');
        $limit = $request->query('limit');

        if (!in_array($type, ['recent', 'past']) || !is_numeric($limit) || $limit < 1 || $limit > 100) {
            return response()->json(['status' => 'ERROR', 'errors' => 'Bad request'], 400);
        }

        $query = Animal::orderBy('created_at', $type === 'recent' ? 'DESC' : 'ASC')->limit($limit);
        return response()->json($query->get());
    }
}
