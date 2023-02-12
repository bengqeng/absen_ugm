<?php

use App\Models\Attendance;
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
        Schema::create('attendance', function (Blueprint $table) {
            $enumStatus = [];
            $status = new Attendance();
            $enumStatus = $status->listStatus();

            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable(false);
            $table->dateTime('check_in', $precision = 0)->nullable(false);
            $table->dateTime('check_out', $precision = 0)->nullable();
            $table->enum('status_in', $enumStatus)->nullable(false);
            $table->enum('status_out', $enumStatus)->nullable(true);
            $table->longText('note_in')->nullable();
            $table->longText('note_out')->nullable();
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
        Schema::dropIfExists('attendance');
    }
};
