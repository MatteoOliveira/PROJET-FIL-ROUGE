<h1>Confirmation de la suppression du contact n°<?= $projet->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>image : </strong> <?= $projet->getImg() ?>
    </li>
    <li class="list-group-item">
        <strong>description : </strong> <?= $projet->getDescription() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("projet", "liste") ?>" class="btn-btn-danger">Annuler</a>
    </div>
</form>