<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('task_id');
            $table->integer('week');
            $table->float('comp_time');
            $table->timestamps();

            $table->foreign('developer_id')
                ->references('id')
                ->on('developers')
                ->onDelete('cascade');

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dev_tasks');
    }
}
