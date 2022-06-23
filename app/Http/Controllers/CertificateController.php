<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = auth()->user()->lecturer->certificates;

        return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificates.create');
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
            'subject' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'file' => 'mimes:pdf'
        ]);
        
        $certificate = auth()->user()->lecturer->certificates()
            ->create($request->only('subject', 'publisher', 'date'));

        if ($request->hasFile('file')) {
            $certificate->file()->create([
                'url' => $this->upload(
                    'certificate', 
                    $request->file('file'),
                    autoNamed: false
                ) 
            ]);
        }

        return redirect()->route('certificates.index')->withSuccess('Data sertifikat berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        if ($certificate->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        return view('certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        if ($certificate->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $request->validate([
            'subject' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'file' => 'mimes:pdf'
        ]);

        $certificate->update($request->only('subject', 'publisher', 'date'));

        if ($request->hasFile('file')) {
            File::updateOrCreate(
                ['fileable_id' => $certificate->id, 'fileable_type' => 'App\Models\Certificate'],
                ['url' => $this->upload('certificate', $request->file('file'), $certificate->file, autoNamed: false) ]
            );
        }

        return redirect()->route('certificates.index')->withSuccess('Data sertifikat berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        if ($certificate->lecturer_id != auth()->user()->lecturer->id) {
            abort(403);
        }

        $this->deleteDirectory($certificate->file);
        $certificate->file->delete();
        $certificate->delete();

        return redirect()->route('certificates.index')->withSuccess('Data sertifikat berhasil dihapus.');
    }
}
