<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('login_historys')
            ->addColumn('user_id', 'integer', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('login_time', 'timestamp', [
                'comment' => 'ログイン日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('logout_time', 'timestamp', [
                'comment' => 'ログアウト日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp', [
                'comment' => '作成日',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'timestamp', [
                'comment' => '更新日',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_user', 'string', [
                'comment' => '作成者',
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('modified_user', 'string', [
                'comment' => '更新者',
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('account', 'string', [
                'comment' => 'ログインID',
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'comment' => 'パスワード',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'comment' => '名前',
                'default' => '',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'comment' => 'E-Mail',
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
                'comment' => '作成日',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'timestamp', [
                'comment' => '更新日',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_user', 'string', [
                'comment' => '作成者',
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('modified_user', 'string', [
                'comment' => '更新者',
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addIndex(
                [
                    'account',
                ],
                ['unique' => true]
            )
            ->create();
    }

    public function down()
    {
        $this->table('login_historys')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
