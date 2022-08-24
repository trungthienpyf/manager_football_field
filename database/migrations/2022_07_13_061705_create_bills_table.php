<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
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
            $table->timestamp('time_created')->useCurrent();
            $table->tinyInteger('status')->comment('BillStatusEnum')->default('0');
            $table->integer('price');
            $table->date('date_receive');
            $table->string('phone_receive');
            $table->string('name_receive');
            $table->string('email_receive')->nullable();
            $table->foreignId('time_id')->constrained('times');
            $table->foreignId('pitch_id')->constrained('pitches');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('admin_id')->nullable()->constrained('admins');
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
}
