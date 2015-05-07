<h1>Posts</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Content</th>
        <th>Date</th>
    </tr>

    <?php foreach($this->posts as $post): ?>
        <tr>
            <td><?php echo $post[0] ?></td>
            <td><?php echo htmlspecialchars($post[1]) ?></td>
            <td><?php echo $post[2] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/books/index/<?= $this->page - 1 ?>/<?= $this->pageSize?>">Previous</a>
<a href="/books/index/<?= $this->page + 1 ?>/<?= $this->pageSize?>">Next</a>