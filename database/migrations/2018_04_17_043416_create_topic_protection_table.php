<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicProtectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // sinh vien dang ky de tai den thy ky
        //
        Schema::create('topic_protection', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_student");// id sv
            $table->integer("id_topic"); // id de tai
            $table->integer("id_protection"); // id dot bao ve
            $table->boolean("acceptance")->default(false);
            $table->boolean("pass")->default(false);
            $table->integer("scores")->default(-1);

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
        Schema::dropIfExists('topic_protection');
    }
}
