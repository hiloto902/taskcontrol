<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Matter;
use App\Models\Company;
use App\Models\User;
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
        //TOP画面＝案件を表示
        return view("top/home")->with('matters', Matter::all());
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
        //会社を保存
        $company = new Company();
        $company->name = $request->input('name');
        $company->save();

        return redirect(route('top.index'));
    }

    public function store2(Request $request)
    {
        //アカウントを保存
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect(route('top.index'));
    }

    public function store3(Request $request)
    {
        //案件を保存
        $matter = new Matter();
        $matter->title = $request->input('title');
        $matter->company_id = $request->input('company_id');
        $matter->save();

        return redirect(route('top.index'));
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
    public function edit1($id)
    {
        return view("top.edit_matter")
            ->with('matter', Matter::find($id));
    }

    public function edit2($id)
    {
        return view("top.edit_company")
            ->with('company', Company::find(isset($id)));
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
    public function destroy1($id)
    {
        $matter->delete();
        return redirect(route('top.index'));
    }

    public function destroy2($id)
    {
        $company->delete();
        return redirect(route('top.add_companies'));
    }

    //ページ遷移

    public function add_companies()
    {
        return view("top/add_companies")
            ->with('companies', Company::all());
    }

    public function add_users()
    {
        return view("top/add_users")
            ->with('users', User::all());
    }
    
    public function add_matters()
    {
        return view("top.add_matters")
            ->with('matter', Matter::all());
    }

    public function update1(Request $request, $id)
    {
        $matter->user_id = Auth::id();
        $matter->title = $request->input('title');
        $matter->save();

        return redirect(route('top.index'));
    }

    public function update2(Request $request, $id)
    {
        return $request;
        $user = new User();
        // $user->user_id = Auth::id();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect(route('top.index'));
    }

    public function update3(Request $request, $id)
    {
        $matter->user_id = Auth::id();
        $matter->title = $request->input('title');
        $matter->company_id = $request->input('company_id');
        $matter->save();

        return redirect(route('top.index'));
    }
    
}
