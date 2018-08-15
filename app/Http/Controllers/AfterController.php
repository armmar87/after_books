<?php

namespace App\Http\Controllers;

use App\Afters;
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
        $afters = Afters::all();

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

        Afters::create($request->all());

        return redirect()->route('afters.index')
            ->with('success','After created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Afters  $after
     * @return \Illuminate\Http\Response
     */
    public function show(After $after)
    {
        return view('Afters.show',compact('After'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Afters  $after
     * @return \Illuminate\Http\Response
     */
    public function edit(Afters $after)
    {
        return view('afters.edit',compact('after'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Afters  $after
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afters $after)
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
     * @param  \App\Afters  $after
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afters $after)
    {
        $after->delete();

        return redirect()->route('afters.index')
            ->with('success','After deleted successfully');
    }
}
