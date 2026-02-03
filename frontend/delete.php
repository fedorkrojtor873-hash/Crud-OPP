<!-- Modal Delete -->
<div class="modal fade" id="delete<?php echo $results['id']; ?>" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Удалить запись
                    № <?php echo $results['id']; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $results['id']; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Закрыть
                        </button>
                        <button type="submit" class="btn btn-primary" name="delete">Удалить</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->