<?php

class TeacherDataTable extends CWidget
{
    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'account_type = :type';
        $criteria->params = array(':type' => Account::ACCOUNT_TYPE_TEACHER);

        $dataProvider = new CActiveDataProvider('Account', array(
            'criteria' => $criteria,
        ));

        $this->render('teacherDataTable', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
