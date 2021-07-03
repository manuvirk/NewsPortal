<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('meta-author')->nullable();
            $table->string('meta-title')->nullable();
            $table->string('meta-keyword')->nullable();
            $table->text('meta-description')->nullable();
            $table->text('google-analytics')->nullable();
            $table->string('google-verification')->nullable();
            $table->text('alexa-analytics')->nullable();
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
        Schema::dropIfExists('seos');
    }
}
