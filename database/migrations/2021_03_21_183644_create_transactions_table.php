<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
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
            $table->string('tracking_number')->nullable();
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('sender_address');
            $table->string('reciver_name');
            $table->string('reciver_phone');
            $table->string('reciver_address');
            $table->integer('total')->nullable();

            $table->foreignId('city_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->char('status', 1)->default(0)->comment('0: confirm, 1: process, 2: shipping, 3: done, 4: accepted');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('process_at')->nullable();
            $table->timestamp('shipping_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            // $table->timestamps();
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
}
