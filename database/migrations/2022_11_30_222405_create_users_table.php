<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('username');
            $table->text('password');
            $table->string('name');
            $table->string('role');
            $table->enum('gender', ['LK', 'PR']);
            $table->string('position_in_company')->nullable();
            $table->text('address')->nullable();
            $table->text('birthplace')->nullable();
            $table->date('birthday')->nullable();
            $table->string('education_level')->nullable();
            $table->string('education_prody')->nullable();
            $table->string('education_institution')->nullable();
            $table->string('field')->nullable();
            $table->text('note')->nullable();
            $table->integer('companies_id')->nullable();
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
        Schema::dropIfExists('users');
    }
};
