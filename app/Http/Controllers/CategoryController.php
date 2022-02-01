<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Str;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category = Category::all();
        $all_category = Category::latest()->paginate(3);
        return view('category/index', compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
        ]);
        // print_r($request->all());
        $category_name = Str::lower($request->category_name);

        if(category::where('category_name','=', $category_name)->doesntExist()){
            category::insert([
                'category_name' => $category_name,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'added_by'=> Auth::user()->id,
            ]);
        }
        else{
            return back()->with('InsErr','Already Inserted');
        }

        
        return back()->with('InsDone', $request->category_name.' category added Succsessfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Category::find($id)->delete();
       return back()->with('delete_status', 'Your Category Deleted Successfully!');
    }

    public function deletedcategory(){
        $all_trashed = Category::onlyTrashed()->get();
        return view('category.trashed',compact('all_trashed'));
    }


    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
       return redirect('/category/index')->with('success_status', 'Your Category Deleted Successfully!');
    }

































}
