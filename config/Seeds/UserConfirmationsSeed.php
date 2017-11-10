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
                'user_id' => '1',
            ],
            [
                'id' => '2',
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
                'user_id' => '2',
            ],
            [
                'id' => '3',
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
                'user_id' => '3',
            ],
            [
                'id' => '4',
                'uuid' => '485fc381-e790-47a3-9794-1337c0a8fe68',
                'is_confirmed' => '0',
                'user_id' => '4',
            ],
            [
                'id' => '24',
                'uuid' => '02df2b90-9dec-4465-a912-3e913f4a90a8',
                'is_confirmed' => '1',
                'user_id' => '24',
            ],
            [
                'id' => '25',
                'uuid' => '59cf2a5c-218a-4469-a3d0-d20088500efe',
                'is_confirmed' => '0',
                'user_id' => '25',
            ],
        ];

        $table = $this->table('user_confirmations');
        $table->insert($data)->save();
    }
}
