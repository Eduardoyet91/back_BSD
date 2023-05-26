<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int|null $id
 * @property int $cedula
 * @property string $nombre
 * @property string|null $apellido
 * @property int|null $rif
 * @property int|null $telefono
 *
 * @property \App\Model\Entity\Propietario[] $propietarios
 * @property \App\Model\Entity\Trabajadore[] $trabajadores
 */
class Persona extends Entity
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
        'id' => true,
        'cedula' => true,
        'nombre' => true,
        'apellido' => true,
        'rif' => true,
        'telefono' => true,
        'propietarios' => true,
        'trabajadores' => true,
    ];
}
