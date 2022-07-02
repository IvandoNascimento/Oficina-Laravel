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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->string('nome');
            $table->date('data')->default(now());
            $table->enum('tipo',['venda','compra','protecao'])->default('venda');
            $table->boolean('finalizado')->default(false);
            //$table->foreignIdFor(User::class);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoques');
    }
};
