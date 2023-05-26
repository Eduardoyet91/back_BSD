<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ficha Entity
 *
 * @property int $id
 * @property int $trabajador_id
 * @property string $turno
 * @property \Cake\I18n\Time|null $entrada
 * @property \Cake\I18n\Time|null $salida
 * @property \Cake\I18n\FrozenDate $fecha
 *
 * @property \App\Model\Entity\Trabajadore $trabajadore
 */
class Ficha extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'trabajador_id' => true,
        'turno' => true,
        'entrada' => true,
        'salida' => true,
        'fecha' => true,
        'trabajadore' => true,
    ];
}
