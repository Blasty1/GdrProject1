<?php

namespace App\Listeners;

use App\Events\ShowLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ConvertForeignToValue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * 
     * @return void
     */
    public function handle($event)
    {
        $arrayToReturn = [];
       
        foreach($event->values as $key => $value){

            $arrayToReturn[$key]=[
                \Str::singular( $value->getTable() ) => $value,
            ];

            foreach($event->namesRelationship as $nameRelation){
                
                if(!$value[$nameRelation]) continue ;
                $arrayToReturn[$key][$nameRelation]=$value[$nameRelation][$event->valueToGet];
                    
                

            }
           

        }

        return $arrayToReturn;


    }
}
