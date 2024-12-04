
<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function show(Course $course)
    {
        $student = auth()->user();
        // Logic to generate certificate
        return view('certificates.show', compact('course', 'student'));
    }
}