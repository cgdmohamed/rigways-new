<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRigsTable extends Migration
{
    public function up()
    {
        Schema::create('rigs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rig_name');
            $table->string('rig_type');
            $table->string('rig_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
