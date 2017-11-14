<?php
use Migrations\AbstractSeed;

/**
 * OfficerRanks seed.
 */
class OfficerRanksSeed extends AbstractSeed
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
                'rank_code' => 'sgt',
                'rank_name' => 'Sergeant',
                'rank_description' => 'Sergeant of the US Police Department',
                'department_id' => '2',
            ],
            [
                'id' => '2',
                'rank_code' => 'of',
                'rank_name' => 'Officer',
                'rank_description' => 'The most basic rank available to officers.',
                'department_id' => '1',
            ],
        ];

        $table = $this->table('officer_ranks');
        $table->insert($data)->save();
    }
}
