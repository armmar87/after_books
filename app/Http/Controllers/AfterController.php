<?php

namespace App\Http\Controllers;

use App\After;
use Illuminate\Http\Request;

class AfterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afters = After::all();

        return view('afters.afters',compact('afters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('afters.create');
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
        ]);

        After::create($request->all());

        return redirect()->route('afters.index')
            ->with('success','After created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\After  $after
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $after = After::with('books')->find($id);
        return view('afters.show',compact('after'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\After  $after
     * @return \Illuminate\Http\Response
     */
    public function edit(After $after)
    {
        return view('afters.edit',compact('after'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\After  $after
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, After $after)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $after->update($request->all());

        return redirect()->route('afters.index')
            ->with('success','After updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\After  $after
     * @return \Illuminate\Http\Response
     */
    public function destroy(After $after)
    {
        $after->delete();

        return redirect()->route('afters.index')
            ->with('success','After deleted successfully');
    }
}
