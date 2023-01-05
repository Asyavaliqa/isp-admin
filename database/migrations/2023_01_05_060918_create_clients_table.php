<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bandwidth_id');
            $table->unsignedBigInteger('reseller_id');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('bandwidth_id')->constrained();
            $table->foreignId('reseller_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
