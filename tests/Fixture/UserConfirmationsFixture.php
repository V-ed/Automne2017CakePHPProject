<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserConfirmationsFixture
 *
 */
class UserConfirmationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'uuid' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'is_confirmed' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'uuid' => 'Lorem ipsum dolor sit amet',
            'is_confirmed' => 1,
            'user_id' => 1
        ],
    ];
}
