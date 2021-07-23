<?php
if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'MindshapeCookieHint',
	'Main',
	[\Mindshape\MindshapeCookieHint\Controller\MainController::class => 'cookie'],
	[]
);
