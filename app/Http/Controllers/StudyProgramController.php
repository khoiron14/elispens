<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studyPrograms = StudyProgram::all();

        return view('study_programs.index', compact('studyPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study_programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:study_programs',
        ]);

        StudyProgram::create($request->only('name'));

        return redirect()->route('study_programs.index')->withSuccess('Data program studi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyProgram $studyProgram)
    {
        return view('study_programs.edit', compact('studyProgram'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:study_programs,name,' . $studyProgram->id,
        ]);

        $studyProgram->update($request->only('name'));

        return redirect()->route('study_programs.index')->withSuccess('Data program studi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyProgram $studyProgram)
    {
        $studyProgram->delete();

        return redirect()->route('study_programs.index')->withSuccess('Data program studi berhasil dihapus.');
    }
}
