



<form class="form" action="" method="post" enctype="multipart/form-data">
    <div class="form_field">
        <label class="form_label" for="raza">Raza : </label>
        <input class="form_input" type="text" name="raza" 
        id="raza" value="<?= $_POST['raza'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["raza"] ?? '' ?></p>
    </div>

    <div class="form_field">
        <label class="form_label" for="tamaño">Tamaño : </label>
        <input class="form_input" type="text" name="tamaño" 
        id="tamaño" value="<?= $_POST['tamaño'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["tamaño"] ?? '' ?></p>
    </div>

    <div class="form_field">
        <label class="form_label" for="edad">Edad :</label>
        <input class="form_input" type="number" name="edad" id="edad" 
         value="<?= $_POST['edad'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["edad"] ?? '' ?></p>
    </div>

    <div class="form_field">
        <label class="form_label" for="peso">Peso :</label>
        <input class="form_input" type="text" name="peso" id="peso" 
        value="<?= $_POST['peso'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["peso"] ?? '' ?></p>
    </div>

    <div class="form_field">
        <label class="form_label" for="color">Color :</label>
        <input class="form_input" type="color" name="color" id="color" 
        value="<?= $_POST['color'] ?? '' ?>">
        <p class="form_error"><?= $this->errores["color"] ?? '' ?></p>
    </div>

 
    <div class="form_field">
        <label class="form_label" for="imagen">Sube la foto del perrete  :</label>
        <input class="form_input" type="file" name="imagen" id="imagen">
        <p class="form_error"><?= $this->errores["imagen"] ?? '' ?></p>
    </div>
    <div class="form_buttons">
        <input class="form_button" type="submit" name="enviar" value="Enviar">
    </div>
</form>