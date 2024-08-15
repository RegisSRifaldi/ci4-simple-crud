<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">List Cars</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Car</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($cars as $c) : ?>
                        <tr>
                            <th scope="row"><?php $i++; ?></th>
                            <td><?= $c['car']; ?></td>
                            <td><img src="/img/<?= $c['picture']; ?>" alt="" class="cover"></td>
                            <td><?= $c['price']; ?></td>
                            <td><a href="/cars/<?= $c['slug']; ?>" class="btn btn-success">Details</a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>