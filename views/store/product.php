<?php
$general->logged_out_protect();

/* Eventuali manipolazioni del bean prima del render vanno fatte qui */
//$product = $products->get_single_product('nome', 1);
$product['immagine'] = curURL() .'image.php?path=images/' . (isset($product['immagine']) ?  $product['immagine'] : 'default.png');

if ($category_name == 'divani')
	$product['model2d'] = 'images/letto2d.jpg';
elseif ($category_name == 'letti')
$product['model2d'] = 'images/letto2d.jpg';


$options = $options_dao->get_options_by_type($product['type']);
var_dump($options);

?>
<!--  Da qui in poi ci vanno solo i bean -->

<div class="container">
  <div class="row">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default panel-header">
        <div class="panel-heading">
          <h4 class="panel-title">Configura il modello e richiedi il preventivo</h4>
        </div>
      </div>
    </div>
  </div>
  <div style="float: right">
    <a href="<?=curUrl()?>modifica/prodotto/<?= $product['id'] ?>.html"><button type="button" class="btn btn-default">Modifica</button>
    </a>
  </div>
  <div class="row">
    <div class="col-md-7 column-left">
      <div class="row">
        <div>
          <img class="img-responsive" src="<?=$product['immagine'] ?>">
        </div>
      </div>
      <div class="row">
        <div>
          <h1 class="page-header">
            <?=ucfirst($page_title) ?>
            <?='<small> '.$page_description.'</small>' ?>
          </h1>
          <p>
            <?= @$product['description'] ?>
          </p>
        </div>
      </div>
    </div>


    <div class="col-md-5 column-right">

      <div class="row">
        <div class="col-md-12">
          <img style="width: 450px; height: 260px" class="img-responsive"
            src="<?= curURL() .'image.php?path=' . @$product['model2d'] ?>">
        </div>
      </div>

      <div class="row">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default colored">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  Scegli la versione </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
              <div class="panel-body">
                <?php
                //$options=array("2 posti","laterale 2 posti","chaise longe","2 posti max","laterale 2 posti max","chaise longe max","laterale 3 posti","laterale 3 posti max");
                ?>

                <table class="table">
                  <tbody>
                    <tr>
                      <?php for ($i=0; $i< count($options); $i++) : ?>
                      <?php
                      if($i%3==0)
                      	echo '<tr>';
                      ?>
                      <td><a href="#"> <?=ucfirst($options[$i]['option_name']) ?>
                      </a></td>
                      <?php
                      if(($i+1)%3==0)
                      	echo '</tr>';
                      ?>
                      <?php endfor; ?>
                      <?php for ($i = 0; $i < 3 -count($options)%3; $i++)
                      	echo '<td></td>';
                      ?>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
          <!-- end Panel -->


          <div class="panel panel-default colored">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Scegli
                  il tessuto </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
              <div class="panel-body">

                <table class="table text-center">
                  <tbody>
                    <?php for($i = 0; $i < 21; $i++) : ?>
                    <?php if ($i % 7 == 0) : ?>
                    <tr>
                      <?php endif; ?>
                      <td style="padding: 7px;"><img style="width: 50px; height: 50px;"
                        src="http://placehold.it/750x350" />
                      </td>
                      <?php if (($i+1) % 7 == 0) :  ?>
                    </tr>
                    <?php endif; ?>
                    <?php endfor;?>
                  </tbody>

                </table>

              </div>
            </div>
          </div>
          <!-- end Panel -->


          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                  href="#collapseOne"> Scheda tecnica </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse colored">
              <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</div>
            </div>
          </div>
          <!-- end Panel -->

        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
