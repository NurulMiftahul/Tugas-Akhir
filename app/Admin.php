<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Autenticatable;

class Admin extends  Autenticatable
{
    use Notifiable;

    protected $guard ='admin';
    
    protected $table ='admin';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'email', 'password'];
}
