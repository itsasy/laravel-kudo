<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkerToBoards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Boards', function (Blueprint $table) {
            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Boards', function (Blueprint $table) {
            $table->dropForeign('boards_worker_id_foreign');
            $table->dropColumn('worker_id');
        });
    }
}