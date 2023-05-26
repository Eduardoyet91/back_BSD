<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonaTable Test Case
 */
class PersonaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonaTable
     */
    protected $Persona;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Persona',
        'app.Propietarios',
        'app.Trabajadores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Persona') ? [] : ['className' => PersonaTable::class];
        $this->Persona = $this->getTableLocator()->get('Persona', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Persona);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PersonaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PersonaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
