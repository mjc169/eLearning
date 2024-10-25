<?php

class StudentDataTable extends CWidget
{
    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'account_type = :type';
        $criteria->params = array(':type' => Account::ACCOUNT_TYPE_STUDENT);

        $dataProvider = new CActiveDataProvider('Account', array(
            'criteria' => $criteria,
        ));

        $this->render('studentDataTable', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
