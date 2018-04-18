<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //user sinh vien
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code",10)->unique();
            $table->string("student_name");
            $table->string("address");
            $table->integer("id_department"); //khoa
            $table->integer("id_course"); //khóa
            $table->integer("id_branch");
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
        Schema::dropIfExists('users');
    }
}
