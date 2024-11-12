<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListCategoryRequest;
use App\Http\Requests\UpdateListCategoryRequest;
use App\Models\ListCategory;

class ListCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listcategories = ListCategory::with('categories')->get();
        return view('home', compact('listcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListCategory $listCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListCategory $listCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListCategoryRequest $request, ListCategory $listCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListCategory $listCategory)
    {
        //
    }
}
