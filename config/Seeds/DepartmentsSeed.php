<?php
use Migrations\AbstractSeed;

/**
 * Departments seed.
 */
class DepartmentsSeed extends AbstractSeed
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
                'name' => 'Ground',
                'description' => NULL,
            ],
            [
                'id' => '2',
                'name' => 'Directives',
                'description' => NULL,
            ],
        ];

        $table = $this->table('departments');
        $table->insert($data)->save();
    }
}
