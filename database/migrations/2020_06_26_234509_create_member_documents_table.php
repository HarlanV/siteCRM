<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('member_registers', function (Blueprint $table) {
        Schema::create('member_documents', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->unique();
            $table->string('rg')->nullable();
            $table->string('rgEntity')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('traineeStart')->nullable();
            $table->string('traineeFinish')->nullable();
            $table->string('effectivated')->nullable();
            $table->string('disconected')->nullable();
            $table->foreignId('member_id')
                ->references('id')
                ->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_registers');
    }
}
