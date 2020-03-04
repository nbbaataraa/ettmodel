<?php

namespace App\Http\Controllers;

use App\Model\SkillType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SkillType::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SkillType::create($request->all());
        return Response('Stored', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\SkillType  $skilltype
     * @return \Illuminate\Http\Response
     */
    public function show(SkillType $skilltype)
    {
        return $skilltype;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\SkillType  $skilltype
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillType $skilltype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\SkillType  $skilltype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillType $skilltype)
    {
        $skilltype->update($request->all());
        return Response('Updated Skilltype', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\SkillType  $skilltype
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillType $skilltype)
    {
        $skilltype->delete();
        return Response('Deleted', Response::HTTP_ACCEPTED);
    }
}
