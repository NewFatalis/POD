<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('violations');

        Schema::create('violations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('violation');
            $table->string('category');
            // $table->string('first_sanction')->nullable();
            // $table->string('second_sanction')->nullable();
            // $table->string('third_sanction')->nullable();
            // $table->string('fourth_sanction')->nullable();
            // $table->string('fifth_sanction')->nullable();
            // $table->string('sixth_sanction')->nullable();
            // $table->string('seventh_sanction')->nullable();
            $table->enum('group_id',array(1,2,3));
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
        //
    }
}
