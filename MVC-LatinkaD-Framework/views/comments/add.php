<div class="container">
    <form action="/comments/add" method="POST">
        <h1>Add comment</h1>
        <input type="text" name="comment"
               value="<?php echo $this->getFieldValue('comment') ?>"/>
        <br />
        <input type="submit" value="Add" class="button"/>
    </form>
</div>