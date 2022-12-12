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
        Schema::create('test_result_vkraepelin', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('tests_name')->default("KRAEPELIN");
            $table->integer('testers_id')->nullable()->comment("Alias Psikolog");
            $table->string('num_test')->nullable();
            $table->text('answer')->nullable();
            $table->date('date');
            $table->integer('stored_by')->nullable();
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
        Schema::dropIfExists('test_result_vkraepelin');
    }
};
