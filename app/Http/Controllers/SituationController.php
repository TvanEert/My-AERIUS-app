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
        $name = $_GET['naam'];
        $situationType = $_GET['situatie'];
        $calcYear = $_GET['rekenjaar'];
        $inputFor = $_GET['invoer'];

        $situationArray = ['name'=>$name, 'situationType'=>$situationType, 'calcYear'=>$calcYear, 'inputFor'=>$inputFor];

        $situation = new Situation($request);
        $situation->addSituation($situationArray);
        $situation->saveSession($request);

        return redirect()->route('getSituations');
    }
}
