<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'name' => 'hammer.jpg',
                'path' => 'files',
                'detail' => 'Hammer Image',
                'evidence_item_id' => '1',
                'created' => '2017-10-01 10:20:13',
                'modified' => '2017-10-03 21:08:55',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
