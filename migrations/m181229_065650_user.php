<?php

use yii\db\Migration;

/**
 * Class m181229_065650_user
 */
class m181229_065650_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB COMMENT="菜单表"';
        }
        $this->createTable('ws_user', [
            'userId' => $this->primaryKey(),
            'mobile' => $this->integer(11)->notNull(),
            'password' => $this->string(64)->notNull(),
            'username' => $this->string(255)->notNull(),
            'nickname' => $this->string(255)->notNull(),
            'desc' => $this->string(255)->defaultValue(''),
            'remark' => $this->string(255)->defaultValue(''),
            'salt' => $this->string(64)->defaultValue(''),
            'isDelete' => $this->smallInteger(2)->defaultValue(0),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181229_065650_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181229_065650_user cannot be reverted.\n";

        return false;
    }
    */
}
