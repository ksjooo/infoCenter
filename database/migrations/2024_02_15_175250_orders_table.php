<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('cabinet')->nullable();
            $table->string('status')->default('PROGRESS');
            $table->string('initiator_name')->nullable();
            $table->uuid('initiator_id')->nullable();
            $table->foreign('initiator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->uuid('acceptor_id');
            $table->foreign('acceptor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
