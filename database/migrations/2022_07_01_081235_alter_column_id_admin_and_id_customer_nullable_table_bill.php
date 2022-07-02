<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnIdAdminAndIdCustomerNullableTableBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
        if(Schema::hasColumn('bills','customer_id')){
            $table->foreignId('customer_id')->nullable()->change();
        }
            if(Schema::hasColumn('bills','admin_id')) {
                $table->foreignId('admin_id')->nullable()->change();
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
