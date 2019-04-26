<?php

use Illuminate\Database\Seeder;

class usersTable extends Seeder
{
    private $actor = ["admin","teacher","assistant","parent","student"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 100;
        while($i--){
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
}
