<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('url');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id')->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->datetime('start');
            $table->datetime('end');
            $table->double('daily');
            $table->double('weekly');
            $table->timestamps();
        });

        Schema::create('company_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('filename');
            $table->timestamps();
        });

        Schema::create('complexes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('phone2');
            $table->string('url');
            $table->integer('schedule_id')->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->timestamps();
        });

        Schema::create('complex_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->string('filename');
            $table->timestamps();
        });

        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->string('name');
            $table->string('unit_no');
            $table->string('beds');
            $table->string('baths');
            $table->string('sleeps');
            $table->boolean('pet_friendly');
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->text('description');
            $table->integer('schedule_id')->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('unit_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('filename');
            $table->text('description');
            $table->string('alt');
            $table->integer('order');
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
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('rates');
        Schema::dropIfExists('company_photos');
        Schema::dropIfExists('complexes');
        Schema::dropIfExists('complex_photos');
        Schema::dropIfExists('units');
        Schema::dropIfExists('unit_photos');
    }
}
