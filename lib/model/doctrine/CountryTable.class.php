<?php

/**
 * CountryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CountryTable extends DoctrineTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object CountryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Country');
    }
}