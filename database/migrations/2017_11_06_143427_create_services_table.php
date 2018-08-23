<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mecanic_id');
            $table->string('beneficiar_id');
            $table->integer('parent_id')->nullable();
            $table->string('piese');
            $table->integer('cantitate');
            $table->integer('pret');
            $table->integer('suma');
            $table->integer('pret_lucru');
            $table->integer('suma_totala');
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
        Schema::dropIfExists('services');
    }
}
