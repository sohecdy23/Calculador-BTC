
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
        <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="estilos.css" type="text/css" />
        <title>Calculos Btc</title>
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
                    <div class="navbar-header">
                       <a href="" class="navbar-brand">Calcular bitcoins</a>
                    </div>
                    
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href=""> Compra bitcoins</a></li>
                            <li><a href="venta.php"> Venta bitcoins</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div><br>
        
                <?php
                echo'<div class= "container">';
                $urldt = "https://s3.amazonaws.com/dolartoday/data.json";
                $jsondt = file_get_contents($urldt);
                $arraydt = json_decode($jsondt, true);
                $dolartoday = $arraydt["USD"]["dolartoday"];
                echo "<h3><strong> DolarToday: $dolartoday</strong></h3>".'<br>';
                echo '</div>';
                ?>
        
        <div class="container text-justify">
        <form id="form1" action="" method="GET" name="form1" class="form-inline">
            <br><br>
            <div class="form-group">
            <label for="metodo">Metodo de pago:</label>
            </div>
            
            <div class="form-group" >
            <input class="form-control" type="text" name="metodo" autofocus required onkeypress="return soloLetras(event);">
            </div>
            
            <div class="form-group">
            <button class="btn btn-primary" name="consultar" type="submit">Consultar</button>
            </div>
            <br><br><br>
        </form>
        
