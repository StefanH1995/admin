<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapoartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapoartes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('mecanic_id');
            $table->text('reglarea_mecanic_id');
            $table->text('vulcanizator_id');
            $table->text('service');
            $table->text('service_transfer');
            $table->text('vulcanizare');
            $table->text('vulcanizare_transfer');
            $table->text('total');
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
        Schema::dropIfExists('rapoartes');
    }
}
