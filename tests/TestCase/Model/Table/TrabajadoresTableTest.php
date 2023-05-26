<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrabajadoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrabajadoresTable Test Case
 */
class TrabajadoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrabajadoresTable
     */
    protected $Trabajadores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Trabajadores',
        'app.Actividad',
        'app.Persona',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Trabajadores') ? [] : ['className' => TrabajadoresTable::class];
        $this->Trabajadores = $this->getTableLocator()->get('Trabajadores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Trabajadores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrabajadoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TrabajadoresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
