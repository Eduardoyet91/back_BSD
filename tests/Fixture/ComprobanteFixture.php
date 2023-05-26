<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComprobanteFixture
 */
class ComprobanteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'comprobante';
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
                'orden_id' => 1,
                'fecha' => '2023-05-15 07:14:27',
                'status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
