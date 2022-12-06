<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // total row must always same with the total row asset
        Schema::create('asset_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assets_id')->constrained('assets')->unique();
            $table->unsignedBigInteger('total_asset');
            $table->unsignedBigInteger('borrowed');
            $table->unsignedBigInteger('maintain');
            $table->unsignedBigInteger('ready');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_status');
    }
};
