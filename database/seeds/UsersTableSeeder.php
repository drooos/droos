<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    private $actor = ["admin","teacher","assistant","parent","student"];
    public function run()
    {
        
        
            DB::table('users')->insert([
                'userFname' => Str::random(10),
                'userLname' => Str::random(10),
                'userNumber' => "011111111",
                'gender' => 0,
                'userRule'=> $this->actor[rand(0,4)],
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('123456789'),
            ]);
        
        
    }
}
