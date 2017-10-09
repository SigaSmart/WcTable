se a pasta vendor não existir execute o comando composer install

Dentro do arquivo Config chame o autoload require 'Library/WcTable/vendor/autoload.php';

 ````
<div class="dashboard_content">
    <script>
        var options = {
            "ajax": "../_app/Library/WcTable/_ajax/Table.ajax.php?arq=posts"
        };
    </script>
    <?php
    $config = [
        'head' => [
            'Cover',
            'Nome',
            'Preview',
            'Data'
        ],
        'foot' => FALSE
    ];
    $table = new \WcTable\Table($config);
    echo $table;
    ?>
`````