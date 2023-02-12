<?php

use App\Models\Plan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reseller_id')->constrained();
            $table->string('name');
            $table->bigInteger('bandwidth')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->text('description')->nullable();
            $table->set('type', [
                Plan::PLAN_FIXED,
                Plan::PLAN_DYNAMIC,
            ])->default(Plan::PLAN_FIXED);
            $table->set('tax_type', [
                Plan::TAX_EXCLUDED,
                Plan::TAX_INCLUDED,
            ])->default(Plan::TAX_INCLUDED);
            $table->set('subscription', [
                Plan::SUBSCRIPTION_POSTPAID,
                Plan::SUBSCRIPTION_PREPAID,
            ])->default(Plan::SUBSCRIPTION_POSTPAID);
            $table->softDeletesTz();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
