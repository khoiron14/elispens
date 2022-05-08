<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TeachHistory;
use Illuminate\Http\Request;

class TeachHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teaches = TeachHistory::with('course')
            ->where('lecturer_id', auth()->user()->lecturer->id)->get();

        return view('teach_histories.index', compact('teaches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        return view('teach_histories.create', compact('courses'));
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
            'course_id' => 'required|integer|exists:courses,id',
            'semester' => 'required|in:O,E',
            'year' => 'required|integer|digits:4',
        ]);

        auth()->user()->lecturer->teaches()
            ->create($request->only('course_id', 'semester', 'year'));

        return redirect()->route('teaches.index')->withSuccess('Data riwayat mengajar berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TeachHistory  $teach_history
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachHistory $teach_history)
    {
        if ($teach_history->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $courses = Course::all();

        return view('teach_histories.edit', compact('courses'))
            ->with(['teach' => $teach_history]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TeachHistory  $teach_history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachHistory $teach_history)
    {
        if ($teach_history->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'semester' => 'required|in:O,E',
            'year' => 'required|integer|digits:4',
        ]);

        $teach_history->update($request->only('course_id', 'semester', 'year'));

        return redirect()->route('teaches.index')->withSuccess('Data riwayat mengajar berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TeachHistory  $teach_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachHistory  $teach_history)
    {
        if ($teach_history->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $teach_history->delete();

        return redirect()->route('teaches.index')->withSuccess('Data riwayat mengajar berhasil dihapus.');
    }
}
