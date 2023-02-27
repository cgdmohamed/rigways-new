<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('for_company_id')->nullable();
            $table->foreign('for_company_id', 'for_company_fk_8097252')->references('id')->on('companies');
            $table->unsignedBigInteger('workers_id')->nullable();
            $table->foreign('workers_id', 'workers_fk_8097298')->references('id')->on('teams');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_8097253')->references('id')->on('teams');
        });
    }
}
