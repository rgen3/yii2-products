<?php

use rgen3\product\backend\Module as M;


$this->title = M::t('product', 'Update product item');

?>


<div class="blog-category-update">

    <?= $this->render('_form', ['model' => $model]); ?>

</div>
