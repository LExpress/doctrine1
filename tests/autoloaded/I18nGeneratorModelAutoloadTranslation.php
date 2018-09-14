<?php

class I18nGeneratorModelAutoloadTranslation extends Doctrine_Record
{
    public function __construct()
    {
        throw new LogicException('This record is expected to be instanciated as generateFiles option on record generator is false and it is autoloadable.');
    }
}
