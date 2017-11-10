<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserConfirmationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserConfirmationsTable Test Case
 */
class UserConfirmationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserConfirmationsTable
     */
    public $UserConfirmations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_confirmations',
        'app.users',
        'app.evidence_items',
        'app.officers',
        'app.officer_ranks',
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
        $config = TableRegistry::exists('UserConfirmations') ? [] : ['className' => UserConfirmationsTable::class];
        $this->UserConfirmations = TableRegistry::get('UserConfirmations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserConfirmations);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test newConfirmation method
     *
     * @return void
     */
    public function testNewConfirmation()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
