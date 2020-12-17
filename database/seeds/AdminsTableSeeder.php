<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            ['id'=>1,'name'=>'admin', 'type'=>'admin', 'mobile'=>'097862765671', 'email' => 'admin@admin.com', 'password'=>'$2y$10$xwU5h35bTUfw6MK4yppxoeNmu/kdVCkt0HPnwseBvCr9IoVg/WsU6', 'image'=>'', 'status'=>1],
        ];
         
        DB::table('admins')->insert($adminRecords);
       /* foreach ($adminRecords as $key => $record) {
        	\App\Admin::create($record);
        }*/
    }
}
