<?php
    include "public/template/page-header.php";
    include "public/template/top-bar.php";
    include "public/template/left-sidebar.php";
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<form name="myform" id="myform" method="post" action="#" data-toggle="validator" role="form" enctype="multipart/form-data" autocomplete="off">
    <input id="view" name="view" value="" type="hidden" />
    <input id="viewpage" name="viewpage" value="" type="hidden" />
    <input id="keys" name="keys" value="" type="hidden" />
    <input id="microtime" name="microtime" value="<?php echo md5(microtime()); ?>" type="hidden" />
    <?php

        switch($pg){
            // case md5('blank'):
            //     include ("blank/platform.php");
            // break;
            default:
                include ("dashboard/platform.php");
            break;
        }
    ?>
</form>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php
    include "public/template/right-sidebar.php";
    include "public/template/page-footer.php";
?>
