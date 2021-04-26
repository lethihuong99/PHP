<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return voidProductController
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $data=[
            'username'=>'admin',
            'password'=>'admin',
            'email'=>'huongmango99@gmail.com',
            'phone'=>'0975679510',
            'fullname'=>'lethihuong',
            'address'=>'hoanghoa',
            'birthday'=>'1999/6/20',
            'role'=>1,
            'status'=>1,
        ];
        $data1=[
            'name'=>'admin',
            'password'=>'admin',
            'email'=>'huongmango99@gmail.com',
            'phone'=>'0975679510',
            'fullname'=>'lethihuong',
            'address'=>'hoanghoa',
            'birthday'=>'1999/6/20',
            'role'=>1,
            'status'=>1,
        ];
        DB::table('admins')->insert($data);
    }
}
