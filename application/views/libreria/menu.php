<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<title>The Start</title>




<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/recursos/bootstrap.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?=base_url()?>/recursos/jquery.js"></script>
<script src="<?=base_url()?>/recursos/popper.js"></script>
<script src="<?=base_url()?>/recursos/bootstrap.js"></script>
<script src="<?=base_url()?>/recursos/fontawesome.js"></script>
<script src="<?=base_url()?>/recursos/jquery-1.12.4.js"></script>
<script src="<?=base_url()?>/recursos/jquery-ui.js"></script>



<div style="background-color: #00BFFF;">
    


    <nav class="navbar navbar-expand-lg navbar-light" style="width: 80%;margin: auto;">
        <a class="navbar-brand" href="/proyecto/inicio/" style="margin-right: 10px"><span style="color:#2b2b2b;font-size:30px; font-family:Courier New;padding-right: 100px;margin-right: 10px" id="titulo_menu">The Start</span></a>
      


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id="select_menu"></span>
        </button>
      

        <div class="collapse navbar-collapse" id="navbarText"  style="background-color: #00BFFF">
            <ul class="navbar-nav mr-auto ">

                <li class="nav-item ">
                    <a class="nav-link" href="<?=base_url()?>./inicio/" style="margin-right: 10px"><i style="color:#2b2b2b; font-size: 20px; margin-right: 5px" class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?=base_url()?>./articulo?sexo=Mujer" style="margin-right: 10px"><i style="color:#2b2b2b; font-size: 20px; margin-right: 5px" class="fas fa-female"></i> Mujer</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?=base_url()?>./articulo?sexo=Hombre" style="margin-right: 10px"><i style="color:#2b2b2b; font-size: 20px; margin-right: 5px" class="fas fa-male"></i> Hombre</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?=base_url()?>./articulo?sexo=Nino" style="margin-right: 10px"><i style="color:#2b2b2b; font-size: 16px; margin-right: 5px" class="fas fa-child"></i> Niño</a>
                </li>

                <?php if ($this->session->sesion && $this->session->privilegio=="root"): ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?=base_url()?>./admin/" style="margin-right: 10px"><i style="color:#2b2b2b; font-size: 16px; margin-right: 5px" class="fas fa-clipboard"></i> Administración</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?=base_url()?>./informe/" style="margin-right: 10px"><i style="color:#2b2b2b; font-size: 16px; margin-right: 5px" class="fas fa-list-alt"></i> Informe</a>
                    </li>
                <?php endif;?>


            </ul>


            <span class="navbar-text">
                <a class="navbar-brand" href="<?=base_url()?>./cesta/">
                    <span class="fa-layers fa-fw" style="font-size: 40px;">
                        <i style="color: #2b2b2b;font-size: 30px;" class="fas fa-shopping-basket"></i>
                        <?php if ($this->session->id_usuario!="") :?>
                            <span class="fa-layers-counter" style="background: red"><?=$cesta[0]['num_cesta']?></span>
                        <?php endif ;?>
                    </span>
                </a>
            </span>
            <span  class="navbar-text">
                <?php if ($this->session->id_usuario!="") :?>
                    <?=strtoupper($this->session->nombre);?> / <a href="<?=base_url()?>./login/logout">Log out</a>
                <?php else :?>
                    <a href="<?=base_url()?>./login">Log in</a>
                <?php endif ;?>
            </span>

        </div>
    </nav>

</div>



