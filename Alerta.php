<?php
function mostrarAlerta($Tipo){
 
   	if(isset($_SESSION[$Tipo])){

   	
   			echo "<div class='alert alert-sucess'>";
   	        echo $_SESSION[$Tipo];
            echo"</div";

            unset($_SESSION[$Tipo]);
              

}


}
?>