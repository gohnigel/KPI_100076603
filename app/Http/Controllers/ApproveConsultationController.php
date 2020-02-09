<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\User;
use Illuminate\Http\Request;

class ApproveConsultationController extends Controller
{
    public function index(User $user)
    {
        $consultations = Consultation::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.consultations.index', compact('user'), compact('consultations'));
    }

    public function show(User $user, Consultation $consultation)
    {
        return view('approve.consultations.show', compact('user'), compact('consultation'));
    }

    public function approve(User $user, Consultation $consultation)
    {
        return view('approve.consultations.approve', compact('user'), compact('consultation'));
    }

    public function update(Request $request, User $user, Consultation $consultation)
    {
        $this->validateConsultation($request);

        $consultation->update($this->approveConsultation($consultation));

        return redirect('/approveConsultations/' . $user->id);
    }

    protected function validateConsultation($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'consultant' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approveConsultation($consultation)
    {
        return [
            'name' => request('name'),
            'consultant' => request('consultant'),
            'approve' => request('approve'),
            'user_id' => $consultation->user_id
        ];
    }
}
