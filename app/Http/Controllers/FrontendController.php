<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $product = Product::latest()->take(8)->get();
        return view('index', compact('product'));
    }

    public function about()
    {
        return view('about');
    }
    public function product()
    {
        $category = Category::all();
        $product = Product::latest()->get();
        return view('product', compact('category', 'product'));
    }
    public function singleProduct(Product $product)
    {
        return view('single', compact('product'));
    }
    public function filterByCategory($slug)
    {
        $category = Category::all();
        $selectedCategory = Category::where('slug', $slug)->firstOrFail();
        $product = Product::where('category_id', $selectedCategory->id)->latest()->get();
        return view('product', compact('category', 'selectedCategory', 'product'));
    }

    public function search()
    {
        $query = request('q');

        $product = Product::where('name', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->OrWhereHas('category', function ($q) use ($query){$q->where('name', 'like', '%' . $query . '%'); })->latest()->get();
        $category = Category::all();
        return view('product', compact('product', 'category', 'query'));
    }
}
