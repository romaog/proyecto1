<main class="main-page">
    <h2 class="main-page_titulo">Editar Perro</h2>

    <div class="data-container">
        <div>
            <img class="form_img" class="<?= !(isset($this->imagen) && 
            $this->imagen !== '') ? 'ocultar' : '' ?>" 
            src="<?= Config::URL_IMAGENES . "/" .
             $this->imagen ?>" alt="Imagen del perro">
        </div>
        <div>
            <?php include "perro_form.php" ?>
        </div>
    </div>
    <div class="main-page_nav main-page_nav-flotante">
        <a class="main-page_link" href="<?= $this->url_back ?>">Volver</a>
    </div>
</main>