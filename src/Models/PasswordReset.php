<?php 

namespace TienEnjoywork\APIAuth\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = [
        'email', 'token'
    ];
}