<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartStoreRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $foods = Food::all();
        $categories = Category::all();
        $cart = Cart::all()->count();

        return view('welcome', compact('foods', 'categories','cart'));
    }

    public function viewcategory($id)
    {
        $cart = Cart::all()->count();
        $allCategories = Category::all();
        if(Category::where('id', $id)->exists()){
            $categories = Category::where('id', $id)->first();
            $foods = Food::where('category_id', $categories->id)->get();
            return view('food', compact('categories','foods','allCategories','cart'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartStoreRequest $request)
    {
        //
         # code...
         Cart::create($request->validated());
         return redirect()->route('index.index')->with('message', 'Added to Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
