<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Url</th>
                <th>Created</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(count($paginas)){
            foreach($paginas as $pagina){
                echo '<tr>',
                        '<td><a href="view.php?id=' . $pagina['id'] . '">' . $pagina['title'] . '</a></td>',
                        '<td>' . $pagina['url'] . '</td>',
                        '<td>' . date('d/m/Y', strtotime($pagina['insert_date'])) . '</td>',
                        '<td align="center"><a href="edit.php?id=' . $pagina['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>',
                        '<td align="center"><a href="delete.php?id=' . $pagina['id'] . '" onclick="return confirm(\'Tem certeza?\')"><span class="glyphicon glyphicon-trash"></span></a></td>',
                     '</tr>';
            }
        }else{
            echo '<tr><td colspan="5" align="center">Nenhuma página cadastrada</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>