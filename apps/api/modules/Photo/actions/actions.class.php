<?php

/**
 * Photo actions.
 *
 * @package    qhawpay
 * @subpackage Photo
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoActions extends ActionsRestCrud {

    public function executeComment(sfWebRequest $request) {

        if ($request->isMethod('post')) {
            $store_id = $request->getParameter("store_id");
            $customer_id = $request->getParameter("customer_id");
            $name = $request->getParameter("name");
            $content = $request->getParameter("content");
            $path = $request->getParameter("path");

            try {
                $this->obj = new Photo();
                $this->obj->setStoreId($store_id);
                $this->obj->setCustomerId($customer_id);
                $this->obj->setName($name);
                $this->obj->setContent($content);
                $this->obj->setPath($path);
                $this->obj->save();
                $this->setTemplate('show');
            } catch (Exception $exc) {
                $this->feedback = "error al tratar de guardar el comentario";
                $this->setTemplate('error');
            }
        }
    }

}
