<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('leave_code');
            $table->integer('employee_id')->unsigned();
            $table->date('submit_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('leave_amount')->unsigned();
            $table->string('type_of_leave');
            $table->string('description');
            $table->string('phone');
            $table->string('approver')->nullable();
            $table->date('approved_date')->nullable();
            $table->integer('status')->default(0);
            $table->integer('softdelete')->default(0);
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
        Schema::dropIfExists('leaves');
    }
}
