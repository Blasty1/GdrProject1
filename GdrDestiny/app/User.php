<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Roles\methodRole;

class User extends Authenticatable
{
    use Notifiable;
    use methodRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'last_chat','surname','email', 'data_di_nascita','nazionalità','password','sesso','id_razza','note_fato','background','note_off','indirizzo_ip','immagine_avatar','last_activity','id_emisfero','role'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    public function breed(){
        return $this->belongsTo('App\Breed','id_razza','id');
    }

    public function classes(){
        return $this->belongsToMany('App\Classe','userclasses','id_user','id_classe');
    }

    public function skills(){
        return $this->belongsToMany('App\Skill','userskills','id_user','id_skill')->withPivot('livello');
    }
    public function exps(){
        return $this->hasMany('App\Exp','id_user_to');
    }
    public function specs(){
        return $this->belongsToMany('App\Specialization','userspecializations','id_user','id_specialization');
    }

    


}
