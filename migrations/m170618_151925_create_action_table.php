<?php

use yii\db\Migration;

class m170618_151925_create_action_table extends Migration
{
    public function up()
    {
        $tableOptions = ($this->db->driverName === 'mysql') ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB' : null;
        $this->createTable('hospital_action', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer()->notNull(),
            'doctor_id' => $this->integer()->notNull(),
            'action' => $this->text()->null(),
            'recipe' => $this->text()->null(),
            'date' => $this->string(22)->null(),
            'time' => $this->string(22)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK__hospital_action__patient_id', 'hospital_action', 'patient_id', 'hospital_patient', 'id');
        $this->addForeignKey('FK__hospital_action__doctor_id', 'hospital_action', 'doctor_id', 'hospital_doctor', 'id');
    }

    public function down()
    {
        $this->dropTable('hospital_action');
    } 
}
