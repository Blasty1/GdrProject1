<?php

namespace App\Listeners;

use App\Events\UpdateDataUserPt1;
use App\Usermecha;
use Error;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PharIo\Manifest\Email;
use App\Notifications\ChangeEmail;
use App\Notifications\ChangePassword;

class SendUpdataDataToCheckAndToDb
{
   
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->extensionsImage = [
            '.jpg' , '.gif' , '.png' , '.jpeg'
        ];
    }

    public function imageUrlIsCorrect(string $url){

         return \Str::contains($url, $this->extensionsImage);

    }

    /**
     * Handle the event.
     *
     * @param  UpdateDataUserPt1  $event
     * @return void
     */
    public function handle(UpdateDataUserPt1 $event)
    {
        try{

            if( !$event->dataToCheck ) throw new Exception('Nessun dato inserito');

            foreach ( $event->dataToCheck as $key => $data ){

            //html is trasformed and space is deleted
            $dataSanitized=htmlspecialchars(trim($data));

            if( $key === 'immagine_mecha' ){
                
                if( !$this->imageUrlIsCorrect($dataSanitized) ) {

                    throw new Exception('Errore link immagine, deve terminare con .gif .jpeg . jpg .png');

                }

                if ( !$event->user->mecha ) throw new Exception('Mecha non presente');

                $event->user->mecha->immagine = $dataSanitized;
                $event->user->mecha->save();
                continue;


            }else if( $key == 'email' ){

                $event->user->email= $dataSanitized;
                $event->user->save();

                $event->user->notify(new ChangeEmail($event->user->name));
                continue;

            }else if( $key === 'password' ){

                if( !preg_match( '/[A-Z]/' , $dataSanitized ) || !preg_match( '/\d/' , $dataSanitized ) ) throw new Exception('La password deve contenere almeno un numero e una maiuscola');

                if( strlen($dataSanitized) < 8 ) throw new Exception('La password deve essere lunga almeno 8 caratteri');

                $event->user->password= \Hash::make($dataSanitized);
                $event->user->save();


                $event->user->notify(new ChangePassword($event->user->name));
                continue;
                

            }else if( $key === 'data_di_nascita'){

                $event->user[$key] = date_format( (date_create($dataSanitized) ) , 'Y-m-d');
                $event->user->save();
                continue;
            }


            if( !$this->imageUrlIsCorrect($dataSanitized) ) {

                    throw new Exception('Errore link immagine, deve terminare con .gif .jpeg . jpg .png');

            }
            $event->user[$key] = $dataSanitized;

            
            $event->user->save();
            
        
        }
        }catch(\Exception $e){
            
            return $e->getMessage();
        }

    }


 
}
