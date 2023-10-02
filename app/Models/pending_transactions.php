<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pending_transactions extends Model
{
    use HasFactory;

    protected $table = 'pending_transactions';

    protected $fillable = ['auction_id','creator_id', 'bidder_id', 'creator_status', 'bidder_status', 'status'];
}
