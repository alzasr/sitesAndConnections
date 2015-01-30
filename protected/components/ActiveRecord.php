<?php

class ActiveRecord extends CActiveRecord
{

    protected $_table;

    public function tableName()
    {
        return '{{' . $this->_table . '}}';
    }

    public function getByPk($pk)
    {
        $model = $this->findByPk($pk);
        if (empty($model)) {
            $model = new static();
            $model->setPrimaryKey($pk);
        }
        return $model;
    }

    public function isSubstring($attribute, $params)
    {
        $string = null;
        if (array_key_exists('string', $params)) {
            $string = $params['string'];
        } else if (array_key_exists('property', $params)) {
            $propertyName = $params['property'];
            $string = $this->$propertyName;
        }
        if (is_null($string)) {
            return;
        }
        if (mb_stripos($string, $this->$attribute) === false) {
            $this->addError($attribute, $attribute . ' is not a substring of "' . $string . '"');
        }
    }

    public function replace($attribute, $params)
    {
        if (!array_key_exists('search', $params)) {
            return;
        }
        $search = $params['search'];
        $replace = array_key_exists('replace', $params) ? $params['replace'] : '';
        $this->$attribute = str_replace($search, $replace, $this->$attribute);
    }

    public function searchText($text)
    {
        return $this;
    }

    public static function enumItem($attribute)
    {
        $matches = array();
        preg_match('/\((.*)\)/', static::model()->tableSchema->columns[$attribute]->dbType, $matches);
        foreach (explode("','", $matches[1]) as $value) {
            $value = str_replace("'", null, $value);
            $values[$value] = Yii::t('enumItem', $value);
        }
        return $values;
    }

}
