<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Add Car</h2>
            <form action="/car/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="car" class="col-sm-2 col-form-label">Car</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" <?= ($validation->hasError('car')) ? 'is-invalid' : '' ?>id="car" name="car" autofocus value="<?= old('car'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('car') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="type" name="type" value="<?= old('type'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price" value="<?= old('price'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="picture" class="col-sm-2 col-form-label">Picture</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="picture" name="picture" value="<?= old('picture'); ?>" required>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" required>
                    Create
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Car</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to add the car data?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>