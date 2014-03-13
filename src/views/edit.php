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
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <div class="form-group <?php if (isset($errorField) && (in_array('title', $errorField))) echo 'has-error'; ?>">
            <label for="title">Title*</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="<?php echo $result['title']; ?>">
        </div>
        <div class="form-group <?php if (isset($errorField) && (in_array('url', $errorField))) echo 'has-error'; ?>">
            <label for="url">URL*</label>
            <input type="title" class="form-control" name="url" id="url" placeholder="Enter URL" value="<?php echo $result['url']; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" rows="3" name="description"><?php echo $result['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" rows="10" name="body"><?php echo $result['body']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="title" class="form-control" name="author" id="author" placeholder="Enter author" value="<?php echo $result['author']; ?>">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>