<?php
use Migrations\AbstractSeed;

/**
 * UserConfirmations seed.
 */
class UserConfirmationsSeed extends AbstractSeed
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
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
            ],
            [
                'id' => '2',
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
            ],
            [
                'id' => '3',
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
            ],
            [
                'id' => '4',
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
            ],
        ];

        $table = $this->table('user_confirmations');
        $table->insert($data)->save();
    }
}
