<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index() {
        $applicants = Applicant::orderBy('experience_years')->paginate(10);
        return view('index', compact('applicants'));
    }

    public function edit($id) {
        $applicant = Applicant::findOrFail($id);
        return view('edit', compact('applicant'));
    }

    public function update(Request $request, $id) {
        $applicant = Applicant::findOrFail($id);
        $applicant->name = $request->get('name');
        $applicant->surname = $request->get('surname');
        $applicant->experience_years = $request->get('experience_years');
        $applicant->save();

        return redirect()->route('index');
    }

    public function delete($id) {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->back();
    }

    public function hire($id) {
        $applicant = Applicant::findOrFail($id);
        $applicant->is_hired = !$applicant->is_hired;
        $applicant->save();

        return redirect()->back();
    }
}
