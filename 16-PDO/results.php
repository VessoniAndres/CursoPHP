<div class="option">
    <?php
        //definimos el ancho de la barra como el porsentaje por 5, esto 
        //es para que como maximo ocupe 500px, ya que hay bastante espacio.
        $widthBar = $porcentaje * 5;

        $style = 'bar';
        if($survey -> getOptionSelected() == $renglon['lenguage']){
            $style = 'selected';
        }
        echo $renglon['lenguage'];
    ?>
    <div class="<?php echo $style; ?>" style="width: <?php echo $widthBar . 'px'; ?>"><?php echo $porcentaje . '%'; ?></div>
    

</div>