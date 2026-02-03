<!-- Modal Edit -->
<div class="modal fade" id="edit<?php echo $results['id']; ?>" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить запись</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $results['id']; ?>">
                    <small>Имя</small>
                    <div class="form-group">
                        <label>
                            <input type="text" class="form-control" name="name"
                                   value=' <?php echo $results['name'] ?>'>
                        </label>
                    </div>
                    <small>Email</small>
                    <div class="form-group">
                        <label>
                            <input type="text" class="form-control"
                                   name="email" value=' <?php echo $results['email'] ?> '>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Закрыть
                        </button>
                        <button type="submit" class="btn btn-primary" name="edit">Изменить</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->