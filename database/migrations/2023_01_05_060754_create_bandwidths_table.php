<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bandwidths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reseller_id')->constrained();
            $table->string('name');
            $table->bigInteger('bandwidth');
            $table->decimal('price', 15, 2)->nullable();
            $table->text('description')->nullable();
            $table->softDeletesTz();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bandwidths');
    }
};
