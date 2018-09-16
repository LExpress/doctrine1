<?php

Doctrine_Manager::getInstance()->bindComponent('ModelBindConnection', 'test_bind_connection');

class ModelBindConnection extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('name', 'string', 1);
    }
}
