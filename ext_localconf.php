<?php

defined('TYPO3_MODE') || die('Access denied.');

$extName = 'MindshapeCookieHint';
$pluginName = 'MindshapeCookieHint';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	$extName,
	$pluginName,
	[\Mindshape\MindshapeCookieHint\Controller\MainController::class => 'cookie'],
	// non-cacheable actions
	[\Mindshape\MindshapeCookieHint\Controller\MainController::class => ''],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_PLUGIN
);
