<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Money extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('motivazione');
            $table->integer('quantita')->nullable();
            $table->foreignId('id_user_from')->nullable();
            $table->foreignId('id_user_to');
    
            $table->foreign('id_user_from')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_user_to')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
