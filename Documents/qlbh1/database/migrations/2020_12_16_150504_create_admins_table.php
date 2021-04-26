<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            //kieu varchar(60)
            //mac dinh khong null- khong trung nhau
            $table->string('username',60)->unique();
            $table->string('password', 60);
            $table->string('email',60)->unique();
            $table->string('phone',10);
            $table->string('fullname',100);
            $table->string('address',200);
            $table->date('birthday');
            $table->string('avatar', 200)->nullable();// nullable là ko cần nhập duoc phép null 
            $table->tinyInteger('role')->default(1);// mac dinh default = 1
            $table->tinyInteger('status')->default(1);// mac dinh default =1 
            $table->dateTime('last_login')->nullable();
            //$table->dateTime('created_at')->nullable();
            //$table->dateTime('updated_at')->nullable();
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
        Schema::dropIfExists('admins');
    }
}

