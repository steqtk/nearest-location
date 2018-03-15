<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->string('store')->nullable();
            $table->double('id')->nullable();
            $table->string('res_id')->nullable();
            $table->string('city')->nullable();
            $table->string('streetna_1')->nullable();
            $table->string('address')->nullable();
            $table->string('house_num1')->nullable();
            $table->string('house_num2')->nullable();
            $table->string('house_num3')->nullable();
            $table->string('house_num4')->nullable();
            $table->string('house_num5')->nullable();
            $table->string('house_num6')->nullable();
            $table->string('build_type')->nullable();
            $table->string('adres_full')->nullable();
            $table->string('cell')->nullable();
            $table->string('y')->nullable();
            $table->string('x')->nullable();
            $table->string('car')->nullable();
            $table->string('pedestrian')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('year_buld')->nullable();
            $table->string('floors')->nullable();
            $table->string('flats')->nullable();
            $table->string('matwalls')->nullable();
            $table->string('people')->nullable();
            $table->string('key_accou')->nullable();
            $table->string('bus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
