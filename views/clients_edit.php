<h1>Clientes - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)): ?>
    <div class="warning"><strong><?php echo $error_msg; ?></strong></div>
<?php endif; ?>

<form method="POST">

    <label for="name">Nome</label><br/>
    <input type="text" name="name" value="<?php echo $client_info['name']; ?>" required/><br/><br/>

    <label for="email">E-mail</label><br/>
    <input type="email" value="<?php echo $client_info['email']; ?>" name="email"/><br/><br/>

    <label for="phone">Telefone</label>
    <input type="text" value="<?php echo $client_info['phone']; ?>" name="phone"/><br><br>

    <label for="stars">Estrelas</label>
    <select name="stars">
        <option value="1" <?php echo ($client_info['stars'] == '1') ? 'selected="selected"' : ''; ?>>1 Estrela</option>
        <option value="2" <?php echo ($client_info['stars'] == '2') ? 'selected="selected"' : ''; ?>>2 Estrela</option>
        <option value="3" <?php echo ($client_info['stars'] == '3') ? 'selected="selected"' : ''; ?>>3 Estrela</option>
        <option value="4" <?php echo ($client_info['stars'] == '4') ? 'selected="selected"' : ''; ?>>4 Estrela</option>
        <option value="5" <?php echo ($client_info['stars'] == '5') ? 'selected="selected"' : ''; ?>>5 Estrela</option>
    </select><br><br>


    <label for="internal_obs">Informações Internas</label>
    <textarea name="internal_obs" id="internal_obs" cols="30"
              rows="10"><?php echo $client_info['internal_obs']; ?></textarea> <br><br>

    <label for="address_zipcode">CEP</label>
    <input type="text" value="<?php echo $client_info['address_zipcode']; ?>" name="address_zipcode"/><br><br>

    <label for="address">Rua</label>
    <input type="text" value="<?php echo $client_info['address']; ?>" name="address"/><br><br>

    <label for="address_number">Número</label>
    <input type="text" value="<?php echo $client_info['address_number']; ?>" name="address_number"/><br><br>

    <label for="address2">Complemento</label>
    <input type="text" value="<?php echo $client_info['address2']; ?>" name="address2"/><br><br>

    <label for="address_neighb">Bairro</label>
    <input type="text" value="<?php echo $client_info['address_neighb']; ?>" name="address_neighb"/><br><br>

    <label for="address_city">Cidade</label>
    <input type="text" value="<?php echo $client_info['address_city']; ?>" name="address_city"/><br><br>

    <label for="address_state">Estado</label>
    <input type="text" value="<?php echo $client_info['address_state']; ?>" name="address_state"/><br><br>

    <label for="address_country">Pais</label>
    <input type="text" value="<?php echo $client_info['address_country']; ?>" name="address_country"/><br><br>

    <input type="submit" value="Salvar"/>

</form>

<script type="text/javascript" src="<?php echo BASE; ?>assets/js/script_client_add.js"></script>