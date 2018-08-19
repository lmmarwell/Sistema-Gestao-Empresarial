<h1>Usuários</h1>

<div class="button"><a href="<?php echo BASE; ?>users/add">Adicionar Usuário</a></div>

<table border="0" width="100%">
    <tr>
        <th>E-mail</th>
        <th>Grupo de Permissões</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($users_list as $us): ?>
        <tr>
            <td><?php echo $us['email']; ?></td>
            <td width="200"><?php echo $us['name'];?></td>
            <td width="160">
                <div class="button button_edit">
                    <a href="<?php echo BASE; ?>users/edit/<?php echo $us['id']; ?>">Editar</a>
                </div>

                <div class="button button_delete">
                    <a href="<?php echo BASE; ?>users/delete/<?php echo $us['id']; ?>"
                       onclick="return confirm('Deseja Excluir?')">Excluir</a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>