<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRigsTable extends Migration
{
    public function up()
    {
        Schema::table('rigs', function (Blueprint $table) {
            $table->unsignedBigInteger('in_project_id')->nullable();
            $table->foreign('in_project_id', 'in_project_fk_8097698')->references('id')->on('projects');
            $table->unsignedBigInteger('workforce_id')->nullable();
            $table->foreign('workforce_id', 'workforce_fk_8097699')->references('id')->on('teams');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_8097703')->references('id')->on('teams');
        });
    }
}
