<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotographerStoreRequest;
use App\Http\Requests\PhotographerUpdateRequest;
use App\Models\Photographer;
use App\Models\ImageConnection;
use Illuminate\Http\Request;

class PhotographerContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('photographer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotographerStoreRequest $request)
    {

        $photographer = new Photographer();
        $photographer->name = $request->name;
        $photographer->link = $request->link;
        $photographer->location = $request->location;

        $save = $photographer->save();

        if ($save)
        {
            return back()->with('success', 'Photographer is Create');
        }else {
            return back()->with('fail', 'Create Fails');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $photographer = Photographer::all();

        return view('photographer.index', compact('photographer'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {

            $photographer = Photographer::findorFail($id);

            return view('photographer.edit', compact('photographer') );

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotographerUpdateRequest $request, $id)
    {

        try {

            $photographer = Photographer::findorfail($id);
            $photographer->name = $request->name;
            $photographer->link = $request->link;
            $photographer->location = $request->location;

            $save = $photographer->save();

            if ($save)
            {
                return back()->with('success', 'Photographer is Update');
            }else {
                return back()->with('fail', 'Update Fails');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return back()->with('fail', 'There was an error');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            $photographer = Photographer::find($id);
            $delete = $photographer->delete();

            if ($delete)
            {
                return back()->with('success','Photographer Delete Success');

            }else {

                return back()->with('fail','Photographer Delete Error');

            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }
        //
    }

    public function gallery(Request $request, $id)
    {

        //return $request->qt;

        if ($request->has('qt')) {

            $photographer = ImageConnection::search($request->qt)->orderBy('order','ASC')->get();
        }else {
            $photographer = ImageConnection::orderBy('order','ASC')->get();
        }

        //return ImageConnection::find(1)->photographer->name;
       //$photographer =  Photographer::find($id)->getImage;

       return view('photographer.gallery',compact('photographer'));
    }
}
