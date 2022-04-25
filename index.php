<?php
    switch ($_GET['module']) {
        case 'controller_home':
            include("view/inc/top_page_home.html");
            break;
        case 'controller_shop':
            include("view/inc/top_page_shop.html");
            break;
        case 'controller_car':
            include("view/inc/top_page_car.html");
            break;
        case 'controller_login':
            include("view/inc/top_page_login.html");
            break;
        
        default:
            include("view/inc/top_page_home.html");
            break;
    }

?>
<div id="header">	
<?php
    include("view/inc/header.html");
?>        
</div>
<div id="pages">
<?php 
    include("view/inc/pages.php"); 
?>        
</div>
<div id="footer">
<?php
    include("view/inc/footer.html");
?>        
</div>