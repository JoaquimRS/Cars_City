<?php
    if ((isset($_GET['module'])) && ($_GET['module']==="controller_car")){
        include("view/inc/top_page_car.html");
    }else {
        include("view/inc/index.html");
    }
?>
<div id="header">
   <?php
    //include("view/inc/index.html");
    ?>
</div>
<div id="menu">
    <?php
        include("view/inc/menu.php");
    ?>
</div>

<div id="pages">
    <?php
        include("view/inc/pages.php");
    ?>
</div>
<div id="footer">
    <?php
        include ("view/inc/footer.php");
    ?>
</div>


<!-- CSS generico -->
<link rel="stylesheet" href="view/css/style.css">
        <!-- CSS formurlario coche -->
        <link rel="stylesheet" href="view/css/car_form.css">
<!-- Jquery libreria $ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- Jquery-ui datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    	<script type="text/javascript">
            $(function() {
                $("#fmatri").datepicker({
                    dateFormat: 'dd/mm/yy', 
        			changeMonth: true, 
        			changeYear: true, 
        			yearRange: '1900:2022',
        			onSelect: function(selectedDate) {
                    }
        		});
        	});
            </script>


		<!-- Toastr -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

		<!-- ShowModal -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

		<!-- DataTables libreria-->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

		<!-- Toastr configuracion -->
		<script src="view/js/toastr.js"></script>
		<!-- Validador js -->
		<script src="module/car/model/validate_car.js"></script>
		<!-- Data-Translate -->
		<script src="view/js/translate.js"></script>
		<!-- Data-Table Local -->
		<script src="view/js/table.js"></script>