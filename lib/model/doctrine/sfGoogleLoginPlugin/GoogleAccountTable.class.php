<?php

/**
 * GoogleAccountTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GoogleAccountTable extends PluginGoogleAccountTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object GoogleAccountTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('GoogleAccount');
    }
}