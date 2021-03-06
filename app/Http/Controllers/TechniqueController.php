<?php

namespace App\Http\Controllers;

use App\Technique;
use App\User;
use Validator;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $techniques = Technique::all();
        return view('welcome' , compact('techniques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $send['Technique'] = new Technique;
        $send['Form'] = [
            'button' => 'Add',
            'url' => url('technique'),
            'method' => 'POST'
        ];
        return view('technique.create' , $send);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except('_token');
        $validator = $this->validator($data);

        if ($validator->passes()) {
            $save = Technique::create($data);
            return redirect('/')->with('message', 'success|Technique Created|Successfully created the Company');
        } else {
            return redirect(url('/technique/create'))->with('message', 'danger|Technique Not Created|Failed to create the Company')->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function show(Technique $technique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function edit(Technique $technique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technique $technique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technique $technique)
    {
        //
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255'
        ]);
    }
}
