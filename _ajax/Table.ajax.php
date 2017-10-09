<?php

session_start();
require '../../../../_app/Config.inc.php';
$NivelAcess = LEVEL_WC_CONFIG_API;

if (empty($_SESSION['userLogin']) || empty($_SESSION['userLogin']['user_level']) || $_SESSION['userLogin']['user_level'] < $NivelAcess):
    $jSON['trigger'] = AjaxErro('<b class="icon-warning">OPPSSS:</b> Você não tem permissão para essa ação ou não está logado como administrador!', E_USER_ERROR);
    echo json_encode($jSON);
    die;
endif;

//DEFINE O CALLBACK E RECUPERA O GET
$jSON = null;
$PostData = filter_input_array(INPUT_GET, FILTER_DEFAULT);

//VALIDA AÇÃO
if ($PostData && isset($PostData['arq'])):
    // AUTO INSTANCE OBJECT READ
    if (empty($Read)):
        $Read = new Read;
    endif;
    include sprintf('config/%s.php', $PostData['arq']);

// SQL server connection information
    $sql_details = array(
        'user' => SIS_DB_USER,
        'pass' => SIS_DB_PASS,
        'db' => SIS_DB_DBSA,
        'host' => SIS_DB_HOST
    );


    /*     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */

    $jSON = \WcTable\Ssp::simple($PostData, $sql_details, $table, $primaryKey, $columns);

    //RETORNA O CALLBACK
    if ($jSON):
        echo json_encode($jSON);
    else:
        $jSON['trigger'] = AjaxErro('<b class="icon-warning">OPSS:</b> Desculpe. Mas uma ação do sistema não respondeu corretamente. Ao persistir, contate o desenvolvedor!', E_USER_ERROR);
        echo json_encode($jSON);
    endif;
else:
    //ACESSO DIRETO
    die('<br><br><br><center><h1>Acesso Restrito!</h1></center>');
endif;
