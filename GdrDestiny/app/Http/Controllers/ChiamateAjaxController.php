<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
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

    public function showBackground($idUser , Request $request){
        $user=User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0];
        $this->saveDataPreSubmit($request);
        return view('internoLand.schedaUser.background', [
            'userToView' =>$user,
            'userView' => \Auth::user(),

        ]);
    }

    public function editBackground($idUser, Request $request){
        $userIdToView=User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0];
        $userView=\Auth::user();
        $this->saveDataPreSubmit($request);
        
        //$userView->hasRole(Config::get('roles.ROLE_GESTORE'),[0,5]


        return view('internoLand.schedaUser.backgroundEdit',
    [   
        'userToView' => $userIdToView,
        'userView' => $userView,
       
        

    ]);
    }

    public function updateBackground($idUser, Request $request){
        
        $userToModify=\App\User::find($idUser);
        //the html tags are eliminated excpet p, h1 ecc.. , br
        $new_background=strip_tags($request->background,'<p><h1><h2><h3><h4><h5><br>');
        try{
            $userToModify->background=$new_background;
            $userToModify->save();
        }catch(Exception $e){
            return $this->returnBackWithError($request,$e->getMessage());
        }   
  

        $whatshowsInModal1=[
            'routeName' => 'showBackground',
            'parametrs' => $idUser
        ];
        
        return $this->returnBack($request,null,$whatshowsInModal1);
        
        
    }


}

?>