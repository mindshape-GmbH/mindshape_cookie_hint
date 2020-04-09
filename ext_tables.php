<?php

defined('TYPO3_MODE') || die('Access denied.');

$extKey = 'mindshape_cookie_hint';
$extName = 'MindshapeCookieHint';
$pluginName = 'CookieHint';
$pluginLabel = 'Cookies';

// TypoScript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'mindshape Cookie Hint');

// Plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($extName, $pluginName, $pluginLabel);
