<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160922_150519_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id'           => $this->primaryKey(),
            'name'         => $this->string(256)->null(),
            'mail_address' => $this->string(256)->null(),
            'password'     => $this->string(256)->null(),
            'status'       => $this->string(35)->notNull()->defaultValue('new'),
            'created_at'   => $this->integer()->null(),
            'updated_at'   => $this->integer()->null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}