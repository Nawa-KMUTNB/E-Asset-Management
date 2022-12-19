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
            $table->renameColumn('name', 'num_asset');
            $table->string('name_asset');
            $table->renameColumn('email', 'propoty');
            $table->longText('detail');
            $table->renameColumn('address', 'unit');
            $table->date('date_into');
            $table->double('price', 10, 2);
            $table->string('place');
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
        });
    }
};