<h1>Clientes</h1>

<?php if ($edit_permission): ?>
    <div class="button"><a href="<?php echo BASE; ?>clients/add">Adicionar Cliente</a></div>
<?php endif; ?>

<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Cidade</th>
        <th>Estrelas</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($clients_list as $c) : ?>
        <td><?php echo $c['name']; ?></td>
        <td width="100"><?php echo $c['phone']; ?></td>
        <td width="150"><?php echo $c['address_city']; ?></td>
        <td width="70" align="center"><?php echo $c['stars']; ?></td>
        <td width="170" align="center">
            <?php if ($edit_permission): ?>
                <div class="button button_edit"><a
                            href="<?php echo BASE; ?>clients/edit/<?php echo $c['id'] ?>">Editar</a></div>
                <div class="button button_delete"><a
                            href="<?php echo BASE; ?>clients/delete/<?php echo $c['id']; ?>"
                            onclick="return confirm('Deseja Excluir?')">Deletar</a></div>
            <?php else: ?>
                <div class="button button_small"><a
                            href="<?php echo BASE; ?>clients/edit<?php echo $c['id'] ?>">Visualizar</a></div>
            <?php endif; ?>
        </td>
    <?php endforeach; ?>
</table>