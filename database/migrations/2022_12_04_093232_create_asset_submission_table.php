<?php

use App\Models\AssetSubmission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('asset_submission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable(false);
            $table->foreignId('asset_id')->constrained('assets')->nullable(false);
            $table->enum('status', AssetSubmission::STATUS)->nullable(true);
            $table->unsignedBigInteger('total_borrowed')->nullable(false);
            $table->foreignId('approval_id')->nullable(true)->constrained('users');
            $table->dateTime('user_date_take', $precision = 0)->nullable(true);
            $table->foreignId('return_approval_id')->nullable(true)->constrained('users');
            $table->dateTime('user_date_return', $precision = 0)->nullable(true);
            $table->dateTime('date_borrow', $precision = 0)->nullable(true);
            $table->dateTime('date_return', $precision = 0)->nullable(true);
            $table->longText('description_borrow')->nullable(true);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE asset_submission ADD photo_taking_asset MEDIUMBLOB");
        DB::statement("ALTER TABLE asset_submission ADD photo_returning_asset MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_submission');
    }
};
