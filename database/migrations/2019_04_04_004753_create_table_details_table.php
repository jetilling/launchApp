<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('column_name');
            $table->string('column_type');
            $table->boolean('column_is_nullable');
            $table->string('enum_types');
            $table->integer('varchar_length')->nullable();
            $table->string('default_value')->nullable();
            $table->bigInteger('table_names_id');
            $table->timestamps();

            // foreign keys
            $table->foreign('table_names_id')->references('id')->on('table_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_details');
    }
}
