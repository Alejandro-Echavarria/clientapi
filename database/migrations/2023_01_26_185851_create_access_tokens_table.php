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
        Schema::create('access_tokens', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInterger('service_id'); // ID del usuario en la base de datos de la API
            $table->text('access_token');
            $table->text('refresh_token');
            $table->dateTime('expires_at');

            $table->foreignId('user_id')
                  ->constrained(); // ID del uisuario de la apliacion cliente

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
        Schema::dropIfExists('access_tokens');
    }
};
