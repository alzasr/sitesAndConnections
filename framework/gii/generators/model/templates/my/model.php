<?php echo "<?php\n"; ?>

class <?php echo $modelClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{

<?php foreach($columns as $column): ?>
    public $<?= $column->name.";\n"; ?><?php endforeach; ?>
    protected $_table = '<?php echo str_replace(array('{','}'), '', $tableName); ?>';

    public function rules()
    {
        return array(
<?php foreach($rules as $rule): ?>
            <?php echo $rule.",\n"; ?>
<?php endforeach; ?>
            array('<?php echo implode(', ', array_keys($columns)); ?>', 'safe', 'on'=>'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
<?php foreach($labels as $name=>$label): ?>
            <?php echo "'$name' => '$label',\n"; ?>
<?php endforeach; ?>
        );
    }


<?php if($connectionId!='db'):?>
    /**
     * @return CDbConnection the database connection used for this class
     */
    public function getDbConnection()
    {
        return Yii::app()-><?php echo $connectionId ?>;
    }

<?php endif?>
    /**
     * @return <?php echo $modelClass; ?> the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
