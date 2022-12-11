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
        $type = ['PILGAN', 'URAIAN', 'KRAEPELIN'];
        Schema::create('questions', function (Blueprint $table) use ($type) {
            $table->id();
            $table->integer('number');
            $table->integer('row_number')->nullable();
            $table->integer('col_number')->nullable();
            $table->text('text')->nullable();
            $table->text('options')->nullable();
            $table->enum('type', $type);
            $table->string('answer_key')->nullable();
            $table->string('notes')->nullable();
            $table->integer('tests_id')->nullable();
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
        Schema::dropIfExists('questions');
    }
};
