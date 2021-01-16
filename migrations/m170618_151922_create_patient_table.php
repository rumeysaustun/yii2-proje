<?php

use yii\db\Migration;

class m170618_151922_create_patient_table extends Migration
{
    public function up()
    {
        $tableOptions = ($this->db->driverName === 'mysql') ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB' : null;
        $this->createTable('hospital_patient', [
            'id' => $this->primaryKey(),
            'name' => $this->string(55)->notNull(),
            'family' => $this->string(55)->notNull(),
            'email' => $this->string(55)->null(),
            'phone' => $this->string(55)->null(),
            'date' => $this->string(22)->null(),
            'time' => $this->string(22)->null(),
            'status' => $this->integer(2)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('hospital_patient');
    } 
}
