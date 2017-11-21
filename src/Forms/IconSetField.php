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

use SilverStripe\Core\Convert;
use SilverStripe\Forms\FormField;
use SilverStripe\Forms\MultiSelectField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

/**
 * An extension of the multi-select field class for an icon set field.
 *
 * @package SilverWare\IconSetField\Forms
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-iconsetfield
 */
class IconSetField extends MultiSelectField
{
    /**
     * Defines the class name to use for small columns.
     *
     * @var string
     * @config
     */
    private static $column_class_small = 'col-sm-%d';
    
    /**
     * Defines the class name to use for large columns.
     *
     * @var string
     * @config
     */
    private static $column_class_large = 'col-lg-%d';
    
    /**
     * Defines the maximum height of the field.
     *
     * @var integer
     */
    protected $maxHeight;
    
    /**
     * Defines the column width of items for small devices.
     *
     * @var integer
     */
    protected $smallWidth = 6;
    
    /**
     * Defines the column width of items for large devices.
     *
     * @var integer
     */
    protected $largeWidth = 4;
    
    /**
     * Defines the value of the maxHeight attribute.
     *
     * @param integer $maxHeight
     *
     * @return $this
     */
    public function setMaxHeight($maxHeight)
    {
        $this->maxHeight = (integer) $maxHeight;
        
        return $this;
    }
    
    /**
     * Answers the value of the maxHeight attribute.
     *
     * @return integer
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }
    
    /**
     * Defines the value of the smallWidth attribute.
     *
     * @param integer $smallWidth
     *
     * @return $this
     */
    public function setSmallWidth($smallWidth)
    {
        $this->smallWidth = (integer) $smallWidth;
        
        return $this;
    }
    
    /**
     * Answers the value of the smallWidth attribute.
     *
     * @return integer
     */
    public function getSmallWidth()
    {
        return $this->smallWidth;
    }
    
    /**
     * Defines the value of the largeWidth attribute.
     *
     * @param integer $largeWidth
     *
     * @return $this
     */
    public function setLargeWidth($largeWidth)
    {
        $this->largeWidth = (integer) $largeWidth;
        
        return $this;
    }
    
    /**
     * Answers the value of the largeWidth attribute.
     *
     * @return integer
     */
    public function getLargeWidth()
    {
        return $this->largeWidth;
    }
    
    /**
     * Answers the field type for the template.
     *
     * @return string
     */
    public function Type()
    {
        return 'iconset';
    }
    
    /**
     * Renders the field for the template.
     *
     * @param array $properties
     *
     * @return DBHTMLText
     */
    public function Field($properties = [])
    {
        // Merge Options:
        
        $properties = array_merge($properties, [
            'Options' => $this->getOptions()
        ]);
        
        // Render Field:
        
        return FormField::Field($properties);
    }
    
    /**
     * Answers an array of HTML tag attributes for the object.
     *
     * @return array
     */
    public function getAttributes()
    {
        // Obtain Attributes (from parent):
        
        $attributes = parent::getAttributes();
        
        // Define Maximum Height:
        
        if ($this->maxHeight) {
            $attributes['data-max-height'] = $this->maxHeight;
        }
        
        // Remove Attributes:
        
        unset($attributes['name']);
        unset($attributes['disabled']);
        unset($attributes['readonly']);
        unset($attributes['required']);
        unset($attributes['aria-required']);
        
        // Answer Attributes:
        
        return $attributes;
    }
    
    /**
     * Answers an array list containing the options for the field.
     *
     * @return ArrayList
     */
    public function getOptions()
    {
        $options = ArrayList::create();
        
        $values        = $this->getValueArray();
        
        $defaultItems  = $this->getDefaultItems();
        $disabledItems = $this->getDisabledItems();
        
        $odd = false;
        
        foreach ($this->getSource() as $value => $details) {
            
            $odd = !$odd;
            
            $classes = [
                sprintf($this->config()->column_class_small, $this->smallWidth),
                sprintf($this->config()->column_class_large, $this->largeWidth), 
                $odd ? 'odd' : 'even'
            ];
            
            $checked  = in_array($value, $values) || in_array($value, $defaultItems);
            $disabled = $this->isDisabled() || $this->isReadonly() || in_array($value, $defaultItems) || in_array($value, $disabledItems);
            
            $options->push(
                ArrayData::create([
                    'ID' => Convert::raw2htmlid(sprintf('%s_%s', $this->ID(), $value)),
                    'Name' => sprintf('%s[%s]', $this->name, $value),
                    'Icon' => isset($details['icon']) ? $details['icon'] : null,
                    'Text' => isset($details['text']) ? $details['text'] : $value,
                    'Class' => implode(' ', $classes),
                    'Value' => $value,
                    'Checked' => $checked,
                    'Disabled' => $disabled
                ])
            );
            
        }
        
        $this->extend('updateOptions', $options);
        
        return $options;
    }
    
    /**
     * Answers true if the field has at least one option.
     *
     * @return boolean
     */
    public function hasOptions()
    {
        return $this->getOptions()->exists();
    }
    
    /**
     * Answers a readonly copy of the receiver.
     *
     * @return IconSetField_Readonly
     */
    public function performReadonlyTransformation()
    {
        return $this->castedCopy(IconSetField_Readonly::class);
    }
}
