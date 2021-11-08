<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penelitian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('file');
            $table->unsignedInteger('dosen_id')->references('id')->on('users');
            $table->date('dosen_date');
            $table->unsignedInteger('lppm_id')->references('id')->on('users');
            $table->enum('lppm_approval',['3','2','1','0'])->default('0');
            $table->text('lppm_note');
            $table->date('lppm_date');
            $table->unsignedInteger('reviewer_id')->references('id')->on('users');
            $table->enum('reviewer_approval',['3','2','1','0'])->default('0');
            $table->text('reviewer_note');
            $table->date('reviewer_date');
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
        Schema::dropIfExists('penelitian');
    }
}
