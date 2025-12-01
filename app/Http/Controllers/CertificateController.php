<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::where('user_id', Auth::id())
            ->with('module')
            ->latest()
            ->get();

        return view('certificates.index', compact('certificates'));
    }

    public function show(Certificate $certificate)
    {
        // Check if the certificate belongs to the authenticated user
        if ($certificate->user_id !== Auth::id()) {
            abort(403);
        }

        return view('certificates.show', compact('certificate'));
    }

    public function download(Certificate $certificate)
{
    if ($certificate->user_id !== Auth::id()) abort(403);

    try {
        $pdf = \PDF::loadView('certificates.pdf', compact('certificate'));
        $filename = 'certificate-'.str_replace('/', '-', $certificate->certificate_number).'.pdf';
        return $pdf->download($filename);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTrace()
        ], 500);
    }
}

}
