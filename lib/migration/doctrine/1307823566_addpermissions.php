<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addpermissions extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('permissions', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'name' => 
             array(
              'type' => 'string',
              'unique' => true,
              'length' => 255,
             ),
             'description' => 
             array(
              'type' => 'string',
              'length' => 1000,
             ),
             'created_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             'updated_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('permissions');
    }
}