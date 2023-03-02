<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>image</th>
            <th>description</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($projet as $projet) : ?>
            <tr>
                <!-- Table Row -->
                <td>
                    <?= $projet->getId() ?>
                </td>
                <td>
                    <img src="data:image/jpeg;base64,<?= base64_encode($projet->getImg()) ?>" height="150px" width="150px" />
                </td>
                <td>
                    <?= $projet->getDescription() ?>
                </td>
                <td>
                    <a href="<?= lien("projet", "modifier", $projet->getId()) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("projet", "supprimer", $projet->getId()) ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>