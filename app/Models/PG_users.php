<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PG_users extends Model
{
    protected $table = 'pg_users';
    protected $fillable = [
        'user_code',
        'user_name',
        'nickname',
        'e_mail',
        'phone',
        'position',
        'team',
        'e_mail_team',
        'e_mail_group',
        'gmail',
        'anydesk',
        'status',
    ];
    public $timestamps = true;
    // use HasFactory;
}
