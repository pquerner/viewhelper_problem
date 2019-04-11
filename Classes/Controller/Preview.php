<?php
namespace Pierraa\ViewhelperProblem\Controller;

class PreviewController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
    /**
     * main action
     *
     * @return void
     */
    public function mainAction() 
    {
        $this->view->assign('page', 2);

    }
}