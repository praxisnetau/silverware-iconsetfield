<?php

/**
 * This file is part of SilverWare.
 *
 * PHP version >=5.6.0
 *
 * For full copyright and license information, please view the
 * LICENSE.md file that was distributed with this source code.
 *
 * @package SilverWare\IconSetField\Forms
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-iconsetfield
 */

namespace SilverWare\IconSetField\Forms;

/**
 * An extension of the icon set field class for a readonly icon set field.
 *
 * @package SilverWare\IconSetField\Forms
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-iconsetfield
 */
class IconSetField_Readonly extends IconSetField
{
    /**
     * Defines the field as readonly.
     *
     * @var boolean
     */
    protected $readonly = true;
    
    /**
     * Field is already readonly, returns a clone.
     *
     * @return IconSetField_Readonly
     */
    public function performReadonlyTransformation()
    {
        return clone $this;
    }
}
