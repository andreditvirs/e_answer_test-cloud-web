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
        $type = ['PERSEORANGAN', 'CV', 'PT', 'KOPERASI', 'FIRMA', 'PERSERO', 'LAINNYA'];
        Schema::create('companies', function (Blueprint $table) use ($type){
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->enum('type', $type);
            $table->string('note');
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
        Schema::dropIfExists('companies');
    }
};
