<?php

/**
 * Customer actions.
 *
 * @package    qhawpay
 * @subpackage Customer
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CustomerActions extends sfActions {

    public function executeLogin(sfWebRequest $request) {
        header('Access-Control-Allow-Origin: *');
        
            $this->logMessage('info', $request->getParameterHolder()->getAll());
            $username = $request->getParameter("username");
            $password = $request->getParameter("password");
            $this->obj = Doctrine::getTable('Customer')->findOneByLowerCaseUsername($username);
            if (Cipher::getInstance()->encrypt($password) != $this->obj->getPassword()) {
                $this->feedback = "login incorrect";
                $this->setTemplate('error');
            }
        
    }
    
    public function executeRegister(sfWebRequest $request) {

        if ($request->isMethod('post')) {
            $realname = $request->getParameter("realname");
            $username = $request->getParameter("username");
            $password = $request->getParameter("password");
            $confirm_password = $request->getParameter("confirm_password");
            $email = $request->getParameter("email");
            
            
            $this->obj = Doctrine::getTable('Customer')->findOneByLowerCaseUsername($username);
            
            if($this->obj == null && $password == $confirm_password)
            {
                $this->obj = new Customer();
                $this->obj->setRealname($realname);
                $this->obj->setUsername($username);
                $this->obj->setPassword($password);
                $this->obj->setEmail($email);
                $this->obj->setGender('M');
                $this->obj->setIsAdmin('N');
                
                $this->obj->save();
                $this->setTemplate('login');                
                
            }
            else
            {
                $this->feedback = "el password no coincide o el usuario ya existe";
                $this->setTemplate('error');                
            }
        }
    }    

}
