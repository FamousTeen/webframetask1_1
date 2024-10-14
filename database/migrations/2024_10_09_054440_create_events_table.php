<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->bigInteger('organizer_id')->unsigned();
            $table->bigInteger('event_category_id')->unsigned();
            $table->foreign('organizer_id')
                ->references('organizer_id')
                ->on('organizers')
                ->onDelete('cascade');
            $table->foreign('event_category_id')->references('category_id')->on('event_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('venue');
            $table->date('date');
            $table->time('start_time');
            $table->string('description');
            $table->string('booking_url')->nullable();
            $table->integer('tags')->nullable();
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
