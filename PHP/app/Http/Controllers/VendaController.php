<?php

namespace App\Http\Controllers;

use App\HttpClient;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $clients = User::all();

        $orders = Order::with("items.product")->get();
        return view("vendas", compact("orders", "products", "clients"));
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $product = Product::find($data["product"]);
        $client = User::find($data["client"]);

        $payload = [
          "transaction" => [
              "order_id" => strval(rand(1, 100)),
              "return_url" => env("RETURN_URL"),
              "postback_url" => env("POSTBACK_URL"),
              "installments" => 1,
              "items" => [
                  [
                      "product_id" => $product->my_eduzz_id,
                      "checkout_product_id" => $product->checkout_id,
                      "description" => $product->product_title,
                      "amount" => $data["amount"],
                      "price" => ($product->price * $data["amount"])
                  ]
              ],
              "customer" => [
                "email" => $client->email,
                "name" => $client->name,
                "cellphone" => $client->cellphone,
                "document" => $client->document,
                "person_type" => (strlen($client->document) == 11 ? "F" : "J")
              ]
          ]
        ];

        $response = HttpClient::post($payload, "transaction", $request->attributes->get("oauth_token"));

        $order = new Order();
        $order->user_id = $client->id;
        $order->payment_url = $response->payment_url;
        $order->save();

        $item = new OrderItems();
        $item->product_id = $product->id;
        $item->amount = $data["amount"];
        $item->order_id = $order->id;
        $item->save();


        return redirect()->route("vendas.index");
    }
}
