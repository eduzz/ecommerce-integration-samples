<?php

namespace App\Http\Controllers;

use App\HttpClient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProdutoController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("produtos", compact("products"));
    }

    public function create(Request $request)
    {
        try {
            $product = new Product();
            $product->fill($request->all());

            $eduzzProduct = HttpClient::post(["product" => $request->all()], "product", $request->attributes->get("oauth_token"));

            $product->my_eduzz_id = $eduzzProduct->id;
            $product->checkout_id = $eduzzProduct->checkout_product_id;
            $product->save();

            return redirect()->route("produtos.index");
        } catch (\Exception $e) {
            Cache::add("error", $e->getMessage(), 1);
            return redirect()->route("produtos.index");
        }
    }
}