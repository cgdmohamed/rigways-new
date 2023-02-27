<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->longText('company_address');
            $table->string('company_phone')->unique();
            $table->string('company_email')->nullable();
            $table->longText('company_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
