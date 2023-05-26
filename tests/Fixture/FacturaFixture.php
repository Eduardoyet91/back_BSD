<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacturaFixture
 */
class FacturaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'factura';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'propietario_id' => 1,
                'fecha' => '2023-05-15 23:06:46',
                'monto' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
