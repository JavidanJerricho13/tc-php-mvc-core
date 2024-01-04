<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseField {

    public Model $model;
    public string $attribute;

    abstract public function renderInput(): string;

    public function __construct(Model $model, $attribute) {
        $this->model = $model;
        $this->attribute = $attribute;
    }


    public function __toString() {
        $invalidFeedback = '';
        if ($this->model->hasError($this->attribute)) {
            $invalidFeedback = sprintf('<div class="invalid-feedback">%s</div>', $this->model->getFirstError($this->attribute));
        }

        return sprintf('<div class="mb-3">
               <label>%s</label>
               %s
               %s
           </div>',
            $this->model->getLabels($this->attribute),
            $this->renderInput(),
            $invalidFeedback
        );
    }
}