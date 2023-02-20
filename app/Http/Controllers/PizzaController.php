<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Http\Requests\PizzaUpdateRequest;
use App\Models\Category;
use App\Models\Pizza;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subcategory_id)
    {
        if (Auth::check()) {
            $subcategory = SubCategory::find($subcategory_id);
            //$pizzas = Pizza::paginate(3);
            $category = Category::where("id", $subcategory->category_id)->first();
            $pizzas = Pizza::where('subcategory_id', $subcategory->id)->paginate(3);
            return view('pizza.index', compact('pizzas', 'subcategory', 'category'));
        } else {
            return redirect()->route("frontpage");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subcategory_id)
    {
        if (Auth::check()) {
            $subcategory = SubCategory::find($subcategory_id);
            return view('pizza.create', compact("subcategory"));
        } else {
            return redirect()->route("frontpage");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequest $request, $subcategory_id)
    {
        $subcategory = SubCategory::find($subcategory_id);

        $imageName = "noimage.png";
        if ($request->image) {
            $request->validate([
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $request->image->extension();
            $request->image->move(public_path('pizza_images'), $imageName);
        }

        $pizza = new Pizza();
        $pizza->subcategory_id = $subcategory->id;
        $pizza->name = $request->name;
        $pizza->url = Str::slug($request->name, "-");
        $pizza->description = $request->description;
        $pizza->image = $imageName;
        $pizza->price = $request->price;

        $pizza->save();
        return redirect()->route('pizza.index', $subcategory->id)->with('message', 'Pizza başarıyla eklendi!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $pizza = Pizza::find($id);
            return view('pizza.edit', compact('pizza'));
        } else {
            return redirect()->route("frontpage");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequest $request, $id)
    {
        $pizza = Pizza::find($id);

        if ($request->image) {
            $request->validate([
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);

            if ($pizza->image != "noimage.png") {
                $imageName = $pizza->image;
                unlink(public_path('pizza_images') . '/' . $imageName);
            }
            $imageName = Carbon::now()->timestamp . '.' . $request->image->extension();
            $request->image->move(public_path('pizza_images'), $imageName);
        } else {
            $imageName = $pizza->image;
        }

        $pizza->name = $request->name;
        $pizza->url = Str::slug($request->name, "-");
        $pizza->description = $request->description;
        $pizza->price = $request->price;
        $pizza->image = $imageName;

        $pizza->save();
        return redirect()->route('pizza.index', $pizza->subcategory_id)->with('message', 'Pizza başarıyla güncellendi!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);
        if ($pizza->image != "noimage.png") {
            unlink(public_path('pizza_images') . '/' . $pizza->image);
        }

        $pizza->delete();
        return redirect()->route('pizza.index', $pizza->subcategory_id)->with('message', 'Pizza başarıyla silindi!');

    }
}
