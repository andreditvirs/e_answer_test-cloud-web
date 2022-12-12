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
        Schema::create('test_result_ist', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('tests_name')->default("INTELLIGENZ STRUKTUR TEST");
            $table->integer('testers_id')->nullable()->comment("Alias Psikolog");
            $table->string('num_test')->nullable();
            $table->date('date');
            $table->integer('stored_by')->nullable();
            $table->integer('I_se')->default(0);
            $table->integer('II_wa')->default(0);
            $table->integer('III_an')->default(0);
            $table->integer('IV_ge')->default(0);
            $table->integer('V_ra')->default(0);
            $table->integer('VI_zr')->default(0);
            $table->integer('VII_fa')->default(0);
            $table->integer('VIII_wu')->default(0);
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
        Schema::dropIfExists('test_result_ist');
    }
};
