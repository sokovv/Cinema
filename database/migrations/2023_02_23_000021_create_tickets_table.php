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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_times_id')->constrained()->cascadeOnDelete();
            $table->foreignId('places_id')->constrained()->cascadeOnDelete();
            $table->foreignId('films_id')->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->integer('row')->default(0);
            $table->integer('place')->default(0);
            $table->string('qr')->default(0);
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
        Schema::dropIfExists('tickets');
    }
};
