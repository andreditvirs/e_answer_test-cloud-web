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
        $type = ['IST', 'KRAEPELIN', '16PF', 'DISC'];
        Schema::create('tests', function (Blueprint $table) use ($type){
            $table->id();
            $table->string('name');
            $table->text('url_image')->nullable();
            $table->integer('duration')->default(0)->comment('In minutes');
            $table->enum('type', $type);
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
        Schema::dropIfExists('tests');
    }
};
