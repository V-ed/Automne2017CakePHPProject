<?php
use Migrations\AbstractSeed;

/**
 * Officers seed.
 */
class OfficersSeed extends AbstractSeed
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
                'email' => 'guillaumemarcoux@gmail.com',
                'officer_rank_id' => '1',
                'user_id' => '1',
            ],
            [
                'id' => '2',
                'email' => 'officer@gmail.com',
                'officer_rank_id' => '2',
                'user_id' => '3',
            ],
        ];

        $table = $this->table('officers');
        $table->insert($data)->save();
    }
}
