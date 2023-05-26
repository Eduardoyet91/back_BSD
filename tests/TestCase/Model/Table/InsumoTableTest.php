<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsumoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsumoTable Test Case
 */
class InsumoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InsumoTable
     */
    protected $Insumo;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Insumo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Insumo') ? [] : ['className' => InsumoTable::class];
        $this->Insumo = $this->getTableLocator()->get('Insumo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Insumo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InsumoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
