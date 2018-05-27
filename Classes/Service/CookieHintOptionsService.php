<?php
namespace Mindshape\MindshapeCookieHint\Service;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 Christoph Dieter <dieter@mindshape.de>, mindshape GmbH
 *           Daniel Dorndorf <dorndorf@mindshape.de>, mindshape GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * @package MindshapeCookieHint
 * @subpackage Service
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class CookieHintOptionsService implements SingletonInterface
{
    /**
     * @var \TYPO3\CMS\Core\Page\PageRenderer
     */
    protected $pageRenderer;

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     */
    protected $uriBuilder;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @param \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
     * @return \Mindshape\MindshapeCookieHint\Service\CookieHintOptionsService
     */
    public function __construct(PageRenderer $pageRenderer)
    {
        $this->pageRenderer = $pageRenderer;

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        /** @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager $configurationManager */
        $configurationManager = $objectManager->get(ConfigurationManager::class);

        $configurationManager->setContentObject(
            $objectManager->get(ContentObjectRenderer::class)
        );

        $this->uriBuilder = $objectManager->get(UriBuilder::class);
        $this->uriBuilder->injectConfigurationManager($configurationManager);

        $this->settings = $configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
            'mindshapecookiehint'
        );
    }

    /**
     * @return void
     */
    public function addCookieHintToPage()
    {
        $cookieOptions = [
            'expiryDays' => (int) $this->settings['expiryDays'],
            'learnMore' => LocalizationUtility::translate('hint.learnMore', 'mindshape_cookie_hint'),
            'dismiss' => LocalizationUtility::translate('hint.dismiss', 'mindshape_cookie_hint'),
            'message' => LocalizationUtility::translate('hint.message', 'mindshape_cookie_hint'),
            'appendToBottom' => (bool) $this->settings['appendToBottom'],
        ];

        if (0 < (int) $this->settings['readmore']) {
            $cookieOptions['link'] = $this->uriBuilder
                ->setTargetPageUid((int) $this->settings['readmore'])
                ->buildFrontendUri();
        }

        $this->pageRenderer->addJsFooterInlineCode(
            'cookieHint',
            'window.cookieconsent_options = ' . json_encode($cookieOptions)
        );
    }
}
