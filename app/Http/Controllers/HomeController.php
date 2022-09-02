<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $recent_activity = array();

        $classes = Auth::user()->classes()->get();
        foreach ($classes as $class) {
            if ($class->assignments()->get()) {
                foreach ($class->assignments()->orderBy('created_at', 'desc')->get() as $assignment) {
                    $class = $assignment->class()->get();
                    $class_info = $class[0]->name . ' ' . $class[0]->tittle . ' - ' . $class[0]->room . ' - ' . $class[0]->section;
                    $assignment->type = 'assignment';
                    $assignment->class_info = $class_info;
                    array_push($recent_activity, $assignment);
                }
            }
        }

        if (count($recent_activity) > 0) {
            usort($recent_activity, function($a, $b) {
                if ($a->created_at == $b->created_at) {
                    return 0;
                }
                return ($a->created_at > $b->created_at) ? -1 : 1;
            });
        }

        return view('pages.teacher.home', [
            'recent_activity' => $recent_activity
        ]);
    }
}
