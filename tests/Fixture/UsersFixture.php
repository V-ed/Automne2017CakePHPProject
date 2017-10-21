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
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'isAdmin' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '0 : FALSE | 1 : TRUE', 'precision' => null],
        'firstName' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastName' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'username' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
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
            'isAdmin' => true,
            'firstName' => 'AdminFirst',
            'lastName' => 'AdminLast',
            'username' => 'admin',
            'password' => 'admin',
            'created' => '2017-10-13 13:57:45',
            'modified' => '2017-10-13 13:57:45'
        ],
		[
            'id' => 2,
            'isAdmin' => false,
            'firstName' => 'userFirst',
            'lastName' => 'userLast',
            'username' => 'user',
            'password' => 'user',
            'created' => '2017-10-14 13:57:45',
            'modified' => '2017-10-14 13:57:45'
        ],
        [
            'id' => 666,
            'isAdmin' => false,
            'firstName' => 'Delete',
            'lastName' => 'Me Please',
            'username' => 'goodbye',
            'password' => 'IloveLASAGNA',
            'created' => '2017-10-15 13:57:45',
            'modified' => '2017-10-15 13:57:45'
        ],
    ];
}
