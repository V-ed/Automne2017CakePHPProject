<?php
use Migrations\AbstractSeed;

/**
 * EvidenceItems seed.
 */
class EvidenceItemsSeed extends AbstractSeed
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
                'description' => 'Hammer',
                'origin' => 'Tool',
                'is_sealed' => '1',
                'is_deleted' => '0',
                'officer_id' => '1',
                'user_id' => '1',
                'created' => '2017-10-01 09:52:44',
                'modified' => '2017-10-03 03:01:03',
            ],
        ];

        $table = $this->table('evidence_items');
        $table->insert($data)->save();
    }
}
