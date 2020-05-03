<?php
if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Mindshape.MindshapeCookieHint',
	'Main',
	array(
		'Main' => 'cookie',
	),
	// non-cacheable actions
	array(
	)
);
