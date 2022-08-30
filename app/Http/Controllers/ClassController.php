<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\Classes;
use App\Models\User;

class ClassController extends Controller
{
    /**
     * Specify the middleware for this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show details about a particular class - GET
     */
    public function show($id)
    {
        $course = Classes::find($id);
        $instructor = $course->users()->where('role', 'teacher')->first();

        $assignments = $course->assignments()->orderBy('due_date', 'desc')->get();
        $annoucements = $course->annoucements()->orderBy('created_at', 'desc')->get();

        // Grab all the recent activity, which includes
        // assignments and annoucement, then sort date that
        // it was created
        $recent_activity = array();

        if (count($assignments) > 0 || count($assignments) > 0) {
            foreach ($annoucements as $annoucement) {
                $annoucement->type = 'annoucement';
                array_push($recent_activity, $annoucement);
            }

            foreach ($assignments as $assignment) {
                $assignment->type = 'assignment';
                array_push($recent_activity, $assignment);
            }

            usort($recent_activity, function($a, $b) {
                if ($a->created_at == $b->created_at) {
                    return 0;
                }
                return ($a->created_at > $b->created_at) ? -1 : 1;
            });
        }

        return view('pages.teacher.course.show', [
            'course' => $course,
            'instructor' => $instructor,
            'course_id' => $id,
            'assignments' => $assignments,
            'recent_activity' => $recent_activity
        ]);
    }

    /**
     * Show a form to create a new class - GET
     */
    public function create()
    {
        return view('pages.teacher.course.create');
    }

    /**
     * Save a newly created class - POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|alpha|max:5', // CS
            'title' => 'required|string|max:255',   // Roadmap To Computing
            'course' => 'required|numeric|digits_between:2,4', // 100
            'section' => 'required|numeric|digits_between:2,4' // 001
        ]);

        $user_id = Auth::user()->id;

        $course = new Classes;
        $course->subject = $request->input('subject');
        $course->title = $request->input('title');
        $course->course = $request->input('course');
        $course->section = $request->input('section');
        $course->user_id = $user_id;

        if ($course->save()) {
            // Insert information into the pivot table for users and courses
            $course->users()->attach($user_id);

            return redirect('/course/create')->with('status', 'Course added successfully!');
        }
    }

    /**
     * Update the class' information [PUT]
     */
    public function update(Classes $course, Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required|string|max:5',
            'title' => 'required|string|max:255',
            'course' => 'required|numeric|digits_between:2,4',
            'section' => 'required|numeric|digits_between:2,4'
        ]);

        $course = Classes::find($id);
        $course->subject = $request->input('subject');
        $course->title = $request->input('title');
        $course->course = $request->input('course');
        $course->section = $request->input('section');

        if ($course->save()) {
            return redirect('/course/' . $id)->with('status', 'Course updated successfully!');
        }
    }

    /**
     * Delete a particular class - DELETE
     */
    public function destroy(Classes $course, $id)
    {
        if (Classes::destroy($id)) {
            return redirect('/home')->with('status', 'Course deleted successfully!');
        }
    }

    public function addStudents(Request $request, $course_id)
    {
        foreach ($request->except(['_token']) as $student_id) {
            Classes::find($course_id)->users()->attach($student_id);
        }

        return redirect('/course/' . $course_id)->with('status', 'Students added to the class successfully!');
    }
}
