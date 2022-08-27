<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenApi\Annotations as OA;


class HomeController extends Controller
{
    /**
     * List
     * @OA\Get (
     *     path="/api/index",
     *     tags={"SWAPI - The Star Wars API"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="category",
     *                         type="string",
     *                         example="category"
     *                     ),
     *                     @OA\Property(
     *                         property="number",
     *                         type="string",
     *                         example="number"
     *                     ),
     *                     @OA\Property(
     *                         property="detail",
     *                         type="string",
     *                         example="detail"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $product = Product::all();
        return response()->json( ["rows"=>$product] );
    }

    /**
     * Store
     * @OA\Post (
     *     path="/api/store",
     *     tags={"SWAPI - The Star Wars API"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="string",
     *                      @OA\Property(
     *                          property="category",
     *                          type="string"
     *                      ),
     *                      type="string",
     *                      @OA\Property(
     *                          property="value",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "category":"people, planets, starships",
     *                     "value":"1, 3, 9"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="category", type="string", example="people, planets, starships"),
     *              @OA\Property(property="value", type="string", example="1, 3, 9"),
     *              @OA\Property(property="detail", type="string", example="{name: , rotation_period: 24, orbital_period: 4818, diameter: 10200, climate: temperate, tropical, gravity: 1 standard, terrain: jungle, rainforests, surface_water: 8, population: 1000, residents: [], films: [https://swapi.dev/api/films/1/], created: 2014-12-10T11:37:19.144000Z,edited: 2014-12-20T20:58:18.421000Z, url: https://swapi.dev/api/planets/3/ }"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {

        $url = "https://swapi.dev/api/".$request->category."/".$request->value."/";
        $values = Http::get($url)->json();

        Product::create([
                "category" => $request->category,
                "number" => $request->value,
                'detail' => json_encode($values)
            ]);

        return $values;
    }



    /**
     * Get Detail Product
     * @OA\Get (
     *     path="/api/get/{id}",
     *     tags={"SWAPI - The Star Wars API"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="detail", type="string", example="detail"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z")
     *         )
     *     )
     * )
     */
    public function get($id){

        try {
            $product = Product::findOrfail($id);
            return response()->json($product);
        }catch (ModelNotFoundException  $exception)
        {
            return response()->json( ["message" => "Product not found" ],404);
        }
    }


    /**
     * Update
     * @OA\Put (
     *     path="/api/update/{id}",
     *     tags={"SWAPI - The Star Wars API"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="string",
     *                      @OA\Property(
     *                          property="title",
     *                          type="string"
     *                      ),
     *                      type="string",
     *                      @OA\Property(
     *                          property="number",
     *                          type="string"
     *                      ),
     *                      type="string",
     *                      @OA\Property(
     *                          property="detail",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "category":"category",
     *                     "number":"number",
     *                     "detail":"detail"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="category", type="string", example="people, planets, starships"),
     *              @OA\Property(property="value", type="string", example="1, 3, 9"),
     *              @OA\Property(property="detail", type="string", example="{name: , rotation_period: 24, orbital_period: 4818, diameter: 10200, climate: temperate, tropical, gravity: 1 standard, terrain: jungle, rainforests, surface_water: 8, population: 1000, residents: [], films: [https://swapi.dev/api/films/1/], created: 2014-12-10T11:37:19.144000Z,edited: 2014-12-20T20:58:18.421000Z, url: https://swapi.dev/api/planets/3/ }"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
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


    /**
     * Delete
     * @OA\Delete (
     *     path="/api/delete/{id}",
     *     tags={"SWAPI - The Star Wars API"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="messsage", type="string", example="delete product")
     *         )
     *     )
     * )
     */
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
