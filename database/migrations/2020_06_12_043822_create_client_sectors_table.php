<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_sectors', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('adress')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('client_id')
                ->references('id')
                ->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_sectors');
    }
}
