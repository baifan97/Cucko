<?php
/**
 * talk
 * 
 * @package custom
 *
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('includes/header.php'); ?>
     <main>
                <article class="content">
                 <h1><?php $this->title() ?></h1>

                    <div class="post">
                        <p class="md_block">
                         <?php $this->need('includes/comments.php'); ?>  
                        </p>
                    </div>

                </article>

       </main>
<?php $this->need('includes/footer.php'); ?>