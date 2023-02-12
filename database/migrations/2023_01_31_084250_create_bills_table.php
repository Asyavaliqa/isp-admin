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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique();
            $table->unsignedInteger('type')->default(1);
            $table->decimal('balance', 64, 2);
            $table->string('bill_photo')->nullable();
            $table->foreignId('reseller_id')->nullable()->constrained();
            $table->string('reseller_name');
            $table->foreignId('client_id')->nullable()->constrained();
            $table->string('client_name');
            $table->foreignId('plan_id')->nullable()->constrained();
            $table->string('plan_name');
            $table->text('description')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('payed_at')->nullable();
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
        Schema::dropIfExists('bills');
    }
};
