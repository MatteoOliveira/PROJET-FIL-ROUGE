<?php if (isset($erreurs)) : ?>
    <?php foreach ($erreurs as $champ => $message) : ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Ajouter un contact</h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="form-control" required value="<?= !empty($name) ? $contact->getName() : "" ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" required value="<?= !empty($email) ? $contact->getEmail() : "" ?>">
    </div>
    <div class="form-group">
        <label for="mess">Message</label>
        <input type="text" name="mess" id="mess" class="form-control" required value="<?= !empty($mess) ? $contact->getMess() : "" ?>">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>