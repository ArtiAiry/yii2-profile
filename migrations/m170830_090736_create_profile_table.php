<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 */
class m170830_090736_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
        public function up()
    {
        $this->createTable('profile', [
            'id' => 'pk',
            'user_id' => $this->integer()->notNull(),
            'skype' => $this->string(255)->notNull()->unique()->defaultValue(null),
            'phone' => $this->integer()->notNull()->defaultValue(null),
            'country' => $this->string(38)->notNull()->defaultValue(null),
            'city' => $this->string(178)->notNull()->defaultValue(null),
            'age' => $this->integer()->notNull()->defaultValue(null),
            'gender' => $this->char(7)->defaultValue(null),
//            'gender' => "ENUM('Мужской', 'Женский') NOT NULL",
            'dob' => $this->date()->defaultValue(null), //date of birth
        ]);

        $this->createIndex(
            'idx-profile-user_id',
            'profile',
            'user_id'
        );

        $this->addForeignKey(
            'fk-profile-user',
            'profile',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'

        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-profile-user',
            'profile'
        );

        $this->dropIndex(
            'idx-profile-user_id',
            'profile'
        );

        $this->dropTable('profile');
    }
}
