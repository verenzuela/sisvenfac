<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Iluminate\Support\Facades\Redirect;
use DB;


class CategoryController extends Controller
{   
    public function __construct(){

    }

    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'max:250'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('searchText'));
            $categories = DB::table('categories')->where('name', 'LIKE', '%' . $query . '%')
                ->where('condition', '=', '1')
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('store.category.index',  ['categories' => $categories, 'searchText' => $query] );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);

        $category = new Category();
        $category->name = $request["name"];
        $category->description = $request["description"];
        $category->condition = 1;
        $category->save();

        return redirect()->route('store.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('store.category.show', ["category" => Category::findOrFail($id)] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('store.category.edit', ["category" => Category::findOrFail($id)] );
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
        $this->validateInput($request);

        $category = Category::findOrFail($id);
        $category->name = $request["name"];
        $category->description = $request["description"];
        $category->update();

        return redirect()->route('store.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->condition = 0;
        $category->update();

        return redirect()->route('store.index');
    }
}
