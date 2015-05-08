<div class="container">
    <div class="formContainer">
        <form action="/posts/add" method="POST" class="forms">
            <h1>New Post</h1>
            <textarea placeholder="Content.." name="content"
                   value="<?php echo $this->getFieldValue('content') ?>"></textarea>
            <?php echo $this->getValidationError('content'); ?>
            <br/>
            <input type="submit" value="Add"/>
        </form>
    </div>
</div>