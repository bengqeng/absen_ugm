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
        # Note
        # Its for developer purpose
        # need to create view to edit each key
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(true)->nullable(false);
            $table->text('properties')->nullable(true);
            $table->jsonb('options')->nullable(true);
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
        Schema::dropIfExists('settings');
    }
};
