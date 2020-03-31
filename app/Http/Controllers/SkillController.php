<?php

namespace App\Http\Controllers;

use App\Model\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
         $employee = Employee::with('skills')->get();
         return $employee;
        //Show Only One Value
        // $employee = Employee::all();
        // foreach($employee as $emp){
        //     return $emp->skills; 
        // }
        
    }
    /**
     * Show the form for skill show a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function skillShow(){
        $skill = Skill::with('employee')->get();
        return $skill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function skillShowUpdate(Request $request, Skill $skill)
    {
        $skill ->update($request->all());
        return Response('Updated Skills From SjillShow', Response::HTTP_ACCEPTED);
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
        Skill::create($request->all());
        return Response('Stored Skills', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return $skill;
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
        $skill ->update($request->all());
        return Response('Updated Skills', Response::HTTP_ACCEPTED);
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
