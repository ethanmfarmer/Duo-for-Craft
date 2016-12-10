<?php
/**
 * Duo Athentication plugin for Craft CMS
 *
 * Duo Athentication Variable
 *
 * --snip--
 * Craft allows plugins to provide their own template variables, accessible from the {{ craft }} global variable
 * (e.g. {{ craft.pluginName }}).
 *
 * https://craftcms.com/docs/plugins/variables
 * --snip--
 *
 * @author    Ethan Farmer
 * @copyright Copyright (c) 2016 Ethan Farmer
 * @link      http://ethanfarmer.net
 * @package   DuoAthentication
 * @since     1.0.0
 */

namespace Craft;

class DuoAthenticationVariable
{
    /**
     * Whatever you want to output to a Twig tempate can go into a Variable method. You can have as many variable
     * functions as you want.  From any Twig template, call it like this:
     *
     *     {{ craft.duoAthentication.exampleVariable }}
     *
     * Or, if your variable requires input from Twig:
     *
     *     {{ craft.duoAthentication.exampleVariable(twigValue) }}
     */
    public function exampleVariable($optional = null)
    {
        return "And away we go to the Twig template...";
    }
}