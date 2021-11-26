<div class="info">
    
    <div class="info_campo">
       <img class="form_img" class="<?= !(isset($this->perro->imagen) 
        && $this->perro->imagen !== '') ? 'ocultar' : '' ?>" src="
        <?= Config::URL_IMAGENES . "/" . $this->perro->imagen ?>
        " alt="Imagen del perrete">
       
        
    </div>



    <div class="info_campo">
        <label class="info_label">Raza  :</label>
        <p class="info_text"><?= $this->perro->raza ?></p>
        
    </div>

    <div class="info_campo">
        <label class="info_label">Tamaño :</label>
        <p class="info_text"><?= $this->perro->tamaño ?> </p>
    </div>

    <div class="info_campo">
        <label class="info_label">edad :</label>
        <p class="info_text"><?= $this->perro->edad ?> </p>
    </div>

    <div class="info_campo">
        <label class="info_label">Peso :</label>
        <p class="info_text"><?= $this->perro->peso ?> </p>
    </div>

    <div class="info_campo">
        <label class="info_label">Color :</label>
        <p class="info_text"><?= $this->perro->color ?> </p>
    </div>

    
</div>