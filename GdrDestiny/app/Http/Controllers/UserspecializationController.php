<?php

namespace App\Http\Controllers;

use App\Exp;
use Illuminate\Http\Request;

class UserspecializationController extends Controller
{
    public function returnSpecsOfUser($idUser){
        $specs_of_user=\App\User::find($idUser)->specs;
        foreach($specs_of_user as $spec_of_user){
            
            $idSpecsUser[]=$spec_of_user->id_specialization;
        }

        return $idSpecsUser ?? [];
    }
   
    public function addSpecs(int $idUser,string $specFrom,Request $request){

        $user=\App\User::where('id',$idUser)->with('skills')->get()[0];
        $userSkills=SkillController::getSkills($user)[$specFrom];

       $this->saveDataPreSubmit($request,'schedaPg/addSpec.js');
        
        //get the id of the skills
        foreach($userSkills as $skill){
            $idSkills[]=$skill['id'];
        }
        
        $specs=\App\Specialization::whereIn('id_skill1', $idSkills)->whereIn('id_skill2',$idSkills)->whereNotIn('id',$this->returnSpecsOfUser($idUser))->get();
        
        
       return view('internoLand.schedaUser.addSpec',[
        'idUser' => $idUser,
        'specs' => $specs
        ]);
    }

    public function storeSpecs($idUser,Request $request){
        $idSpecs=$request->idSpecs;
        $userExp=Exp::getSum($idUser);

        if( !$idSpecs ) return $this->returnBackWithError($request,'Devi selezionare almeno una specializzazioni');

        //check if the user has the the exp necessary to buy the level
        if( $userExp < 100 * count($idSpecs) ) $messageToShow='Hai bisogno di ' . (100 * count($idSpecs) - $userExp) . ' exp';
        
        $user=\Auth::user();
        
        
        if(( count($this->returnSpecsOfUser($idUser)) + count($idSpecs) ) > 10 ) $messageToShow='Hai scelto troppe specializzazioni';
        if(isset($messageToShow)) return $this->returnBackWithError($request,$messageToShow);

        try{
            foreach($idSpecs as $idSpec){
                $idSpecDecrypt=\Crypt::decrypt($idSpec);
               
                if( !$this->checkIfSpecIsGetting($idSpecDecrypt,$idUser)) return $this->returnBackWithError($request,'la specializzazione non puo essere appresa');
                \App\Userspecialization::insert([
                    'id_specialization' => $idSpecDecrypt,
                    'id_user' => $idUser
                ]);

                Exp::remove(100,null,$idUser,'Acquisto Spec ' . \App\Specialization::find($idSpecDecrypt)->name);
        

            }

        }catch(\Exception $e){
            
            return $this->returnBackWithError($request,$e->getMessage());
        }
       
        $whatshowsInModal1=[
            'routeName' => 'showSkills',
            'parametrs' => $idUser,
            'scriptName' => 'schedaPg/userProfile.js'
        ];
        return $this->returnBack($request,null,$whatshowsInModal1);

    }


    public function checkIfSpecIsGetting($specId,$userId){
        $userSkills=\App\User::find($userId)->skills;
        $specSelected=\App\Specialization::where('id',$specId)->get()[0];

        $skillFound=0;

        foreach($userSkills as $skill){
   

            if($specSelected->id_skill1 === $skill->id || $specSelected->id_skill2 === $skill->id) $skillFound +=1;

        }
        if($skillFound == 2) return true;

        return false;


    }
}
