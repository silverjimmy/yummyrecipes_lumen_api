<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category(Request $request)
    {
        $this->validate(
            $request, [
                'name' => 'required|string|min: 5|max: 20',
                'description' =>'required',
                'created_by' => 'required'
            ]);
            $category =Category::create([
                'name' => $request -> name,
                'description' => $request -> description,
                'created_by' => $request -> created_by,
            ]);

        return response($category, 201);
            

    }

    //
}
