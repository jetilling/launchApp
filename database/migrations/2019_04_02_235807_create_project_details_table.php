<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        $authTypes = ['email', 'social', 'both', 'none', 'not_sure'];
        $monetizationTypes = ['upfront', 'in_app', 'free', 'not_sure'];
        $routingTypes = ['server_side', 'react'];
        $frontendFrameworkTypes = ['react', 'vue', 'angular', 'jQuery'];
        $projectTypes = ['laravel', 'lumen', 'golang'];

        Schema::create('project_details', function (Blueprint $table) use ($authTypes, $monetizationTypes, $routingTypes, $frontendFrameworkTypes, $projectTypes) {
            $table->bigIncrements('id');
            $table->string('user_uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('authentication')->nullable();
            $table->enum('authentication_type', $authTypes)->nullable();
            $table->boolean('user_profile')->nullable();
            $table->boolean('dashboard')->nullable();
            $table->boolean('admin_dashboard')->nullable();
            $table->enum('monetization_types', $monetizationTypes)->nullable();
            $table->boolean('upload')->nullable();
            $table->boolean('third_part_api')->nullable();
            $table->enum('routing', $routingTypes)->default('server_side')->nullable();
            $table->enum('frontend_framework', $frontendFrameworkTypes)->default('vue')->nullable();
            $table->enum('project_type', $projectTypes)->default('laravel')->nullable();
            $table->timestamps();

            // foreign keys
            $table->foreign('user_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_details');
    }
}
