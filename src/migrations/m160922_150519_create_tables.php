<?php

use yii\db\Migration;

class m160922_150519_create_tables extends Migration
{
    const CREATE_TABLE_OPTIONS = 'CHARACTER SET=utf8 COLLATE=utf8_general_ci ENGINE=InnoDB';

    public function up()
    {
        $this->createUser();
        $this->createUserAuth();
        $this->createNoteBook();
        $this->createNote();

        $this->insertUser();
    }

    private function createUser()
    {
        $this->createTable('user', [
            'id'            => $this->primaryKey(),
            'user_token'    => $this->string(256)->null()->comment('ユーザ識別文字列'),
            'screen_name'   => $this->string(24)->null()->comment('スクリーン名'),
            'name'          => $this->string(256)->null()->comment('名前'),
            'email'         => $this->string(256)->null()->comment('メールアドレス'),
            'status'        => $this->string(16)->notNull()->defaultValue('active')->comment('ステータス'),
            'role'          => $this->string(16)->notNull()->defaultValue('member')->comment('権限'),
            'created_at'    => $this->integer()->null(),
            'updated_at'    => $this->integer()->null(),
        ], self::CREATE_TABLE_OPTIONS);
        $this->createIndex('unq_user_user_token', 'user', 'user_token', true);
        $this->createIndex('unq_user_screen_name', 'user', 'screen_name', true);
    }

    private function createUserAuth()
    {
        $this->createTable('user_auth', [
            'user_id'    => $this->integer()->notNull()->comment('ユーザID'),
            'password'      => $this->string(256)->null()->comment('パスワード'),
            'created_at'   => $this->integer()->null(),
            'updated_at'   => $this->integer()->null(),
        ], self::CREATE_TABLE_OPTIONS);
        $this->createIndex('unq_user_auth_user_id', 'user_auth', 'user_id', true);
    }

    private function createNoteBook()
    {
        $this->createTable('note_book', [
            'id'                    => $this->primaryKey(),
            'user_id'               => $this->integer()->notNull()->comment('所有ユーザID'),
            'parent_identification' => $this->string(256)->null()->comment('親ノートブック識別文字列'),
            'identification'        => $this->string(256)->null()->comment('識別文字列'),
            'name'                  => $this->string(256)->null()->comment('ノートブック名'),
            'sort_no'               => $this->integer()->notNull()->defaultValue(1)->comment('ソート番号'),
            'created_at'            => $this->integer()->null(),
            'updated_at'            => $this->integer()->null(),
        ], self::CREATE_TABLE_OPTIONS);
        $this->createIndex('unq_note_book_identification', 'note_book', 'identification', true);
    }

    private function createNote()
    {
        $this->createTable('note', [
            'id'             => $this->primaryKey(),
            'note_book_id'   => $this->integer()->notNull()->comment('ノートブックID'),
            'identification' => $this->string(256)->null()->comment('識別文字列'),
            'title'          => $this->string(256)->null()->comment('タイトル'),
            'sort_no'        => $this->integer()->notNull()->defaultValue(1)->comment('ソート番号'),
            'created_at'     => $this->integer()->null(),
            'updated_at'     => $this->integer()->null(),
        ], self::CREATE_TABLE_OPTIONS);
        $this->createIndex('unq_note_identification', 'note', 'identification', true);
    }

    private function insertUser()
    {
        $this->insert('user', [
            'id'          => 1,
            'user_token'  => md5(time()),
            'screen_name' => 'nakau1',
            'name'        => 'Yuichi Nakayasu',
            'email'       => 'yuichi.nakayasu@gmail.com',
            'role'        => 'administrator',
        ]);

        $this->insert('user_auth', [
            'user_id'  => 1,
            'password' => '19821116',
        ]);
    }

    private function insertUsers()
    {
        for ($i = 1; $i <= 100; $i++) {
            $this->insert('user', [
                'id'          => $i,
                'user_token'  => md5(time()).$i,
                'screen_name' => 'nakau'.$i,
                'name'        => 'Yuichi Nakayasu',
                'email'       => 'yuichi.nakayasu@gmail.com',
                'role'        => 'administrator',
            ]);
            $this->insert('user_auth', [
                'user_id'  => $i,
                'password' => '19821116',
            ]);
        }
    }

    public function down()
    {
        $this->dropTable('note');
        $this->dropTable('note_book');
        $this->dropTable('user_auth');
        $this->dropTable('user');
    }
}