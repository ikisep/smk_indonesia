<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('subject');
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('tugas');
            $table->float('na');
            $table->string('grade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}