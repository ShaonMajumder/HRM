<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',,'award_name','award_description','gift_item','award_by','date','month','year'
    ];
}
