<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnBack(Request $request,String $message){
        $routeToReturn=$request->session()->get('last-position:View');
       

        $datasToReSendBack=$request->session()->get('last-position:RouteParams');
        
        //se
        if(!$routeToReturn){

            $routeToReturn= 'userProfile';
            $datasToReSendBack=\Auth::id();
        }
        dd($datasToReSendBack);
        $request->errors=[
            'routeName' => route($routeToReturn,$datasToReSendBack),
            'message' => $message
        ];
        
        
    
    return redirect()->route($request->session()->get('last-position:Chat'),["errors" => $request->errors]) ;
}

public function saveDataPreSubmit(Request $request,\App\User $user=null){
    $request->session()->flash('last-position:RouteParams',$request->route()->parameters());
    $request->session()->flash('last-position:Chat',$user->last_chat ?? \Auth::user()->last_chat);
    $request->session()->flash('last-position:View',$request->route()->getName());
}

}