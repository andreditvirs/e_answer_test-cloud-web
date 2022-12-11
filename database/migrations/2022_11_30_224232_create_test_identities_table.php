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
        Schema::create('test_identities', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('tests_id');
            $table->integer('testers_id')->nullable()->comment("Alias Psikolog");
            $table->string('num_test')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('test_identities');
    }
};
