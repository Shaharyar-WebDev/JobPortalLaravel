<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    //
    public function commandForm(){
        return view('admin.console');
    }

    public function commandExecute(Request $request){

        $allowed_commands = ['migrate:fresh', 'route:list', 'migrate', 'up', 'migrate:fresh --seed', 'optimize','help'];

        if(!in_array(trim(strToLower($request->command)), $allowed_commands)){

            return back()->with('message', 'COMMAND NOT ALLOWED');

        }else{
            Artisan::call(trim(strToLower($request->command)));

            $output = Artisan::output();

            return nl2br($output);
        }
    }
}
