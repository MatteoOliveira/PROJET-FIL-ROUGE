<?php if (isset($erreurs)) : ?>
    <?php foreach ($erreurs as $champ => $message) : ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Ajouter un projet</h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="img"></label>
        <input type="file" name="img" id="img" class="form-control" required value="<?= !empty($img) ? $img->getImg() : "" ?>">
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" id="description" class="form-control" required value="<?= !empty($description) ? $description->getDescription() : "" ?>">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>