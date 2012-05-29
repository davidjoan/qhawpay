<?php

/**
 * Log actions.
 *
 * @package    qhawpay
 * @subpackage Log
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LogActions extends sfActions {

    public function executeLoginFacebook(sfWebRequest $request) {
        $app_id = "292360694186351";
        $app_secret = "0b654a8d070a63539b470d19be441677";
        $my_url = "http://localhost:8589/login/facebook";
        $code = $request->getParameter("code");
        $state = $request->getParameter("state");

        if (empty($code)) {
            $this->getUser()->setAttribute('state', md5(uniqid(rand(), TRUE)));
            $dialog_url = "https://www.facebook.com/dialog/oauth?client_id="
                    . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
                    . $this->getUser()->getAttribute('state');
            return $this->redirect($dialog_url);
        }
        if ($state == $this->getUser()->getAttribute('state')) {
            $token_url = "https://graph.facebook.com/oauth/access_token?"
                    . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
                    . "&client_secret=" . $app_secret . "&code=" . $code;

            $response = @file_get_contents($token_url);
            $params = null;
            parse_str($response, $params);

            $graph_url = "https://graph.facebook.com/me?access_token="
                    . $params['access_token'];

            $user = json_decode(file_get_contents($graph_url));
            $customer = Doctrine::getTable('Customer')->findOneByFacebookId($user->id);
            if (!$customer) {
                $customer = Doctrine::getTable('Customer')->findOneByEmail($user->email);
            }

            if (!$customer) {
                $customer = new Customer();
                $customer->setRealname($user->name);
                $customer->setUsername($user->username);
                $customer->setEmail($user->email);
                $customer->setUrl($user->link);
            }


            $customer->setFacebookId($user->id);
            $customer->save();
            $this->getUser()->loginFrontend($customer);
            return $this->redirect('@panel_index');
            //Deb::print_r($user);
        } else {
            echo("The state does not match. You may be a victim of CSRF.");
            die();
        }
    }

}
