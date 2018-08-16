<?php

namespace App\Http\Controllers;

use App\Book;
use App\After;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.books',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $afters = After::all();
        return view('books.create', compact('afters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'after_ids' => 'required',
        ]);

        $book = new Book();
        $book->name = $request->name;
        $book->save();

        $after = After::find($request->after_ids);
        $book->afters()->attach($after);

        return redirect()->route('books.index')
            ->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $afters = After::all();
        $book = Book::with('afters')->find($id);

        return view('books.edit',compact('book', 'afters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        request()->validate([
            'name' => 'required',
            'after_ids' => 'required',
        ]);

        $book->name = $request->name;
        $book->save();

        DB::table('after_book')->where('book_id',  '=', $book->id)->delete();
        $after = After::find($request->after_ids);
        $book->afters()->attach($after);

        return redirect()->route('books.index')
            ->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        DB::table('after_book')->where('book_id',  '=', $book->id)->delete();

        return redirect()->route('books.index')
            ->with('success','Book deleted successfully');
    }
}
