<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CookiesController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->paginate(3);
        return view('cookies',['products' => $products]);
    }
    public function create(){
        return view('create-cookie');
    }
    // public function store(Request $request){
    //     //validation
    //     $request->validate([
    //         'name'=> 'required|string|max:25',
    //         'ingredients'=> 'required|array',
    //         'price'=> 'required|numeric|min:0',
    //         'type'=> 'required|string|in:cookies,brownies,cake',
    //     ]);
    //     //create the product
    //     $product =Product::create($request->all());

    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:25',
            'ingredients' => 'required|string|min:3', // textarea string
            'price'       => 'required|numeric|min:0',
            'type'        => 'required|string|in:cookies,brownies,cake',
        ]);

        // Convert textarea string to array (split by commas or newlines)
        $ingredientsArray = array_filter(
            array_map('trim', preg_split('/[,\n]+/', $validated['ingredients']))
        );

        Product::create([
            'name'        => $validated['name'],
            'type'        => $validated['type'],
            'price'       => $validated['price'],
            'ingredients' => $ingredientsArray,
            'user_id'     => 1, // using fixed user ID for now
        ]);

        return redirect()
            ->route('cookies')
            ->with('success', 'Cookie created successfully!');
    }
    public function show($id){
        return view('cooky-details', ['id' => $id]);
    }
}
