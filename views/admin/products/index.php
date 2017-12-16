<?php

use app\models\Category;
use app\models\Product;
use app\models\Tag;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'category_id',
                'label' => 'Category',
                'filter' => Category::find()->select(['name','id'])->indexBy('id')->column(),
                'value' => 'category.name',
            ],

            'name',
            'content:ntext',
            'price',
            [
                'label' => 'Tags',
                'attribute' => 'tag_id',
                'filter' => Tag::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => function (Product $product) {
                    if(empty($product->tags))
                    {
                    return 'Теги отсуствуют';

                    }else{

                        return implode(', ', ArrayHelper::map($product->tags, 'id', 'name'));
                    }

                },
            ],
            [
                    'attribute' => 'active',
                    'filter' => [0 => 'No', 1 => 'Yes'],
                    'format' => 'boolean',

            ],

            // 'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
