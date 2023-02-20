<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id)
    {
        if (Auth::check()) {
            $category = Category::find($category_id);
            $subcategories = SubCategory::where('category_id', $category->id)->paginate(3);
            //$subcategories = SubCategory::all();
            return view("subcategory.index", compact("category", "subcategories"));
        } else {
            return redirect()->route("frontpage");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        if (Auth::check()) {
            $category = Category::find($category_id);
            return view("subcategory.create", compact("category"));
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
    public function store(Request $request, $category_id)
    {
        $category = Category::find($category_id);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $subcategory = new SubCategory();
        $subcategory->category_id = $category->id;
        $subcategory->name = $request->name;
        $subcategory->url = Str::slug($request->name, "-");

        $subcategory->save();
        return redirect()->route('subcategory.index', $category->id)->with('message', 'Alt kategori başarıyla eklendi!');
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
            $subcategory = SubCategory::find($id);
            $categories = Category::all();
            return view("subcategory.edit", compact("subcategory", "categories"));
        } else {
            return view("frontpage");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->url = Str::slug($request->name, "-");

        $subcategory->save();
        return redirect()->route('subcategory.index', $subcategory->category_id)->with('message', 'Alt kategori başarıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index', $subcategory->category_id)->with('message', 'Alt kategori başarıyla silindi!');
    }
}
