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
    Schema::create('permits', function (Blueprint $table) {
        $table->id();

        $table->string('permit_no')->unique();

        $table->string('title');
        $table->text('description');

        $table->string('location');

        $table->foreignId('department_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('permit_type_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('requester_id')
              ->constrained('users')
              ->cascadeOnDelete();

        $table->dateTime('start_datetime');
        $table->dateTime('end_datetime');

        $table->enum('status', [
            'draft',
            'submitted',
            'supervisor_approved',
            'hse_approved',
            'manager_approved',
            'active',
            'completed',
            'rejected'
        ])->default('draft');

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
        Schema::dropIfExists('permits');
    }
};
