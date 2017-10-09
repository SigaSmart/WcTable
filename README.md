se a pasta vendor não existir execute o comando composer install

Dentro do arquivo Config chame o autoload require 'Library/WcTable/vendor/autoload.php';

 <script>
        var options = {
            "ajax": "../_app/Library/WcTable/_ajax/Table.ajax.php?arq=posts"
        };
    </script>
    <?php
    $config = [
        'head' => [
            'Primeiro Nome',
            'Last name',
            'Position',
            'Office',
            'Start date',
            'Salary',
        ],
        'foot' => FALSE
    ];
    $table = new \WcTable\Table($config);
    echo $table;
    ?>