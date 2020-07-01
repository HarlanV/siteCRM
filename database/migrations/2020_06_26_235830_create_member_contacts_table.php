<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_contacts', function (Blueprint $table) {
            $table->id();
            
            $table->string('primaryEmail');
            $table->string('secondaryEmail')->nullable();
            $table->string('primaryPhone');
            $table->string('secondaryPhone')->nullable();
            $table->string('adress')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('cep');
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
        Schema::dropIfExists('member_contacts');
    }
}
