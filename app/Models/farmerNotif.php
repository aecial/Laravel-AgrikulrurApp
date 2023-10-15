<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farmerNotif extends Model
{
    use HasFactory;

    protected $table = 'farmer_notifs';

    protected $fillable = ['auction_id', 'crop_id', 'creator_id'];
}
