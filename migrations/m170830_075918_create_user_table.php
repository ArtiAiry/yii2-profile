<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170830_075918_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => 'pk',
            'username'=>$this->string(),
            'email'=>$this->string()->defaultValue(null)->unique(),
            'password'=>$this->string(),
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
