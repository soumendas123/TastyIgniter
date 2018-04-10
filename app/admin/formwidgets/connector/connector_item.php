<div
    id="<?= $this->getId('item-'.$index) ?>"
    class="panel panel-default"
    data-item-index="<?= $index ?>"
>
    <div
        class="panel-heading"
        role="button"
        data-toggle="collapse"
        data-parent="#<?= $this->getId('items') ?>"
        href="#<?= $this->getId('item-collapse-'.$index) ?>"
        aria-expanded="true"
        aria-controls="<?= $this->getId('item-'.$index) ?>">
        <h4 class="panel-title">
            <?php if (!$this->previewMode AND $sortable) { ?>
                <button class="btn btn-handle <?= $this->getId('items') ?>-handle">
                    <i class="fa fa-sort"></i>
                </button>
            <?php } ?>
            <button
                type="button"
                class="btn btn-danger btn-outline pull-right"
                aria-label="Remove"
                data-request="<?= $this->getEventHandler('onRemoveItem') ?>"
                data-request-data="menu_option_id: <?= $widget->data->{$this->valueFromName} ?>"
                <?php if (!$this->previewMode) { ?>
                    onclick="$(this).closest('#<?= $this->getId('item-'.$index) ?>').remove();"
                <?php } ?>
            >
                <span aria-hidden="true">X</span>
            </button>
            <span><?= array_get($fieldOptions, $widget->data->{$keyFromName}) ?></span>
        </h4>
    </div>
    <div
        id="<?= $this->getId('item-collapse-'.$index) ?>"
        class="panel-collapse collapse <?= ($index == 0) ? 'in' : ''; ?>"
        role="tabpanel"
        data-control="formwidget">

        <div class="panel-body">
            <?php foreach ($widget->getFields() as $field) { ?>
                <?= $widget->renderField($field) ?>
            <?php } ?>
        </div>

        <input type="hidden" name="<?= $sortableName ?>" value="<?= $index; ?>">
    </div>
</div>