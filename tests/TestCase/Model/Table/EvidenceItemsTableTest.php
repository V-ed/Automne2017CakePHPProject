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
        'app.evidence_items',
        'app.officers',
        'app.officer_ranks',
        'app.users',
        'app.files'
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
		// Table name
		$expected = 'evidence_items';
		$result = $this->EvidenceItems->table();
		$this->assertEquals($expected, $result);
		
		// Associations
		$expected = [
			'officers',
			'users',
			'files'
		];
		$result = $this->EvidenceItems->associations()->keys();
		$this->assertEquals($expected, $result);
		
		// Timestamp Behavior
		$result = $this->EvidenceItems->behaviors()->has('Timestamp');
		$this->assertTrue($result);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
		$data = [
			'description' => 'Ifu',
			'origin' => 'TestOrigin',
			'is_sealed' => 1,
			'officer_id' => 1,
			'user_id' => 3
		];
		
		$evidenceItem = $this->EvidenceItems->newEntity($data);
		
		$this->assertEmpty($evidenceItem->errors());
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
		$data = [
			'description' => 'Ifu',
			'origin' => 'TestOrigin',
			'is_sealed' => 1,
			'officer_id' => 234,
			'user_id' => 567
		];
		
		$badEvidenceItem = $this->EvidenceItems->newEntity($data);
		
		$result = $this->EvidenceItems->checkRules($badEvidenceItem);
        $this->assertFalse($result);

        $expected = [
            'officer_id' => 234,
            'user_id' => 567
        ];

        $this->assertEquals($expected, $badEvidenceItem->invalid());
    }
}
