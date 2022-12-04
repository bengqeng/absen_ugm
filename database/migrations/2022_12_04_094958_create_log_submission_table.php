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
        Schema::create('log_submission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable(false);
            $table->foreignId('asset_id')->constrained('assets')->nullable(false);
            $table->string('status')->nullable(false);
            $table->unsignedBigInteger('total_borrowed')->nullable(false);
            $table->foreignId('approval_id')->constrained('users')->nullable(true);
            $table->dateTime('date_borrow', $precision = 0)->nullable(true);
            $table->dateTime('date_return', $precision = 0)->nullable(true);
            $table->longText('description_borrow')->nullable(true);
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
        Schema::dropIfExists('log_submission');
    }
};
