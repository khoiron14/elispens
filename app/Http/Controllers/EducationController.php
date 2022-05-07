<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = auth()->user()->lecturer->educations;
        
        return view('educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('educations.create');
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
            'college' => 'required|string|max:255',
            'level' => 'required|in:D1,D2,D3,D4,S1,S2,S3',
            'degree' => 'required|string|max:20',
            'year' => 'required|integer|digits:4',
        ]);

        auth()->user()->lecturer->educations()
            ->create($request->only('college', 'level', 'degree', 'year'));

        return redirect()->route('educations.index')->withSuccess('Data riwayat pendidikan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        if ($education->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        return view('educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        if ($education->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $request->validate([
            'college' => 'required|string|max:255',
            'level' => 'required|in:D1,D2,D3,D4,S1,S2,S3',
            'degree' => 'required|string|max:20',
            'year' => 'required|integer|digits:4',
        ]);

        $education->update($request->only('college', 'level', 'degree', 'year'));

        return redirect()->route('educations.index')->withSuccess('Data riwayat pendidikan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        if ($education->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $education->delete();

        return redirect()->route('educations.index')->withSuccess('Data riwayat pendidikan berhasil dihapus.');
    }
}
