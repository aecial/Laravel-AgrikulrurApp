<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pending_transactions', function (Blueprint $table) {
            $table->id('pay_id');
            $table->integer('auction_id')->references('auction_id')->on('auctions')->unsigned();;
            $table->integer('creator_id')->references('id')->on('users')->unsigned();
            $table->integer('bidder_id')->references('id')->on('users')->unsigned();
            $table->string('creator_status');
            $table->string('bidder_status');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_transactions');
    }
};
