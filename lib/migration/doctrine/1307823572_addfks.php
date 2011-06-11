<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addfks extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('forgot_password', 'forgot_password_user_id_user_login_id', array(
             'name' => 'forgot_password_user_id_user_login_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user_login',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('groups_permissions', 'groups_permissions_group_id_groups_id', array(
             'name' => 'groups_permissions_group_id_groups_id',
             'local' => 'group_id',
             'foreign' => 'id',
             'foreignTable' => 'groups',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('groups_permissions', 'groups_permissions_permission_id_permissions_id', array(
             'name' => 'groups_permissions_permission_id_permissions_id',
             'local' => 'permission_id',
             'foreign' => 'id',
             'foreignTable' => 'permissions',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('remember_key', 'remember_key_user_id_user_login_id', array(
             'name' => 'remember_key_user_id_user_login_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user_login',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('user_group', 'user_group_user_id_user_login_id', array(
             'name' => 'user_group_user_id_user_login_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user_login',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('user_group', 'user_group_group_id_groups_id', array(
             'name' => 'user_group_group_id_groups_id',
             'local' => 'group_id',
             'foreign' => 'id',
             'foreignTable' => 'groups',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('user_permission', 'user_permission_user_id_user_login_id', array(
             'name' => 'user_permission_user_id_user_login_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user_login',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('user_permission', 'user_permission_permission_id_permissions_id', array(
             'name' => 'user_permission_permission_id_permissions_id',
             'local' => 'permission_id',
             'foreign' => 'id',
             'foreignTable' => 'permissions',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('user_profile', 'user_profile_user_id_user_login_id', array(
             'name' => 'user_profile_user_id_user_login_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user_login',
             'onUpdate' => NULL,
             'onDelete' => 'CASCADE',
             ));
    }

    public function down()
    {
        $this->dropForeignKey('forgot_password', 'forgot_password_user_id_user_login_id');
        $this->dropForeignKey('groups_permissions', 'groups_permissions_group_id_groups_id');
        $this->dropForeignKey('groups_permissions', 'groups_permissions_permission_id_permissions_id');
        $this->dropForeignKey('remember_key', 'remember_key_user_id_user_login_id');
        $this->dropForeignKey('user_group', 'user_group_user_id_user_login_id');
        $this->dropForeignKey('user_group', 'user_group_group_id_groups_id');
        $this->dropForeignKey('user_permission', 'user_permission_user_id_user_login_id');
        $this->dropForeignKey('user_permission', 'user_permission_permission_id_permissions_id');
        $this->dropForeignKey('user_profile', 'user_profile_user_id_user_login_id');
    }
}