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
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('code_money_id');
            $table->unsignedBigInteger('name_money_id');
            $table->unsignedBigInteger('budget');
            $table->foreign('code_money_id')->references('id')->on('cashes');
            $table->foreign('name_money_id')->references('id')->on('cashes');
            $table->foreign('budget')->references('id')->on('cashes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
};