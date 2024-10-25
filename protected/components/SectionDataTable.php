<?php

class SectionDataTable extends CWidget
{
    public function run()
    {
        $dataProvider = new CActiveDataProvider('Section');

        $this->render('sectionDataTable', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
