<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_add_class_id_to_users_table.php
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya tambahkan class_id tanpa menambah kolom role yang sudah ada
            $table->foreignId('class_id')->nullable()->constrained('kelas')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('class_id');
        });
    }
    
};
