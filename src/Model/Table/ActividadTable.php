<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actividad Model
 *
 * @property \App\Model\Table\TrabajadoresTable&\Cake\ORM\Association\BelongsTo $Trabajadores
 *
 * @method \App\Model\Entity\Actividad newEmptyEntity()
 * @method \App\Model\Entity\Actividad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Actividad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actividad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actividad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Actividad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actividad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actividad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ActividadTable extends Table
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

        $this->setTable('actividad');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Trabajadores', [
            'foreignKey' => 'trabajador_id',
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
            ->integer('trabajador_id')
            ->notEmptyString('trabajador_id');

        $validator
            ->scalar('nombre_act')
            ->maxLength('nombre_act', 36)
            ->requirePresence('nombre_act', 'create')
            ->notEmptyString('nombre_act');

        $validator
            ->dateTime('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDateTime('fecha');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 190)
            ->allowEmptyString('descripcion');

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
        $rules->add($rules->existsIn('trabajador_id', 'Trabajadores'), ['errorField' => 'trabajador_id']);

        return $rules;
    }
}
