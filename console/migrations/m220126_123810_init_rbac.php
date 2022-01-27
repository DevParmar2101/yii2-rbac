<?php

use yii\db\Migration;

/**
 * Class m220126_123810_init_rbac
 */
class m220126_123810_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        // To define a permission of create post for the author role the below code is used

//        $auth->addChild($user, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        // To define a permission of update post and the permission of author the below commited code is used

        $time = time();
        $this->batchInsert(
            'user',
            ['username', 'auth_key', 'verification_token', 'password_hash', 'password_reset_token', 'email', 'status', 'created_at', 'updated_at'],
            array(
                array('admin', 'O-oDBLVlj7obhJzovnP15-Soz9iUB', '', '$2y$13$.aRQImtxqZur2mQb0jivKugRBwZnvfu1GP2v1fNbC7P/EjArPLnl.', NULL, 'admin@gmail.com', '10', $time, $time),
                array('user', 'O-oDBLVlj7obhJzovnP15-Soz', '', '$2y$13$.aRQImtxqZur2mQb0jivKugRBwZnvfu1GP2v1fNbC7P/EjArPLnl.', NULL, 'ticketer@gmail.com', '10', $time, $time),

            )
        );

        $admin_id = \common\models\User::findOne(['email'=>'admin@gmail.com']);
        $auth->assign($admin,1);
        $user_id = \common\models\User::findOne(['email'=>'user@gmail.com']);
        $auth->assign($user,2);
//        $auth->addChild($admin, $updatePost);
//        $auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.

        // The Below code is used to assign users
//        $auth->assign($user, 2);
//        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220126_123810_init_rbac cannot be reverted.\n";

        return false;
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}

/*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

*/