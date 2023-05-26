<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrabajadoresFixture
 */
class TrabajadoresFixture extends TestFixture
{
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
                'nom_banc' => 'Lorem ',
                'num_cuen' => 'Lorem ',
                'departamento' => 'Lorem ',
            ],
        ];
        parent::init();
    }
}
