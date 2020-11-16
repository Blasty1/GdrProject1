<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChiamateAjaxController extends Controller{
    public function __construct(){

        return $this->middleware('auth');

    }
    
    public function showUser($userIdToView, Request $request){
       
       
        return view('internoLand.schedaUser.schedaUser', [
            'userToView' => User::where('id',$userIdToView)->with('breed','classes','hemispere')->get()[0],
            'expsUser' => ExpController::getSumOfExp($userIdToView),
            'errors' => $request->errors,
            'userView' => \Auth::user(),
        ]);
    }


}

?>