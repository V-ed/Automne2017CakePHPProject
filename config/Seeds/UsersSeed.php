<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'is_admin' => '1',
                'first_name' => 'Hacker',
                'last_name' => 'Man',
                'email' => 'zatovifasa@averdov.com',
                'username' => 'V-ed',
                'password' => '$2y$10$Jm375SURCwRBd5sM1iafK.N5fAjSdzALuwDiLfiBR4ME09G/PeD/6',
                'created' => '2017-09-30 01:23:50',
                'modified' => '2017-10-01 00:08:07',
            ],
            [
                'id' => '2',
                'is_admin' => '0',
                'first_name' => 'Regular',
                'last_name' => 'Dude',
                'email' => 'vut@woshoepu.fi',
                'username' => 'user',
                'password' => '$2y$10$CAgT/v11TgyxNx0QBF6krOqKmK8y31c3nH9SoIp5l/ISyyzLqt9eO',
                'created' => '2017-10-01 21:22:47',
                'modified' => '2017-10-01 21:24:00',
            ],
            [
                'id' => '3',
                'is_admin' => '0',
                'first_name' => 'John',
                'last_name' => 'McGregor',
                'email' => 'neguh@hekvum.ke',
                'username' => 'officer',
                'password' => '$2y$10$gg2kyIOeO7dbVekhqb7spOQAzPQKHDmqgLN23Tm9X9GdYJR2snKLi',
                'created' => '2017-10-03 20:48:23',
                'modified' => '2017-10-03 20:48:23',
            ],
            [
                'id' => '4',
                'is_admin' => '1',
                'first_name' => 'Ronald',
                'last_name' => 'Bonchemin',
                'email' => 'ru@zujolno.ag',
                'username' => 'admin',
                'password' => '$2y$10$G6pCoN8oGSWn92D/kccl/.H1sunuAHTMz8W79B9.sMmIMtKWgI/GO',
                'created' => '2017-10-03 20:52:17',
                'modified' => '2017-10-03 20:52:38',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
