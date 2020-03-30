<?php

namespace LearnApp\Http\Controllers;

use Illuminate\Http\Request;
use LearnApp\Category;
use LearnApp\Http\Requests\Catogries\CreateCatogeryRequest;
use LearnApp\Http\Requests\Catogries\UpdateCatogeryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('catogries.index')->with('catogries', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('catogries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatogeryRequest $request)
    {

        Category::create([
            'name' => $request->name
        ]);

        return redirect(route('catogries.index'));
        
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
    public function edit(Category $catogry)
    {
        return view('catogries.create')->with('category',$catogry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatogeryRequest $request, Category $catogry)
    {
       $catogry->name = $request->name;
       $catogry->save();

       return redirect(route('catogries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $catogry)
    {
     
        $catogry->delete();
        return redirect(route('catogries.index'));
    }
}
