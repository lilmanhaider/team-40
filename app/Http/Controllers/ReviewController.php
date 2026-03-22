<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Review::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id,
        'rating' => $request->rating,
        'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Review submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviews = Review::where('product_id', $id)->get();

        return view('product', [
            'reviews' => $reviews
        ]);
    }
}
