<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::where("category_id", $request->category_id)->get();
        $pizzas = Pizza::where("subcategory_id", $request->subcategory_id)->get();
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $categoryName = Category::where("id", $category_id)->first();
        return view('frontpage', compact('subcategories', 'categories', 'category_id', 'pizzas', 'categoryName', 'subcategory_id'));
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);
        $subcategory = SubCategory::where("id", $pizza->subcategory_id)->get();
        $category = Category::where("id", $subcategory[0]->category_id)->get();
        return view('show', compact('pizza', 'subcategory', 'category'));
    }

    public function store(Request $request)
    {
        if ($request->pizza_quantity == 0) {
            return back()->with('errmessage', 'Lütfen en az bir pizza sipariş edin!');
        }
        if ($request->pizza_quantity < 0) {
            return back()->with('errmessage', 'Siparişin negatif sayı olmamalıdır!');
        }

        $pizza = Pizza::find($request->pizza_id);
        $subcategory = SubCategory::where("id", $pizza->subcategory_id)->get();
        $category = Category::where("id", $subcategory[0]->category_id)->get();

        Order::create([
            'time' => $request->time,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
            'category_id' => $category[0]->id,
            'subcategory_id' => $subcategory[0]->id,
            'pizza_id' => $request->pizza_id,
            'pizza_quantity' => $request->pizza_quantity,
            'body' => $request->body,
            'phone' => $request->phone
        ]);
        return back()->with('message', 'Siparişiniz başarıyla alındı!');

    }

}
