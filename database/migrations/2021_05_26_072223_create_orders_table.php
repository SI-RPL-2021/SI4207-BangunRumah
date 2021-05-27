<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('owner');
            $table->string('projectName');
            $table->string('ownerPhone');
            $table->string('projectAddress');
            $table->string('projectPirce');
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
        Schema::dropIfExists('Orders');
    }
}
