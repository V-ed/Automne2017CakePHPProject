<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfficerRanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfficerRanksTable Test Case
 */
class OfficerRanksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OfficerRanksTable
     */
    public $OfficerRanks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.officer_ranks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OfficerRanks') ? [] : ['className' => OfficerRanksTable::class];
        $this->OfficerRanks = TableRegistry::get('OfficerRanks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OfficerRanks);

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
		$expected = 'officer_ranks';
		$result = $this->OfficerRanks->table();
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
			'rank_code' => 'sgt',
			'rank_name' => 'Sergant',
			'rank_description' => 'This is a standart sergant'
		];
		
		$officerRank = $this->OfficerRanks->newEntity($data);
		
		$this->assertEmpty($officerRank->errors());
    }
}
