<?php

use rgen3\product\backend\Module as M;


$this->title = M::t('product', 'Add product item');

?>


<div class="blog-category-create">

    <?= $this->render('_form', ['model' => $model]); ?>

</div>
