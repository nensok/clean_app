<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cleaner_id');
            $table->integer('jobpost_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->mediumText('location');
            $table->string('jobpost_name');
            $table->string('jobpost_phone');
            $table->string('jobpost_email');
            $table->mediumText('jobpost_address');
            $table->boolean('approve')->default(false);
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
        Schema::dropIfExists('applies');
    }
}
