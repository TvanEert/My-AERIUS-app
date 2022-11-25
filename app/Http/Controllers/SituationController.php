<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Situation;
use Inertia\Inertia;

class SituationController extends Controller
{
    public function getSituations(Request $request){
        $situation = new Situation($request);
        $situations = $situation->getSituations();
        
        return Inertia::render('Home', [
            'situations'=>$situations
        ]);
    }

    public function addSituation(Request $request){
        $naam = $_GET['naam'];
        $grootte = $_GET['grootte'];
        $soort = $_GET['soort'];
        $aantal = $_GET['aantal'];

        $situationArray = [
            'naam'=>$naam,
            'grootte'=>$grootte,
            'soort'=>$soort,
            'aantal'=>$aantal
        ];

        $situation = new Situation($request);
        $situation->addSituation($situationArray);
        $situation->saveSession($request);

        return redirect()->route('getSituations');
    }
}
