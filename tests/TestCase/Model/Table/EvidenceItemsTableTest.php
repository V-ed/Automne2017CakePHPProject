<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvidenceItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvidenceItemsTable Test Case
 */
class EvidenceItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvidenceItemsTable
     */
    public $EvidenceItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evidence_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EvidenceItems') ? [] : ['className' => EvidenceItemsTable::class];
        $this->EvidenceItems = TableRegistry::get('EvidenceItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EvidenceItems);

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
