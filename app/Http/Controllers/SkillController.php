<?php

namespace App\Http\Controllers;

use App\Model\Skill;
use Illuminate\Http\Request;
use App\Employee;
use App\Model\SkillType;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //Many To Many Relation хийж байгаа үед. 
                // Эхлээд модел оо зарлаж дараа нь модел доторх relation уудаа цэгээр тусгаарлан хэвлэнэ.
        // $employee = Employee::with('skills.skillTypes')->get();
        // return $employee; 

        //ManyToManyThrough Relation хийж байгаа үед. 
        // Зѳвхѳн модел дээрээ зарласан FUNCTION-оо дуудна.
        $employee = Employee::with('skilltypesRel')->get();
        return $employee; 
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
