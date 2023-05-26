<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdenFixture
 */
class OrdenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'orden';
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
                'tipo' => 'Lorem ipsum dolor sit amet',
                'banco' => 'Lorem ipsum dolor sit amet',
                'destino' => 1,
                'titular' => 'Lorem ipsum dolor sit amet',
                'monto' => 1,
                'fecha' => '2023-05-17 22:37:19',
                'status' => 'Lorem ipsum dolor sit amet',
                'servicio' => 'Lorem ipsum dolor sit amet',
                'insumo_id' => 1,
                'trabajador_id' => 1,
            ],
        ];
        parent::init();
    }
}
