<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_registers', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('traineeStart')->nullable();
            $table->string('traineeFinish')->nullable();
            $table->string('effectivated')->nullable();
            $table->string('disconected')->nullable();
/*            $table->foreignId('members_id')
                ->references('id')
                ->on('members');
*/        });
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
