<li>
    <a href="#" onclick="loadCategory(<?= $category['categories_id'] ?>)">
        <?= 'Category - ' . $category['categories_id']?>
        <?php if( isset($category['childs']) ): ?>
            (*)
        <?php endif;?>
        
        <?php if($category['count_goods']){
            echo '[Goods - ' . $category['count_goods'] . ']';
        } ?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>