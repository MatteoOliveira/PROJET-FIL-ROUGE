<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($contact as $contact) : ?>
            <tr>
                <!-- Table Row -->
                <td>
                    <?= $contact->getId() ?>
                </td>
                <td>
                    <?= $contact->getName() ?>
                </td>
                <td>
                    <?= $contact->getEmail() ?>
                </td>
                <td>
                    <?= $contact->getMess() ?>
                </td>
                <td>
                    <a href="<?= lien("contact", "modifier", $contact->getId()) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("contact", "supprimer", $contact->getId()) ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>