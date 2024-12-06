<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog,App\BlogCategory;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    private $blogs;
    public function __construct(Blog $blogs, BlogCategory $blogCategories)
    {
        $this->blogs = $blogs->orderBy('id','asc');
        $this->blogCategories = $blogCategories->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.blogs.blogs',['blogs' => $this->blogs->paginate(10),'request' => $request])->withInput(request()->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $blog = new Blog;
        return view('admin.blogs.add-edit-blog',['blog' => $blog,'request' => $request,'categories' => $this->blogCategories])->withInput(request()->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog;
        $done = $request->addEditBlog($blog);
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
        return view('admin.blogs.add-edit-blog',['blog' => $this->blogs->where('id',$id)->first(),'request' => $request,'categories' => $this->blogCategories])->withInput(request()->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = $this->blogs->where('id',$id)->first();
        $done = $request->addEditBlog($blog);
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
