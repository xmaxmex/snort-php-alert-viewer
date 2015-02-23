<?php

include "top.html";

?>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Snort Firewall 1.0.0</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>

            <li><a href="sobre.php">Sobre</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">



      <div class="starter-template">
       <br><br> <h1>Alerts</h1>
<!--
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>

-->
      </div>


<?php

//phpinfo();

$tipo=$_GET["tipo"];


$ret=shell_exec("tail -50 /var/log/snort/alert > /tmp/.snort");


echo "<b>Data: </b>".date("d/m/Y H:i:s ");
echo "<br><br>";




//echo "<table class='table'>";
echo "<table class='table table-striped table-bordered'>";

//echo "".$ret."";
echo "<thead>
          <tr>
            <th>Timestamp</th>
            <th>U*</th>
            <th>id</th>
	    <th>Alert raw</th>
          </tr>
        </thead>
        <tbody>";


$fn = fopen("/tmp/.snort","r") or die("fail to open file");



while($row = fgets($fn)) {
  //list( $sN, $sregra, $sIN, $sOUT ) = explode( " ", $row );
  $pr = explode(" ", $row);

	// IN
	//$in = explode("=",$pr[0]);

/*
	echo"
	<tr>
            <th>".$pr[0]."</th>
            <td>".$pr[1]."</td>
            <td>".$pr[2]."</td>
            <td>".$pr[11]."</td>
	    <td>".$pr[3]."</td>
	    <td>".$pr[12]."</td>
	    <td>".$pr[4]."</td>
	    <td>".$pr[13]."</td>
          </tr>";
*/

       echo"
        <tr>
            <th>".$pr[0]."</th>
            <td>".$pr[2]."</td>
            <td>".$pr[3]."</td>
            <td>".$pr[4]." ".$pr[5]." ".$pr[6]." ".$pr[7]." ".$pr[8]." ".$pr[9]." ".$pr[10]." ".$pr[11]." ".$pr[12]." ".$pr[13]." ".$pr[14]." ".$pr[15]." ".$pr[16]." ".$pr[17]." ".$pr[18]." ".$pr[19]." ".$pr[20]." ".$pr[21]."</td>";


/*
            <td>".$pr[4]."</td>
          </tr>";
*/



  //echo 'Name:' . $sName . '<br />';
  //echo 'Sex:' . $sSex . '<br />';
  //echo 'Blood type:' . $sBlood . '<br />';
  //echo 'City:' . $sCity . '<br />';



}

fclose( $fn );

echo "</tbody>";

echo "</table>";

?>





</div>


</body>
</html>

