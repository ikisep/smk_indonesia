<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassAndAbsenToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('class')->nullable(); // Kelas, contoh: X IPA 1
            $table->integer('absen')->nullable(); // Nomor absen, contoh: 12
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['class', 'absen']);
        });
    }
}

