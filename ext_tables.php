<?php
defined('TYPO3_MODE') || die('Access denied.');

(function () { 
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Pierraa.viewhelperProblem',
        'Preview',
        'LLL:EXT:viewhelper_problem/Resources/Private/Language/localllang.xlf:PLUGIN.PREVIEW'
    );    
})();