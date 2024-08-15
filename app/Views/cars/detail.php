<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Car</h2>
            <div class="card mt-2" style="width: 25rem;">
                <img src="/img/<?= $cars['picture']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $cars['car']; ?></h5>
                    <p class="card-text"><b>Type : </b><?= $cars['type']; ?></p>
                    <p class="card-text"><b>Price : </b>Rp. <?= $cars['price']; ?></p>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <br><br>
                    <a href="/cars" class="btn btn-primary">&laquo; Back to car list</a>
                    <!-- style=" text-decoration: none; " class=" underline-on-hover -->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>