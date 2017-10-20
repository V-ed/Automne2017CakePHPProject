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
		// Table name
		$expected = 'officers';
		$result = $this->Officers->table();
		$this->assertEquals($expected, $result);
		
		// Associations
		$expected = [
			'officerranks',
			'users',
			'evidenceitems'
		];
		$result = $this->Officers->associations()->keys();
		$this->assertEquals($expected, $result);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
		$data = [
			'email' => 'noij@jowe.bo',
			'officer_rank_id' => 1,
			'user_id' => 2
		];
		
		$officer = $this->Officers->newEntity($data);
		
		$this->assertEmpty($officer->errors());
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
		$data = [
			'email' => 'noij@jowe.bo',
			'officer_rank_id' => 234,
			'user_id' => 567
		];
		
		$badOfficer = $this->Officers->newEntity($data);
		
		$result = $this->Officers->checkRules($badOfficer);
        $this->assertFalse($result);

        $expected = [
			'email' => 'noij@jowe.bo',
            'officer_rank_id' => 234,
            'user_id' => 567
        ];

        $this->assertEquals($expected, $badOfficer->invalid());
    }
}
