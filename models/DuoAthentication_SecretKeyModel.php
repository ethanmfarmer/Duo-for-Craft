<?php
/**
 * Duo Athentication plugin for Craft CMS
 *
 * DuoAthentication_SecretKey Model
 *
 * --snip--
 * Models are containers for data. Just about every time information is passed between services, controllers, and
 * templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 * --snip--
 *
 * @author    Ethan Farmer
 * @copyright Copyright (c) 2016 Ethan Farmer
 * @link      http://ethanfarmer.net
 * @package   DuoAthentication
 * @since     1.0.0
 */

namespace Craft;

class DuoAthentication_SecretKeyModel extends BaseModel
{
    /**
     * Defines this model's attributes.
     *
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'someField'     => array(AttributeType::String, 'default' => 'some value'),
        ));
    }

}