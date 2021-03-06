<button type="button" class="btn btn-primary" data-item="<?= is_null($model)?null:$model->id?>" id="companyUpdate">
    <?= is_null($model)?"Создать":"Редактировать" ?>
</button>
<!-- Модальное окно -->
<div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?= is_null($model)?'Создать компанию':'Редактировать компанию' ?></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" data-item="<?= is_null($model)?null:$model->id?>" class="btn btn-primary" id="companySave">Сохранить</button>
            </div>
        </div>
    </div>
</div>