<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Kevin',
                'email' => 'kevinbastianperez@gmail.com',
                'password' => '$2y$10$toUrAdDPCY.xKQ.C8MbD3OYTpxAyXn0tsAT1ejt2UmlN/YC4PdRDq',
                'remember_token' => 'CGxCpbr3RIeSGpPrR6QlMN2sXd0Qep5fJK5jrLROA2GXfBOuBOw0gTUhP4yH',
                'created_at' => '2016-07-31 22:12:47',
                'updated_at' => '2016-08-12 22:03:34',
                'bodega_id' => 3,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'F2 owner',
                'email' => 'f2owner@example.com',
                'password' => '$2y$10$t249U5EcbsypDkCuo1rG4OUlYvHjizdC9KgNzm3SlJpQUzi2pqnd.',
                'remember_token' => 'uamfbJkNb0k3BcIbWpxG4rPRF1vi5oVE4i7R4EVhFormnnq7uXs7ZACmCJmO',
                'created_at' => '2016-08-08 19:32:46',
                'updated_at' => '2016-08-09 03:19:57',
                'bodega_id' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Bodeguero',
                'email' => 'bodeguero@example.com',
                'password' => '$2y$10$LdbcgVtHKpF8GxrRKg3yo.bo753F3EhVdZcXhg88dVC87FjIc5Dlu',
                'remember_token' => 'xNZDlQkywvoJ1u0eU8AXoklWBrrDzyrB0MphGwYunFEdmI8uMQnGxxWXG2oD',
                'created_at' => '2016-08-08 19:33:37',
                'updated_at' => '2016-08-12 18:23:45',
                'bodega_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Best Admin',
                'email' => 'admin1@example.com',
                'password' => '$2y$10$eBDKgOHPdNjiZc4hQgEUv.1etevsUw6zX38QlRj.CvHgimPuSU.0u',
                'remember_token' => 'zhfc4asahCWxFnA6QerNLfpVTSVCK2jb30Fp58gDtSZ0o43Irwl9DV7EpCTO',
                'created_at' => '2016-08-08 19:34:10',
                'updated_at' => '2016-08-09 00:28:44',
                'bodega_id' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Vendedor num one',
                'email' => 'vendedor1@example.com',
                'password' => '$2y$10$zbY9Enq68aa5Tk2Wr8Dt5uuxsX7M1U7XbNfbEL4WL.kiJ3oNypxiy',
                'remember_token' => 'P1ohVJ3rx3hRWv1kmCKH00VJ5SO5bfZUwqpGqTyMamjihwuyb0RpoYtpYWfO',
                'created_at' => '2016-08-08 19:34:39',
                'updated_at' => '2016-08-12 18:39:55',
                'bodega_id' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'El de Garantías',
                'email' => 'garantias@example.com',
                'password' => '$2y$10$g2m92wBVo8HDqmDFyDcRMeV/IzuITvjPaVPyxVwpRao5nkDMao5ZK',
                'remember_token' => NULL,
                'created_at' => '2016-08-08 19:43:35',
                'updated_at' => '2016-08-08 19:43:35',
                'bodega_id' => 0,
            ),
        ));
        
        
    }
}
