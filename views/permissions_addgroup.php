<h1>Permissões - Adicionar Grupo de Permissões</h1>

<form method="post">
    <label for="name">Nome do grupo de Permissões</label> <br>
    <input type="text" name="name"><br><br>

    <label for="permissoes">Permissões</label><br>
    <?php foreach ($permissions_list as $p): ?>
        <div class="p_item">
            <input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?>" id="p_<?php echo $p['id']; ?>">
            <label for="p_<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
        </div>
    <?php endforeach; ?>
    <br><br>
    <input type="submit" value="Adicionar">
</form>