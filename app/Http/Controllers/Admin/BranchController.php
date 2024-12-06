<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\Continent;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continents = Continent::orderBy('id','desc')->pluck('name','id')->all();
        $branches = Branch::orderBy('id','desc');
        if(request()->has('continent_id'))
        {
            $branches = $branches->where('continent_id',request('continent_id'));
        }
        $branches = $branches->paginate(10);
        return view('admin.contactUs.allBranches',['branches'=>$branches,'continents' => $continents, 'pageTitle' => 'All']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continents = Continent::orderBy('id','desc')->pluck('name','id')->all();
        return view('admin.contactUs.addEditBranches',['pageTitle' => 'Add', 'branch' => null,'continents'=>$continents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branch;
        $branch->fill(request()->all());
        if($branch->save())
        {
            return back()->with('global','Data Saved')->with('type','success');
        }
        else
        {
            return back()->with('global','Data Saved Failed')->with('type','error');
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
        $continents = Continent::orderBy('id','desc')->pluck('name','id')->all();
        $branch = Branch::find($id);
        return view('admin.contactUs.addEditBranches',['pageTitle' => 'Edit', 'branch' => $branch,'continents'=>$continents]);
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
        $branch = Branch::find($id);
        $branch->fill(request()->all());
        if($branch->save())
        {
            return back()->with('global','Data Saved')->with('type','success');
        }
        else
        {
            return back()->with('global','Data Saved Failed')->with('type','error');
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
        $branch = Branch::find($id);
        if($branch->delete())
        {
            return back()->with('global','Deleted Successfully')->with('type','success');
        }
        return back()->with('global','Not Deleted')->with('type','error');
        
    }
}