<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAgentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_agent_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('location');
            $table->string('user_id')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('browser');
            $table->string('os_name');
            $table->string('device');
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
        Schema::dropIfExists('user_agent_infos');
    }
}
