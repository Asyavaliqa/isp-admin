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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique();
            $table->unsignedInteger('type')->default(1);
            $table->decimal('balance', 64, 2);
            $table->string('bill_photo')->nullable();
            $table->foreignId('reseller_id')->nullable()->constrained();
            $table->string('reseller_name');
            $table->foreignId('client_id')->nullable()->constrained();
            $table->string('client_name');
            $table->foreignId('bandwidth_id')->nullable()->constrained();
            $table->string('bandwidth_name');
            $table->timestamp('accepted_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
