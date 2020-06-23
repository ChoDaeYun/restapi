<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $ttable="comments";
    protected $fillable = ['user_id','subject', 'contents'];
}
