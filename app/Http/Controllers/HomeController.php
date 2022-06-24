<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lecturers = Lecturer::when($request->study_program, function ($query, $studyProgram) {
                if ($studyProgram != "Semua Jurusan") {
                    $query->whereRelation('studyProgram', 'name', 'like', '%' . $studyProgram . '%');
                }
            })->when($request->keyword, function ($query, $keyword) {
                $query->whereRelation('user', 'name', 'like', '%' . $keyword . '%')
                    ->orWhere('nip', 'like', '%' . $keyword . '%');
            })->validated()->with('user:id,name')->with('studyProgram')->get();

        $studyPrograms = StudyProgram::all();

        return view('home', compact('studyPrograms', 'lecturers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function lecturerDetail(Lecturer $lecturer)
    {
        return view('details.index', compact('lecturer'));
    }
}
