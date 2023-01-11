<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('Owner')->constrained();
            $table->string('name')->nullable()->comment('Company Name');
            $table->string('email')->nullable()->comment('Company Email');
            $table->string('phone_number')->nullable()->comment('Company Phone Number');
            $table->string('address')->nullable()->comment('Company Address');
            $table->date('contract_start_at')->nullable();
            $table->date('contract_end_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resellers');
    }
};
