<?php

namespace Mindshape\MindshapeCookieHint\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Christoph Dieter <dieter@mindshape.de>, mindshape GmbH
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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @package mindshape_cookie_hint
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class MainController extends ActionController
{
    /**
     * @return void
     */
    public function cookieAction()
    {
        $position = $this->settings['position'] === 'top'
            ? 'top'
            : 'bottom';

        $css = $this->settings['style'] === 'light'
            ? 'light'
            : 'dark';

        $style = $css . '-' . $position;

        $extensionKey = $this->request->getControllerExtensionKey();
        $cssFile = ExtensionManagementUtility::siteRelPath($extensionKey) . '/Resources/Public/Css/' . $style . '.css';

        /** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addCssFile($cssFile);
    }
}
