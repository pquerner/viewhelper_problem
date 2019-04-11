<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Pierraa.viewhelperProblem',
    'Preview',
    [
        'Preview' => 'main',
    ]
);