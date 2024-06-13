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
        Schema::create('ManageActivityEntity', function (Blueprint $table) {
            $table->id();
            $table->string('activity_name', 100)->nullable();
            $table->string('activity_desc', 255);
            $table->integer('activity_studentAge')->nullable();
            $table->datetime('activity_dateTime');
            $table->integer('activity_studentNum')->nullable();
            $table->string('activity_comment', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ManageActivityEntity');
    }
};
