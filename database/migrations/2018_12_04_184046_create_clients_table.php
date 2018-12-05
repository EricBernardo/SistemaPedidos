<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->char('cnpj', 14);
            $table->string('address');
            $table->string('neighborhood');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('phone');
            $table->char('state', 2);
            $table->string('city');
            $table->timestamps();
            $table->index(['cnpj']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
