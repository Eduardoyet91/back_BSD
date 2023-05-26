<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FichaFixture
 */
class FichaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ficha';
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
                'turno' => 'Lorem ipsum dolor sit amet',
                'entrada' => '23:06:34',
                'salida' => '23:06:34',
                'fecha' => '2023-05-15',
            ],
        ];
        parent::init();
    }
}
