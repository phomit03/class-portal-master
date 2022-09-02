<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Subject;

class AssignmentController extends Controller
{
    public function store(Request $request, $id)
    {
      $today = date('Y-m-d H:i:s');

      $this->validate($request, [
        'title' => 'required|string|max:255',
        'description' => 'required',
        'source' => 'nullable',
        'due_date' => 'required|date|after:' . $today,
      ]);

      $due_date = $request->input('due_date');
      $due_date = str_replace('T', ' ', $due_date);
      $due_date = $due_date . ':00';

        $assignment = new Assignment;
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->source = $request->input('source');
        $assignment->due_date = $due_date;
        $assignment->subject_id = $id;

      if ($assignment->save()) {
        return redirect('/subject/' . $id)->with('status', 'Assignment added successfully!');
      }
    }

    /**
     * Show details about a particular assignment
     */
    public function show($subject_id, $assignment_id)
    {
      $assignment = Assignment::find($assignment_id);
      $subject = Subject::find($subject_id);
      $subject_name = $subject->name . ' ' . $subject->description;
      $subject_instructor = $subject->class_id;

      return view('pages.teacher.assignment.show', [
        'subject_name' => $subject_name,
        'subject_id' => $subject_id,
        'assignment' => $assignment,
        'subject_instructor' => $subject_instructor,
        'due_date_formatted' => str_replace(' ', 'T', $assignment->due_date)
      ]);
    }

    public function update(Request $request, $subject_id, $assignment_id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'source' => 'nullable',
            'due_date' => 'required|date|',
        ]);

        $due_date = $request->input('due_date');
        $due_date = str_replace('T', ' ', $due_date);
        $due_date = $due_date . ':00';

        $assignment = Assignment::find($assignment_id);
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->source = $request->input('source');
        $assignment->due_date = $due_date;

      if ($assignment->save()) {
        return redirect('/subject/' . $subject_id . '/assignment/' . $assignment_id)->with('status', 'Assignment updated successfully!');
      }
    }

    /**
     * Delete a particular assignment
     */
    public function destroy($subject_id, $assignment_id)
    {
        if (Assignment::destroy($assignment_id)) {
            return redirect('/subject/' . $subject_id)->with('status', 'Assignment deleted successfully!');
        }
    }
}
