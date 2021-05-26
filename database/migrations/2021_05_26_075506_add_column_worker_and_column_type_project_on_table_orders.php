<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnWorkerAndColumnTypeProjectOnTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->integer('worker')->after('projectPirce');
            $table->string('type_project')->after('worker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->dropColumn('worker');
            $table->dropColumn('type_project');
        });
    }
}
