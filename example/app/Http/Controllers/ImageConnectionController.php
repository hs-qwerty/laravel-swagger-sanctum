<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\ImageConnection;

class ImageConnectionController extends Controller
{

    public function index(Request $request)
    {


        $req = Http::get('https://api.unsplash.com/search/photos', [
            'query' => $request->key_value,
            'page' => $request->page,
            'per_page' => $request->per_page,
            'client_id' => "xQ0a4MtIbRuzVPrJAUuOQlb_cmRBl8TS4I33Dch2wVI",
        ]);


        //return $req['results'][0]['description'];
        //exit;

        try {

        for ($i=0; $i < $request->per_page; $i++)
        {

         $create = ImageConnection::create([
                'photographerId' => $request->photographerId,
                'name' => $req['results'][$i]['user']['username'],
                'description' => $req['results'][$i]['description'],
                'url' => $req['results'][$i]['urls'][$request->urls],
                'photoId' => $req['results'][$i]['id'],
                'first_name' => $req['results'][$i]['user']['first_name'],
                'last_name' => $req['results'][$i]['user']['last_name'],
                'category' => $request->urls,
                'order' => $i
            ]);

        }

                if ($create)
                {
                    return back()->with('success','Image record Success');

                }else {

                    return back()->with('fail','Image record Error');

                }

        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->back()->with(['fails' => 'There was an error']);

        }





}
    //

    public function pexels(Request $request)
    {

       $req =  Http::withHeaders([
            'Authorization' => '563492ad6f9170000100000105ca3b74cb85411ea9e6d007dac401e3',
        ])->get('https://api.pexels.com/v1/search?query=people', [
            'query' => $request->key_value,
            'page' => $request->page,
            'per_page' => $request->per_page,
            'color' => $request->color
        ]);

       try{

           for ($i=0; $i < $request->per_page; $i++)
           {

               $create = ImageConnection::create([
                   'photographerId' => $request->photographerId,
                   'name' => $req['photos'][$i]['photographer'],
                   'description' => $req['photos'][$i]['alt'],
                   'url' =>  $req['photos'][$i]['src']['original'],
                   'photoId' => $req['photos'][$i]['id'],
                   'first_name' => $req['photos'][$i]['photographer'],
                   'last_name' => $req['photos'][$i]['photographer'],
                   'category' => $request->color,
                   'order' => $i
               ]);

           }

           if ($create)
           {
               return back()->with('success','Image record Success');
           }else {
               return back()->with('fails','Image record Error');
           }

       } catch (\Exception $exception) {

           \Log::error($exception);
           return redirect()->back()->with(['fails' => 'There was an error']);

       }





}
}
