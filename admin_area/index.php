<!DOCTYPE html>
<html>
    
    <head>
        
        <title>Admin Panel</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <?php include("includes/sidebar.php"); ?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <?php
                    
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                    }
                    
                    ?>
                    
                </div>
            </div>
        </div>
       
        
        <script src="js/jquery.min.js"></script>
        
        <script src="js/bootstrap.min.js"></script>
        
    </body>
    
</html>
