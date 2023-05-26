<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comprobante Model
 *
 * @property \App\Model\Table\OrdenTable&\Cake\ORM\Association\BelongsTo $Orden
 *
 * @method \App\Model\Entity\Comprobante newEmptyEntity()
 * @method \App\Model\Entity\Comprobante newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comprobante findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Comprobante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comprobante saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comprobante[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comprobante[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comprobante[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comprobante[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ComprobanteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('comprobante');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Orden', [
            'foreignKey' => 'orden_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('orden_id')
            ->notEmptyString('orden_id');

        $validator
            ->dateTime('fecha')
            ->allowEmptyDateTime('fecha');

        $validator
            ->scalar('status')
            ->maxLength('status', 36)
            ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('orden_id', 'Orden'), ['errorField' => 'orden_id']);

        return $rules;
    }
}
