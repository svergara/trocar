<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
 
new sfDatabaseManager($configuration);
 
$t = new lime_test(2);

//TEST PARA PERFIL DE USUARIO

//se testea la asociacion agregada al modelo entre el login de un 
//usuario y su perfil, el metodo getProfile() debe devolver el perfil
//de un usuario y si este perfil no existe, entonces debe crear uno
//y retornar dicho perfil.
$t->comment('->getProfile()');
$t->comment('1. ->getProfile() - Existing user:');
//Se obtiene un usuario conocido (el usuario admin@trocar.cl proveniente de los fixtures)
$query = Doctrine_Core::getTable('sfGuardUser')
                        ->createQuery('u')
                        ->select('u.id')
                        ->where('u.username= ?', 'admin@trocar.cl');
$user = $query->fetchOne();
$t->is($user->getProfile()->getUserId(),$user->getId(),
       '->getProfile()->getUserId() obtiene la id del usuario sfUser que posee el perfil obtenido.');
       
$t->comment('2. ->getProfile() - Non existing user:');
//segundo caso: se obtiene un usuario conocido sin perfil, entonces la llamada a ->getProfile()
//debe devolver un nuevo perfil 	
$user2 = create_user();
$user2->getProfile();
$user2->save();
$t->is($user2->getProfile()->getFirstName(), null, '->getProfile()->getFirstName() devuelve null pues no existe un perfil creado para este usuario');

//FIN TEST PERFIL DE USUARIO


function create_user($defaults = array())
{ 
  $user = new sfGuardUser();
  $user->fromArray(array_merge(array(
    'username'      => 'usertest',
    'algorithm'     => 'sha1',
  ), $defaults));
 
  return $user;
}
