<?php
if (isset($msg)){
    if ($result){
        echo '<div class="alert alert-success">' . $msg . '</div>';
    }else{
        echo '<div class="alert alert-danger">' . $msg . '</div>';
    }
}
?>
<div class="container form">
    <form role="form" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <pre><?php echo $result['title']; ?></pre>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <pre><?php echo $result['url']; ?></pre>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <pre><?php echo $result['slug']; ?></pre>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <pre><?php echo nl2br($result['description']); ?></pre>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <pre><?php echo nl2br($result['body']); ?></pre>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <pre><?php echo $result['author']; ?>"</pre>
        </div>
    </form>
</div>