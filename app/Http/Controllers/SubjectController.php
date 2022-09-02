<?php

namespace App\Http\Controllers;

use App\Models\classes_subjects;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Specify the middleware for this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//    public function show($id)
//    {
//        //in ra list subjects ở trong class do
//    }

    //chuyển phần này qua subjects


    //* Show details about a particular subjects - GET

    public function show($id)
    {
        $subject = Subject::find($id);
        $instructor = $subject->users()->where('role', 'teacher')->first();

        $assignments = $subject->assignments()->orderBy('due_date', 'desc')->get();

        // Grab all the recent activity, which includes
        // assignments and annoucement, then sort date that
        // it was created
        $recent_activity = array();
//
//        if (count($assignments) > 0 || count($assignments) > 0) {
//            foreach ($assignments as $assignment) {
//                $assignment->type = 'assignment';
//                array_push($recent_activity, $assignment);
//            }
//
//            usort($recent_activity, function($a, $b) {
//                if ($a->created_at == $b->created_at) {
//                    return 0;
//                }
//                return ($a->created_at > $b->created_at) ? -1 : 1;
//            });
        //   }

        return view('pages.teacher.subject.show', [
            'subject' => $subject,
            'instructor' => $instructor,
            'subject_id' => $id,
            'assignments' => $assignments,
            'recent_activity' => $recent_activity
        ]);
    }

    /**
     * Show a form to create a new class - GET
     */
    public function create()
    {
        return view('pages.teacher.subject.create');
    }

    /**
     * Save a newly created class - POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'string|max:255|nullable',   // Roadmap To Computing
        ]);

        $user_id = Auth::user()->id;

        $subject = new Subject;
        $class_subject = new classes_subjects();
        $subject->name = $request->input('name');
        $subject->description = $request->input('title');

        if ($subject->save()) {
            // Insert information into the pivot table for users and classes
            $class_subject->user_id =$user_id;
            $class_subject->class_id=$subject->id;
            $class_subject->save();
            return redirect('/class/create')->with('status', 'Subject added successfully!');
        }
    }

    /**
     * Update the class' information [PUT]
     */
    public function update(Classes $class, Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'string|max:255|nullable',   // Roadmap To Computing
            'room' => 'numeric|digits_between:2,5|nullable', // 01
            'section' => 'numeric|digits_between:2,5|nullable' // 01
        ]);

        $class = Classes::find($id);
        $class->name = $request->input('name');
        $class->title = $request->input('title');
        $class->room = $request->input('room');
        $class->section = $request->input('section');

        if ($class->save()) {
            return redirect('/class/' . $id)->with('status', 'Subject updated successfully!');
        }
    }

    /**
     * Delete a particular class - DELETE
     */
    public function destroy(Subject $subject, $id)
    {
        if (Subject::destroy($id)) {
            return redirect('/home')->with('status', 'Subject deleted successfully!');
        }
    }
}
