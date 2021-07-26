<?php get_header("delete-course") ?>
<?php
$class = get_class_by_id();
// show_array($class);
// echo $class['class_id']; 
?>


<form onload="modalDelete()" class="modalDelete" tabindex="-1" role="dialog" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-pink-light">
                <h5 class="modal-title font-weight-bold">Confirmation</h5>
                <input type="submit" class="close" value="&times;" name="btn-exist" id="btn-exist">
                    
                
            </div>
            <div class="modal-body bg-pink-light">
                <h6 class="text-pink-strong">Are you sure you want to remove course <b><?php echo $class['subject']?></b> ?</h6>
            </div>
            <div class="modal-footer bg-pink-light">
                <input type="submit" class="btn btn-edit" name="btn-remove-course" value="Remove">
                <input type="submit" class="btn btn-delete" name="btn-cancel" value="Cancel">

            </div>
        </div>
    </div>
</form>



<?php get_footer() ?>
