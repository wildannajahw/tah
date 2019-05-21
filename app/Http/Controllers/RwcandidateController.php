<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RwcandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rwcandidates = \App\Rwcandidate::paginate(10);
        return view('rwcandidates.index',['rwcandidates' => $rwcandidates]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("rwcandidates.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_rwcandidate = new \App\Rwcandidate;
        $new_rwcandidate->name = $request->get('name');
        $new_rwcandidate->nik = $request->get('nik');
        $new_rwcandidate->nomorurut = $request->get('nomorurut');
        $new_rwcandidate->rt = $request->get('address');
        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            $new_rwcandidate->avatar = $file;
        }
        $new_rwcandidate->save();
        return redirect()->route('rwcandidates.create')->with('status', 'rwcandidate
        successfully created');
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
        $rwcandidate = \App\Rwcandidate::findOrFail($id);
        return view('rwcandidates.edit', ['rwcandidate' => $rwcandidate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rwcandidate = \App\Rwcandidate::findOrFail($id);
        $rwcandidate->name = $request->get('name');
        $rwcandidate->nik = $request->get('nik');
        $rwcandidate->nomorurut = $request->get('nomorurut');
        $rwcandidate->rt = $request->get('address');
        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            $rwcandidate->avatar = $file;
        }
        $rwcandidate->save();
        return redirect()->route('rwcandidates.edit', ['id' => $id])->with('status', 'Rw candidate succesfully updated');
    }

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
}
