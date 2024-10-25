<?php

class SubjectAssignedDataTable extends CWidget
{
    public function run()
    {
        $criteria = new CDbCriteria();

        $dataProvider = new CActiveDataProvider('TeacherSubject', array(
            'criteria' => $criteria,
        ));

        $this->render('subjectAssignedDataTable', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
