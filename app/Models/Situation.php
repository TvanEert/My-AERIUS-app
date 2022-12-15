<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    //$request->session()->push('situations', $situation);
    //$session = $request->session()->get('situations');
    private $situations = [];

    public function __construct($request){
        if($request->session()->has('situations')){
            $this->situations = $request->session()->get('situations');
        } else {
            $this->situations = [];
        }
    }

    public function getSituations(){
        return $this->situations;
    }

    public function addSituation($currSituation){
        if(count($this->situations) == 5){
            array_shift($this->situations);
        }
        array_push($this->situations, $currSituation);
    }

    public function saveSession($request){
        $currentSession = $this->situations;
        $oldSession = $request->session()->get('situations');

        $request->session()->forget('situations');

        foreach($currentSession as $item){
            $request->session()->push('situations', $item);
        }
    }
}
