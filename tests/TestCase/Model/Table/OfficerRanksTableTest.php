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
        $this->markTestIncomplete('Not implemented yet.');
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
}
