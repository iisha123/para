<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request)
    {

        // Get the selected category from the request (default to all if not provided)
        $category = $request->get('category', '*');

        // Fetch products based on the selected category with pagination
        if ($category === '*') {
            $products = Product::paginate(12); // Increased pagination to show more products
        } else {
            $products = Product::where('category', $category)->paginate(12); // Filter by category and paginate
        }

        // Get all available categories for the filter
        $categories = Product::select('category')->distinct()->get()->pluck('category');

        $totalProducts = Product::count();


        // Pass variables to the view
        return view('produits', compact('products', 'categories', 'totalProducts'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->fill($validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Find the product by ID and update its details
        $product = Product::findOrFail($id);
        $product->update($validated);

        // Redirect back with a success message
        return redirect()->route('admin')->with('success', 'Product updated successfully!');
    }

    public function create()
    {
        // Define categories
        $categories = ['Face', 'Lip', 'Body', 'Hair'];




        // Pass categories to the view
        return view('admin.create-product', compact('categories'));
    }

    // Store the product in the database
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|in:Face,Lip,Body,Hair',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure valid image
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product = new Product;

        // Store the product
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('products', 'public');
            $product->image = $filePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }
    public function destroy(Product $product)
    {
        // Delete the product from the database
        $product->delete();

        // Redirect back with a success message
        return back()->with('success', 'Product deleted successfully!');
    }
    public function showCart()
    {
        $userId = session('user_id');
        $order = \App\Models\Order::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        $cart = session('cart', []);
        return view('cart', compact('order', 'cart'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        session(['cart' => $cart]);

        // --- Save order in database (minimal, as a draft/pending order) ---
        $userId = session('user_id'); // or use Auth::id() if using Laravel Auth
        $orderNumber = 'ORD-' . time() . rand(100, 999);

        $order = new \App\Models\Order();
        $order->user_id = $userId;
        $order->order_number = $orderNumber;
        $order->status = 'pending';
        $order->order_details = json_encode($cart);
        $order->total_amount = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        $order->save();

        // Redirect to the cart page with a success message
        return redirect()->route('cart')->with('success', 'Product added to cart and order saved!');
    }
}
