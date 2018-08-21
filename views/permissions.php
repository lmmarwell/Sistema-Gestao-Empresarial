<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupos de Permissões</div>
    <div class="tabitem">Permissões</div>
</div>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <div class="button">
            <a href="<?php echo BASE; ?>permissions/addGroup">Adicionar Grupo de Permissões</a>
        </div>
        <table border="0" width="100%">
            <tr>
                <th>Nome do grupo de Permissões</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($permissions_groups_list as $p): ?>
                <tr>
                    <td><?php echo $p['name']; ?></td>
                    <td width="160">
                        <div class="button button_edit">
                            <a href="<?php echo BASE; ?>permissions/editGroup/<?php echo $p['id']; ?>">Editar</a>
                        </div>

                        <div class="button button_delete">
                            <a href="<?php echo BASE; ?>permissions/deleteGroup/<?php echo $p['id']; ?>"
                               onclick="return confirm('Deseja Excluir?')">Excluir</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>


    <div class="tabbody">

        <div class="button">
            <a href="<?php echo BASE; ?>permissions/add">Adicionar Permissão</a>
        </div>
        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($permissions_list as $p): ?>
                <tr>
                    <td><?php echo $p['name']; ?></td>
                    <td width="50">
                        <div class="button button_delete">
                            <a href="<?php echo BASE; ?>permissions/delete/<?php echo $p['id']; ?>"
                               onclick="return confirm('Deseja Excluir?')">Excluir</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>