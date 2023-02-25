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
        // IF there is any coloumn change pls adjust to coloumn trp_log_submission do we need to include it there to make easier query

        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->unique();
            $table->longText('description');
            $table->text('image_url')->default(null)->nullable(true);

            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
