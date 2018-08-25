<h1>Clientes - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)): ?>
    <div class="warning"><strong><?php echo $error_msg; ?></strong></div>
<?php endif; ?>

<form method="POST">

    <label for="name">Nome</label><br/>
    <input type="text" name="name" required/><br/><br/>

    <label for="email">E-mail</label><br/>
    <input type="email" name="email"/><br/><br/>

    <label for="phone">Telefone</label>
    <input type="text" name="phone"/><br><br>

    <label for="stars">Estrelas</label>
    <select name="stars">
        <option value="1">1 Estrela</option>
        <option value="2">2 Estrela</option>
        <option value="3" selected="selected">3 Estrela</option>
        <option value="4">4 Estrela</option>
        <option value="5">5 Estrela</option>
    </select><br><br>


    <label for="internal_obs">Informações Internas</label>
    <textarea name="internal_obs" id="internal_obs" cols="30" rows="10"></textarea> <br><br>

    <label for="address_zipcode">CEP</label>
    <input type="text" name="address_zipcode"/><br><br>

    <label for="address">Rua</label>
    <input type="text" name="address"/><br><br>

    <label for="address_number">Número</label>
    <input type="text" name="address_number"/><br><br>

    <label for="address2">Complemento</label>
    <input type="text" name="address2"/><br><br>

    <label for="address_neighb">Bairro</label>
    <input type="text" name="address_neighb"/><br><br>

    <label for="address_city">Cidade</label>
    <input type="text" name="address_city"/><br><br>

    <label for="address_state">Estado</label>
    <input type="text" name="address_state"/><br><br>

    <label for="address_country">Pais</label>
    <input type="text" name="address_country"/><br><br>

    <input type="submit" value="Adicionar"/>

</form>

<script type="text/javascript" src="<?php echo BASE;?>assets/js/script_client_add.js"></script>