<?php

class SubjectDataTable extends CWidget
{
    public function run()
    {
        $dataProvider = new CActiveDataProvider('Subject');

        $this->render('subjectDataTable', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
