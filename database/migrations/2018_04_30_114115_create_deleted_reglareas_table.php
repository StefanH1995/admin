<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedReglareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_reglareas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('user_id');
            $table->string('mecanic_id');
            $table->string('beneficiar_id');
            $table->string('pret_lucru');
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
        Schema::dropIfExists('deleted_reglareas');
    }
}
