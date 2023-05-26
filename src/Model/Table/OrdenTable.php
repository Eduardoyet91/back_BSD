<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orden Model
 *
 * @property \App\Model\Table\InsumoTable&\Cake\ORM\Association\BelongsTo $Insumo
 * @property \App\Model\Table\TrabajadoresTable&\Cake\ORM\Association\BelongsTo $Trabajadores
 *
 * @method \App\Model\Entity\Orden newEmptyEntity()
 * @method \App\Model\Entity\Orden newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Orden[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orden get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orden findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Orden patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orden[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orden|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orden saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrdenTable extends Table
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

        $this->setTable('orden');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Insumo', [
            'foreignKey' => 'insumo_id',
        ]);
        $this->belongsTo('Trabajadores', [
            'foreignKey' => 'trabajador_id',
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
            ->scalar('tipo')
            ->allowEmptyString('tipo');

        $validator
            ->scalar('banco')
            ->maxLength('banco', 36)
            ->requirePresence('banco', 'create')
            ->notEmptyString('banco');

        $validator
            ->requirePresence('destino', 'create')
            ->notEmptyString('destino');

        $validator
            ->scalar('titular')
            ->maxLength('titular', 36)
            ->requirePresence('titular', 'create')
            ->notEmptyString('titular');

        $validator
            ->integer('monto')
            ->requirePresence('monto', 'create')
            ->notEmptyString('monto');

        $validator
            ->dateTime('fecha')
            ->allowEmptyDateTime('fecha');

        $validator
            ->scalar('status')
            ->maxLength('status', 36)
            ->allowEmptyString('status');

        $validator
            ->scalar('servicio')
            ->allowEmptyString('servicio');

        $validator
            ->integer('insumo_id')
            ->allowEmptyString('insumo_id');

        $validator
            ->integer('trabajador_id')
            ->allowEmptyString('trabajador_id');

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
        $rules->add($rules->existsIn('insumo_id', 'Insumo'), ['errorField' => 'insumo_id']);
        $rules->add($rules->existsIn('trabajador_id', 'Trabajadores'), ['errorField' => 'trabajador_id']);

        return $rules;
    }
}
