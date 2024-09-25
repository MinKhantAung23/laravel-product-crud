<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        return view('item.index',compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        // return $request;
        if($request->image){

            $file = $request->image;

            $newName = "item_image".uniqid().".".$file->extension();
            
            $file->storeAs('public/itemImage', $newName );
        }

        $item = new Item();
        $item->title = $request->title;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->image = $newName;
        $item->save();



    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if($item){
            $item->delete();
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $categories = Category::all();

        $query = $request->input('query');

        $items = Item::where('title','LIKE',"%{$query}%")->get();

        return view('item.index',compact('items','categories'));
    }

    public function searchDetail(Request $request)
    {
        $categories = Category::all();

        $min = $request->input('min');
        $max = $request->input('max');
        $category = $request->input('category');

        $items = Item::where('price','>=',$min)
                 ->where('price','<=',$max)
                 ->where('category_id',$category)
                 ->get();

        return view('item.index',compact('items','categories'));

    }
}
