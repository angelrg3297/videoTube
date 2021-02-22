<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->unsignedBigInteger('id',20)->autoIncrement();
            $table->unsignedBigInteger('user_id');            
            $table->string('title', 80);
            $table->string('description', 255);
            $table->integer('status')->default(1);
            $table->string('image', 255);
            $table->string('video_path', 255);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();            
            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}