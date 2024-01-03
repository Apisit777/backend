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
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_code')->nullable()->comment('รหัสพนักงาน');
            $table->string('user_name')->nullable()->comment('ชื่อพนักงาน');
            $table->string('nickname')->nullable()->comment('ชื่อเล่นพนักงาน');
            $table->string('e_mail')->unique()->nullable()->comment('อีเมล');
            $table->string('phone')->nullable()->comment('เบอร์โทร');
            $table->string('position')->nullable()->comment('ตำแหน่ง');
            $table->string('team')->nullable()->comment('ชื่อทีม');
            $table->string('e_mail_team')->nullable()->comment('อีเมลทีม');
            $table->string('e_mail_group')->nullable()->comment('อีเมลกลุ่ม');
            $table->string('gmail')->nullable()->unique()->comment('จีเมล');
            $table->string('anydesk')->nullable()->comment('รหัสแอนนี่เดส');
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
        Schema::dropIfExists('tests');
    }
};
