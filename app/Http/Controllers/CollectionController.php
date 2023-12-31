<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Collection;
use App\Models\UserBookCollection;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Auth::user()->collections;

        return view('collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        $validated = $request->validated();
        Collection::create($validated);

        return redirect()->route('collections.index')->with('success', 'Collection created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        return view('collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $validated = $request->validated();
        $collection->update($validated);

        return redirect()->route('collections.index')->with('success', 'Collection updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        UserBookCollection::where('collection_id', '=', $collection->id)->delete();
        $collection->delete();

        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully!');
    }
}
