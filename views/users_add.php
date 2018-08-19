<h1>Usuários - Adicionar</h1>

<form method="post">
    <label for="email">E-mail</label><br>
    <input type="email" name="email" required><br><br>

    <label for="password">Senha</label><br>
    <input type="password" name="password" required><br><br>

    <label for="group">Grupo de Permissões</label>
    <select name="group" id="group" required>
        <?php foreach ($group_list as $g): ?>
            <option value="<?php echo $g['id']; ?>"><?php echo $g['name']; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Adicionar">
</form>