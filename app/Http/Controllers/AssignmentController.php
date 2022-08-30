<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Classes;

class AssignmentController extends Controller
{
    public function store(Request $request, $id)
    {
      $today = date('Y-m-d H:i:s');

      $this->validate($request, [
        'title' => 'required',
        'due_date' => 'required|date|after:' . $today,
        'description' => 'required'
      ]);

      $due_date = $request->input('due_date');
      $due_date = str_replace('T', ' ', $due_date);
      $due_date = $due_date . ':00';

      $assignment = new Assignment;
      $assignment->title = $request->input('title');
      $assignment->due_date = $due_date;
      $assignment->description = $request->input('description');
      $assignment->course_id = $id;

      if ($assignment->save()) {
        return redirect('/class/' . $id)->with('status', 'Assignment added successfully!');
      }
    }

    /**
     * Show details about a particular assignment
     */
    public function show($course_id, $assignment_id)
    {
      $assignment = Assignment::find($assignment_id);
      $course = Classes::find($course_id);
      $course_name = $course->subject . ' ' . $course->course . '-' . $course->section;
      $course_instructor = $course->user_id;

      return view('pages.teacher.assignment.show', [
        'course_name' => $course_name,
        'course_id' => $course_id,
        'assignment' => $assignment,
        'course_instructor' => $course_instructor,
        'due_date_formatted' => str_replace(' ', 'T', $assignment->due_date)
      ]);
    }

    public function update(Request $request, $course_id, $assignment_id)
    {
      $this->validate($request, [
        'title' => 'required',
        'due_date' => 'required|date',
        'description' => 'required'
      ]);

      $due_date = $request->input('due_date');
      $due_date = str_replace('T', ' ', $due_date);
      $due_date = $due_date . ':00';

      $assignment = Assignment::find($assignment_id);
      $assignment->title = $request->input('title');
      $assignment->due_date = $due_date;
      $assignment->description = $request->input('description');

      if ($assignment->save()) {
        return redirect('/class/' . $course_id . '/assignment/' . $assignment_id)->with('status', 'Assignment updated successfully!');
      }
    }

    /**
     * Delete a particular assignment
     */
    public function destroy($course_id, $assignment_id)
    {
        if (Assignment::destroy($assignment_id)) {
            return redirect('/class/' . $course_id)->with('status', 'Assignment deleted successfully!');
        }
    }
}
