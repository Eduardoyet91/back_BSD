<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadFixture
 */
class ActividadFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'actividad';
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
                'trabajador_id' => 1,
                'nombre_act' => 'Lorem ipsum dolor sit amet',
                'fecha' => '2023-05-15 23:06:22',
                'descripcion' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
