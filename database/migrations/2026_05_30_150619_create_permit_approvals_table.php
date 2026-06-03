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
    Schema::create('permit_approvals', function (Blueprint $table) {
        $table->id();

        $table->foreignId('permit_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('approver_id')
              ->constrained('users')
              ->cascadeOnDelete();

        $table->string('approval_level');

        $table->enum('status', [
            'pending',
            'approved',
            'rejected'
        ])->default('pending');

        $table->text('remarks')->nullable();

        $table->timestamp('approved_at')->nullable();

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
        Schema::dropIfExists('permit_approvals');
    }
};
