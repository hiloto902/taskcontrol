<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("top.home")->with('cases',Cases::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        $matter = new Matter();
        $matter->user_id = Auth::id();
        $case->title = $request->input('title');
        $case->save();

        return redirect(route('top.home'));
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
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add_matters($id)
    {
        return view("top/add_matters")
            ->with('matter', Matter::find($id));
    }

    public function add_companies($id)
    {
        return view("top/add_companies")
            ->with('company', Company::find($id));
    }

    public function add_users($id)
    {
        return view("top/add_users")
            ->with('user', User::find($id));
    }

    public function update(Request $request, $id)
    {
        $case->user_id = Auth::id();
        $case->title = $request->input('title');
        $case->save();

        return redirect(route('top.home'));
    }
    
}
