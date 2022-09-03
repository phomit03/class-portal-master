<?php

namespace App\Http\Controllers;

use App\Models\classes_user;
use App\Models\Subject;
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

//    public function show($id)
//    {
//        //in ra list subjects ở trong class do
//    }

    //chuyển phần này qua subjects


     //* Show details about a particular subjects - GET

    public function show($id)
    {
        $class = Classes::find($id);
   //     dd($class);
        $instructor = Auth::user();
        $subjects = Subject::all();

//        $assignments = $class->assignments()->orderBy('due_date', 'desc')->get();

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

        return view('pages.teacher.class.show', [
            'class1' => $class,
            'instructor' => $instructor,
            'class_id' => $id,
            'subjects'=>$subjects,
//            'assignments' => $assignments,
            'recent_activity' => $recent_activity
        ]);
    }

    /**
     * Show a form to create a new class - GET
     */
    public function create()
    {
        return view('pages.teacher.class.create');
    }

    /**
     * Save a newly created class - POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'string|max:255|nullable',   // Roadmap To Computing
            'room' => 'numeric|digits_between:2,5|nullable', // 01
            'section' => 'numeric|digits_between:2,5|nullable' // 01
        ]);

        $user_id = Auth::user()->id;

        $class = new Classes;
        $classes = new classes_user();
        $class->name = $request->input('name');
        $class->title = $request->input('title');
        $class->room = $request->input('room');
        $class->section = $request->input('section');

        if ($class->save()) {
            // Insert information into the pivot table for users and classes
            $classes->user_id =$user_id;
            $classes->class_id=$class->id;
            $classes->save();
            return redirect('/class/create')->with('status', 'Class added successfully!');
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
            return redirect('/class/' . $id)->with('status', 'Class updated successfully!');
        }
    }

    /**
     * Delete a particular class - DELETE
     */
    public function destroy(Classes $class, $id)
    {
        if (Classes::destroy($id)) {
            return redirect('/home')->with('status', 'Class deleted successfully!');
        }
    }

    public function addStudents(Request $request, $class_id)
    {
        foreach ($request->except(['_token']) as $student_id) {
            Classes::find($class_id)->users()->attach($student_id);
        }

        return redirect('/class/' . $class_id)->with('status', 'Students added to the class successfully!');
    }
}
