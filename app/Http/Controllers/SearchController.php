<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Product;


use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $searchParam= $request->query()['q'];

        $searchProduct = Product::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($searchParam) . '%'])
        ->orWhereHas('type', function ($query) use ($searchParam) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($searchParam) . '%']);
        })
        ->get();

        return Inertia::render('Search', [
            'searchProduct' => $searchProduct,
            'query' => $searchParam,
        ]);
    }
}
