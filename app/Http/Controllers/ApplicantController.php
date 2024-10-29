<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;

class ApplicantController extends Controller
{
    public function index($jobId)
    {
        $job = Job::findOrFail($jobId);
        $applicants = $job->applicants; 
        return view('backend.jobs.applicants', compact('applicants', 'job'));
    }

    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('backend.applicants.show', compact('applicant'));
    }
}
