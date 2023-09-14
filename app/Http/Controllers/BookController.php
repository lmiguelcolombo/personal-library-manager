<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Collection;
use App\Models\UserBookCollection;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Auth::user()->collections;
        $idOfSelectedCollection = $collections->first()->id;
        session(['selected_collection' => $idOfSelectedCollection]);

        $selectedCollection = Collection::findOrFail($idOfSelectedCollection);
        $books = $selectedCollection->books;


        return view('books.index', compact('books', 'collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collections = Auth::user()->collections;

        return view('books.create', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();
        $book = Book::create($validated);
        $this->assignBookToTheUserAndTheCollection(Auth::user(), $book, $request->collection_id);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $collections = Auth::user()->collections;

        return view('books.edit', compact('book', 'collections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        UserBookCollection::where('book_id', '=', $book->id)->delete();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    private function assignBookToTheUserAndTheCollection($user, $book, $collection)
    {
        UserBookCollection::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'collection_id' => $collection,
        ]);
    }
}
