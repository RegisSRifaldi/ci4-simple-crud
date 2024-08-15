<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Car</h2>
            <?php if (session()->getFlashdata('message')) : ?>
                <div id="flash-message" class="alert alert-success mb-3" role="alert">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <div class="card mt-2" style="width: 25rem;">
                <img src="/img/<?= $cars['picture']; ?>" class="card-img-top" alt="cars">
                <div class="card-body">
                    <h5 class="card-title"><?= $cars['car']; ?></h5>
                    <p class="card-text"><b>Type : </b><?= $cars['type']; ?></p>
                    <p class="card-text"><b>Price : </b>Rp. <?= $cars['price']; ?></p>
                    <a href="/cars/<?= $cars['slug']; ?>" class="btn btn-warning">Edit</a>
                    <form action="/car/<?= $cars['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" required>
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Car</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this car?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <a href="/cars" class="btn btn-primary">&laquo; Back to car list</a>
                </div>
            </div>
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