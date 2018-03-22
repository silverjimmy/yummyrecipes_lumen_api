<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Recipe;
use App\Category;

class RecipeController extends Controller
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

    public function create_recipe(Request $request, $id)
    {
        $message = 'Category does not exist';
        $recipe = Category::find($id);
        if ($recipe)
        {
            $this->validate(
                $request,[
                'name' => 'required|string',
                'description' => 'required',
            ]);
            $recipes = Recipe::create([
                'name'=> $request->name,
                'description'=> $request->description,
                'category_id' => $id,
            ]);

            $message = 'Recipe created';
        }
        return response (['message'=>$message], 201);
    }

    public function all_recipes(Request $request, $id){

        $message = 'Category has no Recipes';
        $recipe = Category::find($id);
        if ($recipe)
        {
            $recipes = Recipe::all();
        }
        return response ($recipes, 200);
    }

    public function get_recipe(Request $request, $id, $recipe_id)
    {
        $message = 'Category doesnt contain that recipe';
        $recipe = Category::find($id);
        if ($recipe)
        {
            $recipe = Recipe::find($recipe_id);
        }
        return response($recipe, 200);

    }
    public function delete_recipe(Request $request, $id, $recipe_id)
    {
        $recipe = Category::find($id);
        if ($recipe)
        {
            $recipes = Recipe::find($recipe_id);
            $recipes->delete();
        }
        return response('Recipe Deleted');
    }

    //use try...catch() to check for error condition.
}
