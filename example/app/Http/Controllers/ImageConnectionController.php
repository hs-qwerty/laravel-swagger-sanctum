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
            'query' => 'paris',
            'page' => '1',
            'per_page' => '3',
            'client_id' => "xQ0a4MtIbRuzVPrJAUuOQlb_cmRBl8TS4I33Dch2wVI",
        ]);


        for ($i=0; $i < 3; $i++)
        {

         $create = ImageConnection::create([
                'name' => "1",
                'url' => $req['results'][$i]['urls']['full'],
                'photoId' => '1',
                'first_name' => '1',
                'last_name' => '1'
            ]);

        }


        if ($create)
        {
            return back()->with('success','Image record Success');

        }else {

            return back()->with('fail','Image record Error');

        }




    }
    //
}
