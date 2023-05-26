<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComprobanteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComprobanteTable Test Case
 */
class ComprobanteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComprobanteTable
     */
    protected $Comprobante;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Comprobante',
        'app.Orden',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Comprobante') ? [] : ['className' => ComprobanteTable::class];
        $this->Comprobante = $this->getTableLocator()->get('Comprobante', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Comprobante);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ComprobanteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ComprobanteTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
