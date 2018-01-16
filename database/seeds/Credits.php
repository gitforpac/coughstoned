<?php

use Illuminate\Database\Seeder;

class Credits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('fname'=>'Jerwin' , 'lname'=>'Espina' , 'cardnumber'=>'4900000000000086', 'expiration'=> '12/18','cvv' => '521','balance'=>12200),
            array('fname'=>'John' , 'lname'=>'Doh' ,'cardnumber'=>'5404000000000001', 'expiration'=> '12/18','cvv' => '245','balance'=>1634500),
            array('fname'=>'Cesar' , 'lname'=>'Guizo' ,'cardnumber'=>'1200000000000034', 'expiration'=> '12/18','cvv' => '036','balance'=>692500),
            array('fname'=>'Bell' , 'lname'=>'Gitz' ,'cardnumber'=>'5600000000000078', 'expiration'=> '12/20','cvv' => '911','balance'=>21634500),
        );


         DB::table('creditcardz')->insert($data);
    }
}
