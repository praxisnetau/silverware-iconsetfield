<?php

/**
 * This file is part of SilverWare.
 *
 * PHP version >=5.6.0
 *
 * For full copyright and license information, please view the
 * LICENSE.md file that was distributed with this source code.
 *
 * @package SilverWare\IconSetField\Extensions
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-iconsetfield
 */

namespace SilverWare\IconSetField\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * An extension which adds SilverWare IconSetField functionality to controllers.
 *
 * @package SilverWare\IconSetField\Extensions
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-iconsetfield
 */
class ControllerExtension extends Extension
{
    /**
     * Event handler method triggered before the extended controller has initialised.
     *
     * @return void
     */
    public function onBeforeInit()
    {
        Requirements::customCSS($this->getCustomCSS());
    }
    
    /**
     * Answers the color associated with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    public function getIconSetFieldColor($name)
    {
        $theme = $this->owner->config()->iconsetfield_theme;
        
        if (isset($theme[$name])) {
            return $theme[$name];
        }
    }
    
    /**
     * Answers the custom CSS required for the extension.
     *
     * @return string
     */
    protected function getCustomCSS()
    {
        return $this->owner->renderWith(sprintf('%s\CustomCSS', self::class));
    }
}
