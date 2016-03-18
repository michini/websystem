<div class="modal fade bs-example-modal-sm" id="modal" aria-labelledby="mySmallModalLabel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Definir filmador para evento.</h4>
            </div>
            <div class="modal-body">
                <?php foreach($filmadores as $filmador): ?>
                    <div class="checkbox">
                        <label for="<?php echo e($filmador->id); ?>" class="btn btn-link">
                            <input class="chk" type="checkbox" id="<?php echo e($filmador->id); ?>" value="<?php echo e($filmador->id); ?>" name="filmadores[]" text="<?php echo e($filmador->nombre); ?>"/>
                            <?php echo e($filmador->nombre); ?>

                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>