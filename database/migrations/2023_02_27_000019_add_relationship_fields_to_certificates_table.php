<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCertificatesTable extends Migration
{
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('for_rig_name_id')->nullable();
            $table->foreign('for_rig_name_id', 'for_rig_name_fk_8097729')->references('id')->on('rigs');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_8097733')->references('id')->on('teams');
        });
    }
}
