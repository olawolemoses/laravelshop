<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Training;
use App\Models\TrainingPackage;

class TrainingsController extends Controller
{
    
    // checkout
    public function detail(Request $request, Training $training)
    {
        //dd( json_decode($training->training_students_benefits) );
        
        $packages = $training->training_packages;
        
        //dd( $packages->count() );
        
        return view('trainings.detail', ['training' => $training, 'packages' => $packages]);
    }
    
}