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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_code', 255)->nullable()->comment('รหัสลูกค้า');
            $table->date('sent_date_cm')->nullable()->comment('วันที่ส่ง CM');
            $table->string('sale_code', 255)->nullable()->comment('รหัสเซลล์');
            $table->string('sale_name', 255)->nullable()->comment('ชื่อเซลล์');
            $table->string('team_code', 255)->nullable()->comment('รหัสทีม');
            $table->string('team_name', 255)->nullable()->comment('ชื่อทีม');
            $table->string('customer_group', 255)->nullable()->comment('กลุ่มลูกค้า');
            $table->string('customer_contact', 255)->nullable()->comment('ช่องทาง');
            $table->string('gender', 255)->nullable()->comment('เพศ');
            $table->string('prefix', 255)->nullable()->comment('คำนำหน้า');
            $table->string('customer_firstname', 255)->nullable()->comment('ชื่อลูกค้า');
            $table->string('customer_lastname', 255)->nullable()->comment('นามสกุลลูกค้า');
            $table->string('customer_nickname', 255)->nullable()->comment('ชื่อเล่นลูกค้า');
            $table->string('customer_phone_number', 255)->nullable()->comment('เบอร์โทรลูกค้า');
            $table->string('customer_firstname_en', 255)->nullable()->comment('ชื่อลูกค้า (ENG)');
            $table->string('customer_lastname_en', 255)->nullable()->comment('นามสกุลลูกค้า (ENG)');
            $table->date('birthday')->nullable()->comment('วันเกิด');
            $table->string('case_age', 255)->nullable()->comment('อายุทำเคส');
            $table->string('current_age', 255)->nullable()->comment('อายุปัจจุบัน');
            $table->string('id_card', 255)->nullable()->comment('เลขบัตรประชาชน');
            $table->date('issue_date')->nullable()->comment('วันที่ออกบัตร');
            $table->date('expiration_date')->nullable()->comment('วันที่หมดอายุ');
            $table->string('housing_type', 255)->nullable()->comment('ประเภทที่อยู่อาศัย');
            $table->string('residence_year', 255)->nullable()->comment('อยู่อาศัย (ปี)');
            $table->string('current_address')->nullable()->comment('ที่อยู่ปัจจุบัน');
            $table->string('email', 255)->nullable()->comment('E-Mail');
            $table->tinyInteger('vital_status')->nullable()->comment('สถานภาพ 0=โสด 1=สมรสจดทะเบียน 2=สมรสไม่จดทะเบียน 3=หย่า 4=หม้าย 5=แยกกันอยู่');
            $table->integer('number_of_children')->nullable()->comment('จำนวนบุตร');
            $table->string('educational', 255)->nullable()->comment('วุฒิการศึกษา');
            $table->string('faculty', 255)->nullable()->comment('คณะที่จบ');
            $table->string('branch', 255)->nullable()->comment('สาขา');
            $table->string('company_name', 255)->nullable()->comment('ชื่อบริษัทที่ทำงาน');
            $table->string('company_address', 255)->nullable()->comment('ที่อยู่บริษัทที่ทำงาน');
            $table->string('registered_capital', 255)->nullable()->comment('ทุนจดทะเบียน');
            $table->string('work_phone_number', 255)->nullable()->comment('เบอร์โทรที่ทำงาน');
            $table->string('number_of_employees', 255)->nullable()->comment('จำนวนพนักงาน');
            $table->float('salary', 10, 2)->nullable()->comment('เงินเดือน');
            $table->string('bank_name', 255)->nullable()->comment('Payroll');
            $table->string('home_lone', 255)->nullable()->comment('สวัสดิการกู้ซื้อบ้าน');
            $table->string('position', 255)->nullable()->comment('ตำแหน่ง');
            $table->string('department', 255)->nullable()->comment('แผนก');
            $table->string('year_of_service', 255)->nullable()->comment('อายุงาน');
            $table->string('business_type', 255)->nullable()->comment('ประเภทธุรกิจเกี่ยวกับอะไร');
            $table->string('document_delivery', 255)->nullable()->comment('เอกสารจัดส่งที่ไหน');
            $table->string('original_work_name', 255)->nullable()->comment('ชื่อบริษัทที่ทำงานเดิม');
            $table->string('original_work_phone', 255)->nullable()->comment('เบอร์โทรที่ทำงานเดิม');
            $table->string('original_position', 255)->nullable()->comment('ตำแหน่งเดิม');
            $table->string('previous_employment_period', 255)->nullable()->comment('อายุงานเดิม');
            $table->string('spouse_firstname', 255)->nullable()->comment('ชื่อ (คู่สมรส)');
            $table->string('spouse_lastname', 255)->nullable()->comment('สกุล (คู่สมรส)');
            $table->string('spouse_phone_number', 255)->nullable()->comment('เบอร์โทร (คู่สมรส)');
            $table->string('spouse_current_address', 255)->nullable()->comment('ที่อยู่ปัจจุบัน (คู่สมรส)');
            $table->string('spose_work_address', 255)->nullable()->comment('ที่อยู่ที่ทำงาน (คู่สมรส)');
            $table->string('spose_work_phone_number', 255)->nullable()->comment('เบอร์โทรที่ทำงาน (คู่สมรส)');
            $table->string('spose_id_card', 255)->nullable()->comment('เลขบัตรประชาชน (คู่สมรส)');
            $table->string('reference_person1_firstname', 255)->nullable()->comment('ชื่อ (บุคคลอ้างอิง 1.)');
            $table->string('reference_person1_lastname', 255)->nullable()->comment('นามสกุล (บุคคลอ้างอิง 1.)');
            $table->string('reference_person1_relationship', 255)->nullable()->comment('ความสัมพันธ์ (บุคคลอ้างอิง 1.)');
            $table->string('reference_person1_phone_number', 255)->nullable()->comment('เบอร์โทร (บุคคลอ้างอิง 1.)');
            $table->string('reference_person1_address', 255)->nullable()->comment('ที่อยู่ (บุคคลอ้างอิง 1.)');
            $table->string('reference_person2_firstname', 255)->nullable()->comment('ชื่อ (บุคคลอ้างอิง 2.)');
            $table->string('reference_person2_lastname', 255)->nullable()->comment('นามสกุล (บุคคลอ้างอิง 2.)');
            $table->string('reference_person2_relationship', 255)->nullable()->comment('ความสัมพันธ์ (บุคคลอ้างอิง 2.)');
            $table->string('reference_person2_phone_number', 255)->nullable()->comment('เบอร์โทร (บุคคลอ้างอิง 2.)');
            $table->string('reference_person2_address', 255)->nullable()->comment('ที่อยู่ (บุคคลอ้างอิง 2.)');
            $table->string('special_installment_rate_month', 255)->nullable()->comment('อัตราการผ่อนพิเศษ/เดือน');
            $table->text('note_special_installment')->nullable()->comment('หมายเหตุ (อัตราการผ่อนพิเศษ/เดือน)');
            $table->string('case_administrator', 255)->nullable()->comment('ผู้ดูแลเคส');
            $table->tinyInteger('customer_grade')->nullable()->comment('เกรดลูกค้า 1=A 2=B 3=C 4=D');
            $table->string('case_analyst', 255)->nullable()->comment('ผู้วิเคราะห์เคส');
            $table->string('approval_result_status', 255)->nullable()->comment('สถานะผลการอนุมัติ');
            $table->string('reason_reject', 255)->nullable()->comment('เหตุผลReject');
            $table->date('result_status_update_date')->nullable()->comment('วันที่อัปเดตสถานะผล');
            $table->text('note_customer_case')->nullable()->comment('หมายเหตุ (เคสลูกค้า)');
            $table->tinyInteger('data_status')->nullable()->comment('สถานข้อมูล 0=Inactive 1=Active ');
            $table->tinyInteger('status')->default('1')->nullable()->comment('0=ไม่ใช้งาน 1=ใช้งาน ');
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
        Schema::dropIfExists('customers');
    }
};
