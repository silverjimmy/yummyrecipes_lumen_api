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

    public function add(Request $request)
    {
        //dd((array)$request);
        $this->validate(
            $request, [
                'name' => 'required|string|min: 5|max: 20',
                'description' =>'required'
            ]);

        if (Category::where('name', $request->name)->first())
        {
            return response(['error'=>'Name already exits'], 400);
        } else {
            $category = Category::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'created_by'=>$request->user()->id
            ]);
            return response($category, 201);
        }


            

    }

    public function all(Request $request)
    {
        $categories = Category::all();

        return response($categories, 200);
    }

    public function get_category($id)
    {
//        $this->validate(
//            $request, [
//                'id' => 'required|integer'
//            ]
//        );
//        dd($request->id);
        $category = Category::find($id);
        return response($category, 200);
    }
    public function delete_category($id)
    {
        $message = "Category was not found";

        $category = Category::find($id);
        if ($category){
            $category -> delete();
            $message = "Category was deleted";
        }
        return response(["message"=>$message], 200);
    }
    public function update_category(Request $request, $id)
    {
        $message ="Category doesnt exits";
        $category = Category::find($id);
        if($category){
            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();
            $message = "Category was updated successfully";
        }

        return response(["message"=>$message], 200);
    }

    //use try...catch() to check for error condition.
}
