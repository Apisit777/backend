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
        Schema::create('loan_debts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_debt_code')->nullable()->comment('รหัสภาระหนี้สินเชื่อ');
            $table->string('customer_code')->nullable()->comment('รหัสลูกค้า');
            $table->string('name', 255)->nullable()->comment('ชื่อลูกค้า');
            $table->string('lastname', 255)->nullable()->comment('นามสกุล');
            $table->date('data_entry_date')->nullable()->comment('วันที่ลงข้อมูล');
            $table->string('loan_type')->nullable()->comment('ประเภทสินเชื่อ');
            $table->string('financial_institution')->nullable()->comment('สถาบันการเงิน');
            $table->string('account_number')->nullable()->comment('เลขที่บัญชี');
            $table->tinyInteger('on_off')->nullable()->comment('ภาระหนี้สินเชื่อ 0=ไม่ปิด 1=ปิด');
            $table->string('approval_limit')->nullable()->comment('วงเงินอนุมัติ');
            $table->string('outstanding_credit_limit')->nullable()->unique()->comment('วงเงินที่ค้าง');
            $table->string('installment_payment_month')->nullable()->comment('ค่างวดผ่อน/เดือน');
            $table->string('principal_month')->nullable()->comment('เงินต้น/เดือน');
            $table->string('interest_month')->nullable()->comment('ดอกเบี้ย/เดือน');
            $table->integer('account_sequence')->nullable()->comment('ลำดับบัญชี');
            $table->tinyInteger('account_status')->default('1')->nullable()->comment('สถานะบัญชี 0=ไม่ปกติ 1=ปกติ');
            $table->string('installment_type')->nullable()->comment('ประเภทการผ่อน');
            $table->string('up_low')->nullable()->comment('ขึ้นต่ำ');
            $table->string('note')->nullable()->comment('หมายเหตุ');
            $table->tinyInteger('status')->default('1')->nullable()->comment('0=ไม่ใช้งาน 1=ใช้งาน');
            $table->integer('created_by')->nullable()->comment('create by user');
            $table->integer('updated_by')->nullable()->comment('update by user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_debts');
    }
};
