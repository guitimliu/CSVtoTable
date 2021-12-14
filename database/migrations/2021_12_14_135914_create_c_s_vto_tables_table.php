<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCSVtoTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_s_vto_tables', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamps();
            $table->string('usec');
            $table->string('SourceIP');
            $table->string('SourcePort');
            $table->string('DestinationIP');
            $table->string('DestinationPort');
            $table->string('FQDN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_s_vto_tables');
    }
}
