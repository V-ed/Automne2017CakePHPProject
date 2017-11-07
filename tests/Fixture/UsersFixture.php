<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'is_admin' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null],
        'first_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'last_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'username' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'password' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'email' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
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
            'is_admin' => true,
            'first_name' => 'AdminFirst',
            'last_name' => 'AdminLast',
            'username' => 'admin',
            'password' => 'admin',
            'created' => '2017-10-13 13:57:45',
            'modified' => '2017-10-13 13:57:45',
            'email' => 'zonjog@gum.gov'
        ],
		[
            'id' => 2,
            'is_admin' => false,
            'first_name' => 'userFirst',
            'last_name' => 'userLast',
            'username' => 'user',
            'password' => 'user',
            'created' => '2017-10-14 13:57:45',
            'modified' => '2017-10-14 13:57:45',
            'email' => 'zonjog@gum.gov'
        ],
        [
            'id' => 666,
            'is_admin' => false,
            'first_name' => 'Delete',
            'last_name' => 'Me Please',
            'username' => 'goodbye',
            'password' => 'IloveLASAGNA',
            'created' => '2017-10-15 13:57:45',
            'modified' => '2017-10-15 13:57:45',
            'email' => 'zonjog@gum.gov'
        ],
    ];
}
