<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiars', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nume');
            $table->text('category');
            $table->integer('telefon')->nullable();
            $table->text('model');
            $table->text('nr_masina');
            $table->integer('km')->nullable();
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
        Schema::dropIfExists('beneficiars');
    }
}
