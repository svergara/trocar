<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  info('1. Modulo iniciado y vista creada:')->
  get('/register/index')->

  with('request')->begin()->
    isParameter('module', 'register')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;

$browser->
  info('2. Formulario semantico (signup[propiedad]):')->
  get('/register/index');
$dom = $browser->getResponseDom();
$browser->test()->is($dom->getElementById('signup_username')->
          getAttribute('name'),'signup[username]','el elemento con id signup_username tiene por name signup[username]');
          
//ahora el test mas importante, el que comprueba que el modulo registrar hace
//lo que deberia hacer, registrar un usuario a partil de formulario de registro
$browser->
  info('3. Registrar un usuario mediante el formulario de registro:')->
  get('/register/index')->
  with('form')->begin()->
    click('Registrar', array(
			'signup' => array(
			'username' => 'testuser@test.com',
			'password' => 'hola',
			'password_confirmation' => 'hola')))->
  end()->
  
  //si todo anduvo bien, entonces al volver a registrarse se debe 
  //redirigir a la pagina de inicio (el usuario ya se registro)
  get('/register/index')->
  with('response')->begin()->
  isRedirected()->
  end()->
  
  followRedirect()->    
 
  //se chequea que se redirigio a la pagina de inicio
  with('request')->begin()->
    isParameter('module', 'default')->
    isParameter('action', 'index')->
  end()
;
