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
        Schema::table('limite_de_province02', function (Blueprint $table) {
            //
            $table->date('date_debut')->default('10-Jan-2021');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('limite_de_province02', function (Blueprint $table) {
            //
            $table->dropColumn('date_debut');
        });
    }
};
