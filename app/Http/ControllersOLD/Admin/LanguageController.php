<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Language;
use App\Http\Requests\LanguageRequest;


class LanguageController extends Controller
{
    private $languages;
    public function __construct(Language $languages)
    {
        $this->languages = $languages->orderBy('id','asc');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.settings.languages',['languages' => $this->languages->get(),'request' => $request, 'language' => new Language])->withInput(request()->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $language = new Language;
        $done = $request->addEditLanguage($language);
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
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
    public function edit(Request $request,$id)
    {
        return view('admin.settings.languages',['languages' => $this->languages->get(),'language' => $this->languages->where('id',$id)->first(),'request' => $request])->withInput(request()->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        $language = $this->languages->where('id',$id)->first();
        $done = $request->addEditLanguage($language);
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
