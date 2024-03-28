<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Patient;

class StudentController extends Controller
{
    public function index()
    {
        // $patient = Patient::all();
            

        // $results = Student::select('result')
        //     ->groupBy('result')
        //     ->get();

        return view('students');
    }

    // public function getStandard(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $standards = Student::select('standard')
    //             ->groupBy('standard')
    //             ->get();

    //         return response()->json($standards);
    //     }
    // }

    // public function getResult(Request $request)
    // {
    //     if ($request->ajax()) {

    //         $results = Student::select('result')
    //             ->groupBy('result')
    //             ->get();

    //         return response()->json($results);
    //     }
    // }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            // $students = Patient::when(request('std'), function ($query) {
            //     $query->where('standard', '=', request('std'));
            // })
            //     ->when(request('res'), function ($query) {
            //         $query->where('result', '=', request('res'));
            //     })
            //     ->latest()
            //     ->get();

            $students=Patient::all();
            return response()->json([
                'students' => $students
            ]);
        }
        // }
        // else{
        //     abort(403);
        // }







        // if ($request->ajax()) {

        //     if (request('std') && request('res')) {
        //         $students = Patient::where('standard', '=', request('std'))->where('result', '=', request('res'))
        //             ->latest()
        //             ->get();
        //     } else {
        //         $students = Student::when(request('std'), function ($query) {
        //             $query->where('standard', '=', request('std'));
        //         })
        //             ->when(request('res'), function ($query) {
        //                 $query->where('result', '=', request('res'));
        //             })
        //             ->latest()
        //             ->get();
        //     }

        //     return response()->json([
        //         'students' => $students
        //     ]);
        // } else {
        //     abort(403);
        // }
    }
}
