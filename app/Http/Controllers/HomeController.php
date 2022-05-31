<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (request()->query('keyword')) {
            $lecturers = Lecturer::query()
                ->with(['user' => function ($query) {
                    $query->select('id', 'name');
                }])->whereRelation(
                    'studyProgram', 'name', request()->query('study_program')
                )->where(function ($query) {
                    $query->whereRelation('user', 'name', 'like', '%' . request()->query('keyword') . '%')
                        ->orWhere('nip', 'like', '%' . request()->query('keyword') . '%');
                })->get();
        } else {
            $lecturers = Lecturer::query()
            ->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->get();
        }

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
