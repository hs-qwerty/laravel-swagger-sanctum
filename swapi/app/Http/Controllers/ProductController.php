<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return ProductResource::collection($product);
    }

    public function get($id)
    {
        try {
            $product = Product::findOrfail($id);

            return response()->json($product);
        }catch (ModelNotFoundException  $exception)
        {
            return response()->json( ["message" => "Product not found" ],404);
        }
    }

    public function store(Request $request)
    {

        /*
         * key
         */
//        Http::withHeaders([
//            'Authorization' => 'secretKey',
//        ])->get('https://swapi.dev/api/', [
//            'category' => $request->key_value,
//            'value' => $request->page,
//        ]);


        $url = "https://swapi.dev/api/".$request->category."/".$request->value."/";
        $values = Http::get($url)->json();

        Product::create([
            "category" => $request->category,
            "number" => $request->value,
            'detail' => json_encode($values)
        ]);

        return $values;
    }

    public function update($id, Request $request)
    {
        try {
            $product = Product::query()
                ->where('id','=', $id)
                ->update([
                    'category' => $request->category,
                    'number' => $request->number,
                    'detail' => $request->detail
                ]);

            return json_encode($product);
        }catch (ModelNotFoundException $exception)
        {
            return response()->json(["msg"=>$exception->getMessage()],404);
        }
    }

    public function delete($id)
    {
        try {
            Product::findOrFail($id)->delete($id);
            return response()->json([ "message" => "delete success"]);

        }catch (ModelNotFoundException $exception){

            return response()->json(["message"=>$exception->getMessage()],404);
        }
    }
}
