<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Continent;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continents = Continent::orderBy('id', 'desc');
        if (request()->has('name')) {
            $continents = $continents->where('name', 'Like', '%' . request('name') . '%');
        }
        $continents = $continents->paginate(10);
        return view('admin.contactUs.allContinents', ['continents' => $continents, 'pageTitle' => 'All'])
            ->withInput(request()->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contactUs.addEditContinents', ['pageTitle' => 'Add', 'continent' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $continent = new Continent;
        $continent->fill(request()->all());
        if ($continent->save()) {
            return back()->with('global', 'Data Saved')->with('type', 'success');
        } else {
            return back()->with('global', 'Data Saved Failed')->with('type', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $continent = Continent::find($id);
        return view('admin.contactUs.addEditContinents', ['pageTitle' => 'Edit', 'continent' => $continent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $continent = Continent::find($id);
        $continent->fill(request()->all());
        if ($continent->save()) {
            return back()->with('global', 'Data Saved')->with('type', 'success');
        } else {
            return back()->with('global', 'Data Saved Failed')->with('type', 'error');
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
        $continent = Continent::find($id);
        if ($continent->delete()) {
            return back()->with('global', 'Deleted Successfully')->with('type', 'success');
        }
        return back()->with('global', 'Not Deleted')->with('type', 'error');
    }
}
