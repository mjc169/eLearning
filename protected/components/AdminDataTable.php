<?php

class AdminDataTable extends CWidget
{
    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'account_type = :type';
        $criteria->params = array(':type' => Account::ACCOUNT_TYPE_ADMIN);

        $dataProvider = new CActiveDataProvider('Account', array(
            'criteria' => $criteria,
        ));

        $this->render('adminDataTable', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
