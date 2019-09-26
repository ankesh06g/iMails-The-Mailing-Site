<?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']))
        {
            echo "<link rel='stylesheet' href='../repository/css/forms.css' type='text/css'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-sm-3'></div>
                            <div class='col-sm-6'>";
                                    echo $_SESSION['message']; 
                    echo "  </div>
                            <div class='col-sm-3'></div>
                        </div>
                    </div>";
        }     
    else
    {
        header("location: ../");
    }
?>