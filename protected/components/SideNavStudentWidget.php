<?php

class SideNavStudentWidget extends CWidget
{
    public $view = 'sideNavStudent'; // Name of the partial view to render (default)
    public $data = array(); // Optional data to pass to the view

    public function run()
    {
        $this->render($this->view, $this->data);
    }
}
