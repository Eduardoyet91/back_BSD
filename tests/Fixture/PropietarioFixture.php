<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropietarioFixture
 */
class PropietarioFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'propietario';
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
                'persona_id' => 1,
                'edificio' => 'Lorem ',
                'apartamento' => 'Lorem ',
            ],
        ];
        parent::init();
    }
}
