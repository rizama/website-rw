<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_id')->nullable();
            $table->foreignId('job_id')->nullable();
            $table->foreignId('economic_conditions_id')->nullable();
            $table->foreignId('citizens_status_id')->nullable();
            $table->foreignId('evidens_id')->nullable();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('rt_number');
            $table->char('gender', 4)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('religion')->nullable();
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
        Schema::dropIfExists('persons');
    }
}
