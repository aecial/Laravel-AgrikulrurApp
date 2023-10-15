<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consNotif extends Model
{
    use HasFactory;

    protected $table = 'cons_notifs';

    protected $fillable = ['auction_id', 'crop_id', 'bidder_id'];
}
