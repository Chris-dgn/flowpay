<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flowpay_test_transfers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('beneficiary');
            $table->string('account');
            $table->string('bank_name');
            $table->string('bic_swift', 11);
            $table->decimal('amount', 15, 2);
            $table->string('reason');

            // Code TEST FlowPay : 5 chiffres, non secret.
            $table->string('test_code', 5);

            $table->string('status')->default('verification_pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flowpay_test_transfers');
    }
};