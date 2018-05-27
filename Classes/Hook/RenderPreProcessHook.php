<?php
namespace Mindshape\MindshapeCookieHint\Hook;

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

use Mindshape\MindshapeCookieHint\Service\CookieHintOptionsService;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @package MindshapeCookieHint
 * @subpackage Hook
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class RenderPreProcessHook
{
    const TYPO3_MODE_FRONTEND = 'FE';

    /**
     * @param array $params
     * @param \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
     */
    public function main(array &$params, PageRenderer $pageRenderer)
    {
        if (self::TYPO3_MODE_FRONTEND === TYPO3_MODE) {
            /** @var \Mindshape\MindshapeCookieHint\Service\CookieHintOptionsService $cookieHintOptionsService */
            $cookieHintOptionsService = GeneralUtility::makeInstance(CookieHintOptionsService::class, $pageRenderer);
            $cookieHintOptionsService->addCookieHintToPage();
        }
    }
}
