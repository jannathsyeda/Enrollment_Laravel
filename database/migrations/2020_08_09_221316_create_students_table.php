<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('department_id');
            $table->string('name');
            $table->string('slug');
            $table->string('batch');
            $table->string('reg_id');
            $table->string('phone');
            $table->string('gender');
            $table->integer('cgpa');
            $table->string('details')->nullable();
            $table->string('image')->default('default.png');
            $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onDelete('cascade'); 
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
        Schema::dropIfExists('students');
    }
}
