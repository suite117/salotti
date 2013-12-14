<?php
$general->logged_out_protect();

/* Eventuali manipolazioni del bean prima del render vanno fatte qui */
//$product = $products->get_single_product('nome', 1);
$product['immagine'] = curURL() .'image.php?path=images/' . (isset($product['immagine']) ?  $product['immagine'] : 'default.png');

if ($category_name == 'divani')
  $product['model2d'] = 'images/letto2d.jpg';
elseif ($category_name == 'letti')
$product['model2d'] = 'images/letto2d.jpg';


$options = $options_dao->get_options_by_product_id($product['id']);
//var_dump($options);

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
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h2>
            <?= ucfirst($product['nome']) ?>
          </h2>
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
            src="<?= curURL() .'image.php?path=images/vista.png' ?>">
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
                      <td style="text-align: center"><?=ucfirst($options[$i]['option_name']) ?></td>
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


          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                  href="#collapseOne"> Scheda tecnica </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse colored">
              <div class="panel-body">
                <?= @$product['schedatecnica']; ?>
              </div>
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



