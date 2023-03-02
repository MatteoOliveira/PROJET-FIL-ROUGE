<h1>Confirmation de la suppression du contact n°<?= $contact->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>Nom : </strong> <?= $contact->getName() ?>
    </li>
    <li class="list-group-item">
        <strong>Email : </strong> <?= $contact->getEmail() ?>
    </li>
    <li class="list-group-item">
        <strong>Message : </strong> <?= $contact->getMess() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("contact", "liste") ?>" class="btn-btn-danger">Annuler</a>
    </div>
</form>