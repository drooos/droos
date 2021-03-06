<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        $faker = Faker::create('App\users');

        $lastId = DB::table('users')->insertGetId([
            'userFname' => 'admin',
            'userLname' => 'admin',
            'userNumber' => "011111111",
            'gender' => 0,
            'secQues'=>1,
            'secAns'=> "lol",
            'userRule'=> "admin",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        
        $i = 100;
        while($i--){
            $actor = $this->actor[rand(0,4)];
            $lastId = DB::table('users')->insertGetId([
                'userFname' => $faker->name(),
                'userLname' => $faker->name(),
                'userNumber' => $faker->phoneNumber(),
                'gender' => 0,
                'secQues'=>1,
                'secAns'=> "lol",
                'userRule'=> $actor,
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('123456789'),
            ]);
            switch($actor){
                case "teacher":
                    DB::table('teachers')->insert([
                        'teacherId' => $lastId,
                        'teacherRate'=>0.0,
                        'teacherDetails'=>$faker->sentence($nbWords = 6, $variableNbWords = true)
                    ]);
                break;

                case "parent":
                    DB::table('parents')->insert([
                        'parentId' => $lastId,
                        'linkCode'=>Str::random(10),
                        
                    ]);
                break;

                case "student":
                    DB::table('students')->insert([
                        'studentId' => $lastId,
                        'linkCode'=>Str::random(10),
                    ]);
                break;
            }
            
        }
        
    }
}
