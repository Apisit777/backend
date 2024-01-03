<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public $primarykey = 'id';
    // protected $fillable = [
    //     'user_code',
    //     'user_name',
    //     'nickname',
    //     'e_mail',
    //     'phone',
    //     'position',
    //     'team',
    //     'e_mail_team',
    //     'e_mail_group',
    //     'gmail',
    //     'anydesk',
    //     'status'
    // ];

    public $timestamps = true;
}
