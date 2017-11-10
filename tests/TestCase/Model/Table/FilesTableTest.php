<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilesTable Test Case
 */
class FilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilesTable
     */
    public $Files;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.files',
        'app.evidence_items',
        'app.officers',
        'app.officer_ranks',
        'app.users',
        'app.user_confirmations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Files') ? [] : ['className' => FilesTable::class];
        $this->Files = TableRegistry::get('Files', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Files);

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
		$expected = 'files';
		$result = $this->Files->table();
		$this->assertEquals($expected, $result);
		
		// Associations
		$expected = [
			'evidenceitems'
		];
		$result = $this->Files->associations()->keys();
		$this->assertEquals($expected, $result);
		
		// Timestamp Behavior
		$result = $this->Files->behaviors()->has('Timestamp');
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
			'name' => 'muurenod',
			'path' => 'test',
			'detail' => 'This is a test image',
			'evidence_item_id' => 2
		];
		
		$file = $this->Files->newEntity($data);
		
		$this->assertEmpty($file->errors());
    }
}
