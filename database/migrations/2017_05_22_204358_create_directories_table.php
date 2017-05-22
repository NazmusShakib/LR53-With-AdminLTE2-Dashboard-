<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('batch_and_dept')->nullable();
            $table->string('campus')->nullable();
            $table->text('present_address')->nullable();
            $table->string('job_designation')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('alt_mob_of_relative')->nullable();
            $table->string('remarks')->nullable();
            $table->string('query')->nullable();
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('directories');
    }
}
