<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // thong tin giang vien
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name_lecturer");
            $table->string("address_lecturer");
            $table->string("email_address_lecturer");
            $table->string("phone_number");
            $table->integer("id_department"); //khoa
            $table->integer("id_field");// ma linh vuc huong dan

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
        Schema::dropIfExists('employees');
    }
}
