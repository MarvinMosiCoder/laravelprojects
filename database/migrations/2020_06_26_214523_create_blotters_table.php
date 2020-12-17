<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blotters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('residences_id');
            $table->string('comp_name');
            $table->integer('comp_age');
            $table->string('comp_gender');
            $table->string('comp_nat');
            $table->string('comp_address');
            $table->string('resp_name');
            $table->integer('resp_age');
            $table->string('resp_gender');
            $table->string('resp_nat');
            $table->string('resp_address');
            $table->string('serial_number');
            $table->string('blotter_type');
            $table->string('location');
            $table->text('comp_statement');
            $table->text('resp_statement');

            $table->index('residences_id');
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
        Schema::dropIfExists('blotters');
    }
}
