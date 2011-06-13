<?php
/**
 * registerActions contiene las acciones del modulo registro
 *
 * @package    trocar
 * @subpackage register
 * @author     dacuna
 * @version    1.0 2011-06-12 20:16
 */
class registerActions extends sfActions
{
 /**
  * Ejecuta la accion de registro de un usuario
  *
  * @param sfRequest $request Objeto http request
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->isAuthenticated())
    {
	  $this->redirect('@homepage');
	}
	else
	{
	  $this->form = new RegisterForm();
	  $params = $request->getParameter('signup');
	  if($request->isMethod('post'))
	  {
		$this->form->bind($params);
		if($this->form->isValid())
		{
		  $this->form->save();
	
		  $user = $this->form->getObject();
	
		  //se crea la fila correspondiente al perfil del usuario
		  $profile = $user->getProfile();
		  //ademas se asigna por defecto el grupo de miembros (member) al 
		  //usuario que se acaba de registrar
		  $user->addGroupByName('member');
		  $user->save();
	
		  //auto login y redireccion al homepage
		  $this->getUser()->signIn($this->form->getObject());
		  $this->redirect('@homepage');
		}
	  }
    }
  }
}
