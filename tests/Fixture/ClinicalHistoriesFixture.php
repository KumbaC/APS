<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClinicalHistoriesFixture
 */
class ClinicalHistoriesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => 'Identificador de la tabla', 'precision' => null, 'unsigned' => null],
        'person_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla persons', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'beneficiary_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla beneficiary', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'blood_type_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla blood groups', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'diagnosis_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla diagnoses', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'habit_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla habit', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'medical_antecedent_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla medicals_antecedents', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'doctor_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relacion con la tabla doctors', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'clinical_histories_beneficiary_fk' => ['type' => 'foreign', 'columns' => ['beneficiary_id'], 'references' => ['beneficiary', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_blood_types_fk' => ['type' => 'foreign', 'columns' => ['blood_type_id'], 'references' => ['blood_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_doctor_fk' => ['type' => 'foreign', 'columns' => ['doctor_id'], 'references' => ['doctors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_habits_fk' => ['type' => 'foreign', 'columns' => ['habit_id'], 'references' => ['habits', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_medicals_antecedents_fk' => ['type' => 'foreign', 'columns' => ['medical_antecedent_id'], 'references' => ['medicals_antecedents', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_person_fk' => ['type' => 'foreign', 'columns' => ['person_id'], 'references' => ['persons', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // phpcs:enable
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
                'person_id' => 1,
                'beneficiary_id' => 1,
                'blood_type_id' => 1,
                'diagnosis_id' => 1,
                'habit_id' => 1,
                'medical_antecedent_id' => 1,
                'doctor_id' => 1,
            ],
        ];
        parent::init();
    }
}
