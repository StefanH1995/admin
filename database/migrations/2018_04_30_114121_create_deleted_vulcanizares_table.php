<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedVulcanizaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_vulcanizares', function (Blueprint $table) {
            $table->increments('id');
            $table->text('user_id');
            $table->text('vulcanizator_id');
            $table->string('beneficiar_id');
            $table->integer('suma');
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
        Schema::dropIfExists('deleted_vulcanizares');
    }
}
