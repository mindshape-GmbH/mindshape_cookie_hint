<?php
if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// TypoScript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'mindshape Cookie Hint');

// Plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Main',
	'Cookies'
);
