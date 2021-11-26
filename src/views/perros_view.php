

<main class="main-page">
    <h2 class="main-page_titulo">Catalogo de perretes</h2>
    
    <div class="card-container">
        <?php foreach ($this->perros as $perro) { ?>
            <article class="card">
                <h3 class="card_titulo"><?= $perro->raza ?></h3>
                <div class="card_body">
                    <p class="card_text"><?= $perro->tamaño ?></p>
                    <p class="card_text card_text-right card_text-bold">
                        Edad: <?= $perro->edad ?></p>
                    <p class="card_text card_text-right card_text-bold">
                        Peso: <?= $perro->peso ?></p> 
                    <p class="card_text card_text-right card_text-bold">
                        Color: <?= $perro->color ?></p>        
                </div>
                <div class="card_footer">
                    <a class="card_link" href='perros/info/<?= $perro->id ?>'>Info</a>
                    <a class="card_link <?= $this->classEnlaces ?>" href="perros/delete/<?= $perro->id ?>">Eliminar</a>
                    <a class=" card_link <?= $this->classEnlaces ?>" href="perros/edit/<?= $perro->id ?>">Editar</a>
                </div>
            </article>
        <?php } ?>
    </div>
    <div class="main-page_nav main-page_nav-flotante"><br>
        <a class="main-page_link <?= $this->classEnlaces ?>" href="<?= $this->url_nuevo ?>">Agregar Nuevo</a>
    </div>
</main>