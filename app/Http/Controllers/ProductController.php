<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function urlFetch()
    {
        return view('url', [
            "title" => "Fetch URL",
        ]);
    }

    public function fetchData(Request $request)
    {
        try {
            // $response = Http::get('https://dummyjson.com/products');
            $response = Http::get($request->fetch);
            //  dd($response);

            $jsonData = json_decode($response->body(), true);

            if (isset($jsonData['products']) && is_array($jsonData['products'])) {
                foreach ($jsonData['products'] as $productData) {
                    try {
                        $product = Product::updateOrCreate(
                            ['id' => $productData['id']], // Search criteria
                            [
                                'title' => $productData['title'],
                                'description' => $productData['description'],
                                'price' => $productData['price'],
                                'discountPercentage' => $productData['discountPercentage'],
                                'rating' => $productData['rating'],
                                'stock' => $productData['stock'],
                                'brand' => $productData['brand'],
                                'category' => $productData['category'],
                                'thumbnail' => $productData['thumbnail'],
                                'images' => implode(', ', $productData['images'])
                            ]
                        );
                    } catch (\Exception $e) {
                        // Handle database update/create error
                        return redirect('/url')->with('failed', 'Gagal Menambahkan Data ke Database!!!');
                    }
                }
            } else {
                // Handle invalid JSON response
                return redirect('/url')->with('failed', 'Gagal Mendapatkan Data dari API!!!');
            }
        } catch (RequestException $e) {
            // Handle HTTP request error
            return redirect('/url')->with('failed', 'Gagal Melakukan HTTP Request!!!');
        }

        return redirect('/url')->with('success', 'Data Berhasil Ditambahkan ke Database!!!');
    }

    public function allProducts()
    {
        return view('product.index', [
            "title" => "All Products",
            "products" => Product::orderBy('id', 'asc')->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }


    public function show(Product $product)
    {
        return view('product.show', [
            "title" => "Detail $product->name",
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return view('product.edit', [
            'title' => "Ubah Product",
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->action == 'cancel') {
            return redirect('products');
        }

        if ($request->action == 'update') {
            $validatedData = $request->validate([
                'title' => 'required|min:2|max:100',
                'description' => 'required|min:5',
                'price' => 'required',
                'discountPercentage' => 'required',
                'rating' => 'required',
                'stock' => 'required',
                'brand' => 'required|min:2',
                'category' => 'required|min:2',
                'thumbnail' => 'required',
                'images' => 'required',
            ]);

            Product::where('id', $product->id)
                ->update($validatedData);

            return redirect('/products')->with('success', 'Product berhasil diperbarui!!!');
        }
    }
}
