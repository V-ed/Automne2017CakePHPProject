<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfficersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfficersTable Test Case
 */
class OfficersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OfficersTable
     */
    public $Officers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.officers',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Officers') ? [] : ['className' => OfficersTable::class];
        $this->Officers = TableRegistry::get('Officers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Officers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
		$data = [
			'email' => 'noij@jowe.bo',
			'officer_rank_id' => '1',
			'user_id' => '2'
		];
		
		$officer = $this->Officers->newEntity($data);
		
		$this->assertEmpty($officer->errors());
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
