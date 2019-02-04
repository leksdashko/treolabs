<li>
    <a href="#">
        <?= 'Category - ' . $category['categories_id']?>
        <?php if( isset($category['childs']) ): ?>
            (*)
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>