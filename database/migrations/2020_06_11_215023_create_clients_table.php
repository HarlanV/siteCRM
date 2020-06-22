<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('market')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->nullable();
            $table->boolean('prospect')->nullable();
            $table->integer('contactTimes')->nullable();
            /* 
            1- Status vai para o funil de vendas, o prospect e interger
            vai para o relatorio.
            2 - Prealocar valores de status para facilitar
            realatorio
            3 - Verificar a criação de nova migration para uma tabela 
            especifica para os relatorios de prospecção. A tabela deve
            se comunicar com membros e clientes. Conhecimento pendente"
            */


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
