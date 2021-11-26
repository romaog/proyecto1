<form class="form" action="" method="post">
    <div class="form_field">
        <label class="form_label" for="nombre">Nombre</label>
        <input class="form_input" type="text" name="nombre" id="nombre" value="<?= $_POST['nombre'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["nombre"] ?? '' ?></p>
    </div>
    
   
        <label class="form_label" for="email">Correo electrónico</label>
        <input class="form_input" type="text" name="email" id="categoria" value="<?= $_POST['email'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["email"] ?? '' ?></p>
    </div>
    <div class="form_buttons">
        <input class="form_button" type="submit" name="enviar" value="Enviar">
    </div>
</form>