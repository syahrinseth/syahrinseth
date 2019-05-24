<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiniGamesController extends Controller
{
    public function colorGame($gameName){
        switch (strtoupper($gameName)) {
            case 'COLORGAME':
                return view('minigames.color_game');
                break;
            default:
                return abort(404);
                break;
        }
    }
}
