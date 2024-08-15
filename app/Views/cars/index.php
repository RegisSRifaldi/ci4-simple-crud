<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">List Cars</h1>
            <a href="/car/create" class="btn btn-primary my-3">Add Car</a>
            <?php if (session()->getFlashdata('message')) : ?>
                <div id="flash-message" class="alert alert-success mb-3" role="alert">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
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
                            <td><?= $i++; ?></td>
                            <td><?= $c['car']; ?></td>
                            <td><img src="/img/<?= $c['picture']; ?>" alt="" class="cover"></td>
                            <td><?= $c['price']; ?></td>
                            <td><a href="/car/<?= $c['slug']; ?>" class="btn btn-success">Details</a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        let flashMessage = document.getElementById("flash-message");
        if (flashMessage) {
            flashMessage.style.transition = "opacity 0.5s ease-out";
            flashMessage.style.opacity = 0;
            setTimeout(function() {
                flashMessage.style.display = "none";
            }, 500);
        }
    }, 3000);
</script>

<?= $this->endSection() ?>