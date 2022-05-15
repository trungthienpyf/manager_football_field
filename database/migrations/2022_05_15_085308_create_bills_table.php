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
            $table->timestamp('time_receive');
            $table->timestamp('time_end');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('football_field_id')->constrained('foot_ball_fields');
            $table->foreignId('admin_id')->constrained('admins');
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
