<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index()
    {

        return view('image.index');

    }

    public function create()
    {

        $protographer = Photographer::all();
        return view('image.create', compact('protographer'));
    }

    public function pexels()
    {
        $protographer = Photographer::all();
        return view('image.pexels', compact('protographer'));
    }
    //
}
