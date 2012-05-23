<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActionsRestCrud
 *
 * @author dtataje
 */
class ActionsRestCrud extends ActionsCrud {

    protected $message = '';

    public function executeShow(sfWebRequest $request) {
        $slug = $request->getParameter('slug', '');
        $this->obj = Doctrine::getTable($this->modelClass)->findOneBySlug($slug);
        $this->forward404Unless($this->obj);
        if ($this->obj == null) {
            $this->response->setStatusCode('400');
            $this->feedback = 'Invalid SLUG';
            $this->setTemplate('error');
        }
    }

    public function executeList(sfWebRequest $request) {
        try {
            $q = Doctrine::getTable($this->modelClass)->createAliasQuery();
            $q->filterAndArrange($this->getFilterAndArrangeParameters($request), $this->getExtraFilterAndArrangeFields());
            $this->complementList($request, $q);
            $this->configureList($request, $q);
            $this->setCrudPager($request, $q);
        } catch (sfExceptionExt $exc) {
            $this->response->setStatusCode('400');
            $this->feedback = 'Invalid request';
            $this->setTemplate('error');
        }
    }

    public function executeEdit(sfWebRequest $request) {

        $slug = $request->getParameter('slug', '');
        $this->object = Doctrine::getTable($this->modelClass)->findOneBySlug($slug);
        $this->form = new $this->formClass($this->object);
        $this->form->disableCSRFProtection();
        $params = $request->getParameter($this->form->getName());
        $this->form->bind($params, $request->getFiles($this->form->getName()));

        if (!$this->form->isValid())
        {
           $this->feedback = $this->form->renderErrors();
        $this->setTemplate('error'); 
        }
            ;

        $this->form->save();

        $this->setTemplate('single');
    }

    public function executeDelete(sfWebRequest $request) {

        $slugs = $request->getParameter('slug');
        $slugs = explode(',', $slugs);

        $this->getResponse()->setStatusCode(403);

        try {
            Doctrine::getTable($this->modelClass)->deleteBySlugs($slugs);
        } catch (sfExceptionExt $e) {
            $this->getResponse()->setStatusCode(500);
            $this->message = "error";
        }
    }

    public function execute500(sfWebRequest $request) {
        $this->feedback = 'Internal server error: unsupported service';
        $this->setTemplate('error');
    }

}

?>