<?php
      switch (strtolower($_GET['metodo'])) {
         case 'paypal':
               $metodo = $_GET['metodo'];
               $url = "https://localbitcoins.com/buy-bitcoins-online/usd/paypal/.json";
               $json = file_get_contents($url);
               $array = json_decode($json, true);
               
               $contador = 0;
               $Limite_Ofertas = 4;
               $Cantidad_Ofertas = $array["data"]["ad_count"];
               
               while($contador < $Limite_Ofertas && $contador < $Cantidad_Ofertas){
                    echo '<div class="col-sm-3">';
                    $porcentaje = $array["data"]["ad_list"][$contador]["data"]["profile"]["name"];
                    echo "Porcentaje de exito: $porcentaje".'<br>';
                    $precio = $array["data"]["ad_list"][$contador]["data"]["temp_price"];
                    echo "Precio bitcoins: $precio".'<br>';
                    $rangom = $array["data"]["ad_list"][$contador]["data"]["min_amount"];
                    echo "Rango minimo: $rangom".'<br>';
                    $rangoM = $array["data"]["ad_list"][$contador]["data"]["max_amount"];
                    echo "Rango maximo: $rangoM".'<br>';
                    $metodopago = $array["data"]["ad_list"][$contador]["data"]["online_provider"];
                    echo "Metodo de pago: $metodopago".'<br>';
                    $moneda = $array["data"]["ad_list"][$contador]["data"]["currency"];
                    echo "Moneda: $moneda".'<br>';
                    $contador++;
                    echo '</div>'; 
               } 
                echo'.';
                echo"<h3><strong> Calculos Btc  </strong></h3>";
                
                    $urlsell = "https://localbitcoins.com/sell-bitcoins-online/VE/venezuela/.json";
                    $jsonsell = file_get_contents($urlsell);
                    $arraysell = json_decode($jsonsell, true);
    
                $contadorsell = 0;
                $limitesell = 8;
                $cantidadsell = $arraysell["data"]["ad_count"];
                
                while($contadorsell < $limitesell && $contadorsell < $cantidadsell){
                    echo '<div class="col-sm-6">';
                    
                    $preciosell = $arraysell["data"]["ad_list"][$contadorsell]["data"]["temp_price"];
                    echo "Precio en Bsf: $preciosell".'<br>';
                    
                    $banco = $arraysell["data"]["ad_list"][$contadorsell]["data"]["bank_name"];
                    $banesco = strpbrk($banco, 'Banesco');
                    echo "Banco: $banesco".'<br><br>';
                    
                    $contadorsell++;
                    echo'</div>';
                    
                    $precioalto = $arraysell["data"]["ad_list"][0]["data"]["temp_price"];
                   
                }
                
                echo'
                <div class="container">
                <br><br><br>
                <form id="form2" action="" method="POST" name="form2" class="form-inline">
                <br><br><br>
                <div class="form-group">
                   <label for="cantidad">Cantidad $:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" name="cantidad" required onKeyPress="return SoloNumeros(event);">
                </div>
                
                <div class="form-group">
                   <label for="preciod">Precio Btc en Bsf:</label>
                </div>
            
                <div class="form-group" >
                <input class="form-control" type="text" value="'.$precioalto.'"  name="preciod" required onKeyPress="return SoloNumeros(event);">
                </div>
            
                <div class="form-group">
                   <button class="btn btn-primary" name="calcular" type="submit">Calcular</button>
                </div>
                <br><br><br>
                </form>
                </div>';
                
            break;
          
       
       case 'payoneer':
             $metodo = $_GET['metodo'];
             $url = "https://localbitcoins.com/buy-bitcoins-online/usd/payoneer/.json";
             $json = file_get_contents($url);
             $array = json_decode($json, true);
             $contador = 0;
             $Limite_Ofertas = 4;
             $Cantidad_Ofertas = $array["data"]["ad_count"];
             
             while($contador < $Limite_Ofertas && $contador < $Cantidad_Ofertas){
                 echo '<div class="col-sm-3">';
                 $porcentaje = $array["data"]["ad_list"][$contador]["data"]["profile"]["name"];
                 echo "Porcentaje de exito: $porcentaje".'<br>';
                 $precio = $array["data"]["ad_list"][$contador]["data"]["temp_price"];
                 echo "Precio bitcoins: $precio".'<br>';
                 $rangom = $array["data"]["ad_list"][$contador]["data"]["min_amount"];
                 echo "Rango minimo: $rangom".'<br>';
                 $rangoM = $array["data"]["ad_list"][$contador]["data"]["max_amount"];
                 echo "Rango maximo: $rangoM".'<br>';
                 $metodopago = $array["data"]["ad_list"][$contador]["data"]["online_provider"];
                 echo "Metodo de pago: $metodopago".'<br>';
                 $moneda = $array["data"]["ad_list"][$contador]["data"]["currency"];
                 echo "Moneda: $moneda".'<br><br>';
                 $contador++;
                 echo '</div>';
                 
            }
            
            echo'.';
                echo"<h3><strong> Calculos Btc  </strong></h3>";
                
                    $urlsell = "https://localbitcoins.com/sell-bitcoins-online/VE/venezuela/.json";
                    $jsonsell = file_get_contents($urlsell);
                    $arraysell = json_decode($jsonsell, true);
    
                $contadorsell = 0;
                $limitesell = 8;
                $cantidadsell = $arraysell["data"]["ad_count"];
                
                while($contadorsell < $limitesell && $contadorsell < $cantidadsell){
                    echo '<div class="col-sm-6">';
                    $preciosell = $arraysell["data"]["ad_list"][$contadorsell]["data"]["temp_price"];
                    echo "Precio en Bsf: $preciosell".'<br>';
                    
                    $banco = $arraysell["data"]["ad_list"][$contadorsell]["data"]["bank_name"];
                    $buscarbanesco =  strpbrk($banco, 'Banesco');
                    echo "Banco: $buscarbanesco".'<br><br>';
                    
                    $contadorsell++;
                     echo'</div>';
                     $precioalto = $arraysell["data"]["ad_list"][0]["data"]["temp_price"];
                }
                
                echo'
                <div class="container">
                <br><br><br>
                <form id="form2" action="" method="POST" name="form2" class="form-inline">
                <br><br><br>
                <div class="form-group">
                   <label for="cantidad">Cantidad $:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" name="cantidad" required onKeyPress="return SoloNumeros(event);">
                </div>
                
                <div class="form-group">
                   <label for="preciod">Precio Btc en Bsf:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" value="'.$precioalto.'" name="preciod" required onKeyPress="return SoloNumeros(event);">
                </div>
            
                <div class="form-group">
                   <button class="btn btn-primary" name="calcular" type="submit">Calcular</button>
                </div>
                <br><br><br>
                </form>
                </div>';
                
            break;
              
       case 'neteller':
             $metodo = $_GET['metodo'];
             $url = "https://localbitcoins.com/buy-bitcoins-online/usd/neteller/.json";
             $json = file_get_contents($url);
             $array = json_decode($json, true);
             $contador = 0;
             $Limite_Ofertas = 4;
             $Cantidad_Ofertas = $array["data"]["ad_count"];
             
          
             while($contador < $Limite_Ofertas && $contador <= $Cantidad_Ofertas){
                 echo '<div class="col-sm-3">';
                 $porcentaje = $array["data"]["ad_list"][$contador]["data"]["profile"]["name"];
                 echo "Porcentaje de exito: $porcentaje".'<br>';
                 $precio = $array["data"]["ad_list"][$contador]["data"]["temp_price"];
                 echo "Precio bitcoins: $precio".'<br>';
                 $rangom = $array["data"]["ad_list"][$contador]["data"]["min_amount"];
                 echo "Rango minimo: $rangom".'<br>';
                 $rangoM = $array["data"]["ad_list"][$contador]["data"]["max_amount"];
                 echo "Rango maximo: $rangoM".'<br>';
                 $metodopago = $array["data"]["ad_list"][$contador]["data"]["online_provider"];
                 echo "Metodo de pago: $metodopago".'<br>';
                 $moneda = $array["data"]["ad_list"][$contador]["data"]["currency"];
                 echo "Moneda: $moneda".'<br><br>';
                 $contador++;
                 echo '</div>';
            }
             
             echo'.';
                echo"<h3><strong> Calculos Btc  </strong></h3>";
                
                    $urlsell = "https://localbitcoins.com/sell-bitcoins-online/VE/venezuela/.json";
                    $jsonsell = file_get_contents($urlsell);
                    $arraysell = json_decode($jsonsell, true);
    
                $contadorsell = 0;
                $limitesell = 8;
                $cantidadsell = $arraysell["data"]["ad_count"];
                
                while($contadorsell < $limitesell && $contadorsell < $cantidadsell){
                    echo '<div class="col-sm-6">';
                    $preciosell = $arraysell["data"]["ad_list"][$contadorsell]["data"]["temp_price"];
                    echo "Precio en Bsf: $preciosell".'<br>';
                    
                    $banco = $arraysell["data"]["ad_list"][$contadorsell]["data"]["bank_name"];
                    $buscarbanesco =  strpbrk($banco, 'Banesco');
                    echo "Banco: $buscarbanesco".'<br><br>';
                    
                    $contadorsell++;
                     echo'</div>';
                     $precioalto = $arraysell["data"]["ad_list"][0]["data"]["temp_price"];
                }
                
                echo'
                <div class="container">
                <br><br><br>
                <form id="form2" action="" method="POST" name="form2" class="form-inline">
                <br><br><br>
                <div class="form-group">
                   <label for="cantidad">Cantidad $:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" name="cantidad" required onKeyPress="return SoloNumeros(event);">
                </div>
                
                <div class="form-group">
                   <label for="preciod">Precio Btc en Bsf:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" value="'.$precioalto.'" name="preciod" required onKeyPress="return SoloNumeros(event);">
                </div>
            
                <div class="form-group">
                   <button class="btn btn-primary" name="calcular" type="submit">Calcular</button>
                </div>
                <br><br><br>
                </form>
                </div>';
            
        break;
           
      case'skrill':
            $metodo = $_GET['metodo'];
            $url = "https://localbitcoins.com/buy-bitcoins-online/usd/moneybookers-skrill/.json";
            $json = file_get_contents($url);
            $array = json_decode($json, true);
            $contador = 0;
            $Limite_Ofertas = 4;
            $Cantidad_Ofertas = $array["data"]["ad_count"];
             
          
            while($contador < $Limite_Ofertas && $contador <= $Cantidad_Ofertas){
                echo '<div class="col-sm-3">';
                $porcentaje = $array["data"]["ad_list"][$contador]["data"]["profile"]["name"];
                echo "Porcentaje de exito: $porcentaje".'<br>';
                $precio = $array["data"]["ad_list"][$contador]["data"]["temp_price"];
                echo "Precio bitcoins: $precio".'<br>';
                $rangom = $array["data"]["ad_list"][$contador]["data"]["min_amount"];
                echo "Rango minimo: $rangom".'<br>';
                $rangoM = $array["data"]["ad_list"][$contador]["data"]["max_amount"];
                echo "Rango maximo: $rangoM".'<br>';
                $metodopago = $array["data"]["ad_list"][$contador]["data"]["online_provider"];
                echo "Metodo de pago: $metodopago".'<br>';
                $moneda = $array["data"]["ad_list"][$contador]["data"]["currency"];
                echo "Moneda: $moneda".'<br><br>';
                $contador++;
                echo '</div>';
             }
             
             echo'.';
                echo"<h3><strong> Calculos Btc  </strong></h3>";
                
                    $urlsell = "https://localbitcoins.com/sell-bitcoins-online/VE/venezuela/.json";
                    $jsonsell = file_get_contents($urlsell);
                    $arraysell = json_decode($jsonsell, true);
    
                $contadorsell = 0;
                $limitesell = 8;
                $cantidadsell = $arraysell["data"]["ad_count"];
                
                while($contadorsell < $limitesell && $contadorsell < $cantidadsell){
                    echo '<div class="col-sm-6">';
                    $preciosell = $arraysell["data"]["ad_list"][$contadorsell]["data"]["temp_price"];
                    echo "Precio en Bsf: $preciosell".'<br>';
                    
                    $banco = $arraysell["data"]["ad_list"][$contadorsell]["data"]["bank_name"];
                    $buscarbanesco =  strpbrk($banco, 'Banesco');
                    echo "Banco: $buscarbanesco".'<br><br>';
                    
                    $contadorsell++;
                     echo'</div>';
                     $precioalto = $arraysell["data"]["ad_list"][0]["data"]["temp_price"];
                }
                
                echo'
                <div class="container">
                <br><br><br>
                <form id="form2" action="" method="POST" name="form2" class="form-inline">
                <br><br><br>
                <div class="form-group">
                   <label for="cantidad">Cantidad $:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" name="cantidad" required onKeyPress="return SoloNumeros(event);">
                </div>
                
                <div class="form-group">
                   <label for="preciod">Precio Btc en Bsf:</label>
                </div>
            
                <div class="form-group" >
                   <input class="form-control" type="text" value="'.$precioalto.'" name="preciod" required onKeyPress="return SoloNumeros(event);">
                </div>
            
                <div class="form-group">
                   <button class="btn btn-primary" name="calcular" type="submit">Calcular</button>
                </div>
                <br><br><br>
                </form>
                </div>';
        break;
                  
      }//fin switch
      

     if ($_POST['cantidad'] && ['preciod']) {
         echo '<div class="container text-justify">';
                  $preciod= $_POST['preciod'];
                  $cantidad= $_POST['cantidad'];
                  echo "Cantidad $ ingresada: $cantidad".'<br>';
                  echo "Precio del Btc en Bsf ingresada: $preciod".'<br>';
                  $preciosell = $arraysell["data"]["ad_list"][0]["data"]["temp_price"];
                  $MenorPrecio = $array["data"]["ad_list"][0]["data"]["temp_price"];
                  echo "Mejor oferta del Btc: $MenorPrecio".'<br>';
                  $calculo1 = $cantidad / $MenorPrecio;
                  echo "<strong> Cantidad de Btc: $calculo1</strong>".'<br>';
                  $calculo2 = $calculo1 * $preciod;
                  echo "<strong> Cantidad de Btc en Bsf: $calculo2</strong>".'<br><br>';
                  
                    
                };
?>
         <script type="text/javascript" src="script.js"></script>
         <script type="text/javascript" src="jquery.js"></script>
         <script type="text/javascript" src="bootstrap.min.js"></script>
    </body>
</html>

