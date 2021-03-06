<?php

namespace App\Http\Controllers;

use App\Bottommap;
use App\Events\ChangeMap;
use App\Middlemap;
use Exception;
use Illuminate\Http\Request;

class BottommapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,int $idMiddlemap,int $idBottommap)
    {
       $map = Middlemap::findOrFail($idMiddlemap)->bottommaps->find($idBottommap);

       ChangeMap::dispatch(\Auth::user(),'bottommap',['idMiddlemap' => $idMiddlemap,"idBottommap" => $idBottommap]);
       
   
    
   
        return view('internoLand.submap',
        [
            'errors' => $request->errors,
            'map' => $map,
            'chats' => $map->chats,
            'mapchilds' => []
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBottommap){

        return $this->update_meteo('Bottommap',$idBottommap,$request->meteo);
        
    }

    public function showMeteo($idBottommap){

        return $this->show_meteo_info('Bottommap',$idBottommap);

    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
