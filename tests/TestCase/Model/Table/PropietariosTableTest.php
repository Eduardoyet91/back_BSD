<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropietariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropietariosTable Test Case
 */
class PropietariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PropietariosTable
     */
    protected $Propietarios;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Propietarios',
        'app.Persona',
        'app.Factura',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Propietarios') ? [] : ['className' => PropietariosTable::class];
        $this->Propietarios = $this->getTableLocator()->get('Propietarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Propietarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PropietariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PropietariosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
