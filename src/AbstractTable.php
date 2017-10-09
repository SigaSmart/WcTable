<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace WcTable;

/**
 * Description of AbstractTable
 *
 * @author caltj
 */
class AbstractTable {

    protected $Data;
    protected $Views;
    protected $Scripts;
    protected $Styles;

    public function __construct($Data = [], $template = "table") {
        $this->Data = $Data;

        $this->Scripts = [
            'datatable' => sprintf("%s/_app/Library/WcTable/js/datatables.min.js", BASE),
            'jquery-datatable' => sprintf("%s/_app/Library/WcTable/js/jquery.dataTables.min.js", BASE),
            'init' => sprintf("%s/_app/Library/WcTable/js/datatables.init.js", BASE)
        ];

        $this->Styles = [
            'datatable' => sprintf("%s/_app/Library/WcTable/css/datatables.min.css", BASE),
            'jquery-datatable' => sprintf("%s/_app/Library/WcTable/css/jquery.dataTables.min.css", BASE),
            'init' => sprintf("%s/_app/Library/WcTable/css/styles.css", BASE)
        ];
    }

    public function getScripts() {
        $scripts = [];
        if ($this->Scripts):

            foreach ($this->Scripts as $script):
                $scripts[] = sprintf("<script src='%s'></script>", $script);
            endforeach;

        endif;
        return implode(PHP_EOL, $scripts);
    }

    public function getStyles() {
        $styles = [];
        if ($this->Styles):

            foreach ($this->Styles as $style):
                $styles[] = sprintf("<link rel='stylesheet' type='text/css' href='%s'>", $style);
            endforeach;

        endif;
        return implode(PHP_EOL, $styles);
    }

    public function getHeader($Header) {
        $Th = [];
        if (isset($Header['head'])):
            foreach ($Header['head'] as $head):
                $Th[] = sprintf("<th>%s</th>", $head);
            endforeach;
            if ($Header['foot']):
                $this->Data['foot'] = sprintf("<tfoot><tr>%s<th>Ações</th></tr></tfoot>", implode("", $Th));
            endif;
        endif;
        $this->Data['header'] = implode("", $Th);
    }

}
