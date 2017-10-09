<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace WcTable;

/**
 * Description of Table
 *
 * @author caltj
 */
class Table extends AbstractTable {

    public function __construct($Data = array(), $template = "table") {
        parent::__construct($Data, $template);
        $this->Views = new Views(sprintf("%s/views", dirname(__DIR__)));
        $this->getHeader($Data);
        unset($this->Data['head']);
    }

    public function __toString() {
        $Table[] = $this->getStyles();
        $Table[] = $this->Views->wcShow($this->Data, $this->Views->wcLoad('table'));
        $Table[] = $this->getScripts();
        return implode(PHP_EOL, $Table);
    }

}
