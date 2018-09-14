<?php

class I18nFilterTest extends Doctrine_Record
{
    /**
     * {@inheritdoc}
     */
    public function setTableDefinition()
    {
        $this->hasColumn('name', 'string', 200);
        $this->hasColumn('title', 'string', 200);
    }

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->actAs('I18n', array('fields' => array('name', 'title')));
    }

    /**
     * {@inheritdoc}
     */
    public function postSetUp($event)
    {
        parent::postSetUp($event);

        $table = $this->getTable();

        if ($table->hasRelation('Translation')) {
            $table->unshiftFilter(new I18nFilterTestFilter());
        }
    }
}

class I18nFilterTestFilter extends Doctrine_Record_Filter_Standard
{
    /**
     * {@inheritdoc}
     */
    public function filterSet(Doctrine_Record $record, $name, $value)
    {
        return $record['Translation']['en'][$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function filterGet(Doctrine_Record $record, $name)
    {
        $trans = $record['Translation'];

        if (isset($trans['en'])) {
            return $trans['en'][$name];
        }
    }
}
