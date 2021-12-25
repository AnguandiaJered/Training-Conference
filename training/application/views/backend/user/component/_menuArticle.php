<!-- recherche -->
<div class="col-md-12">
  <!-- Input -->
  <form class="input-group">
    <input type="search" class="form-control search_text" placeholder="Rechercher..." aria-label="Rechercher...">

    <div class="input-group-append">
      <button type="button" class="btn btn-hub"><i class="fa fa-search"></i></button>
    </div>


  </form>
  <div class="dropdown-divider text-danger"></div>
 <!-- End Input -->
</div>
<!-- fin -->

<!-- publicite -->
<div class="col-md-12">
  <div class="row">

    <?php 
      if ($padding_articles->num_rows() <=0) {
        # code...
      }
      else{
        foreach ($padding_articles->result_array() as $key) {

          $vues  =  $this->db->query("SELECT COUNT(idart) AS total FROM vues WHERE idart=".$key['idart']." ");
          if ($vues->num_rows() <=0) {
            $nombre_vue2 = 0;
          }
          else{
            foreach ($vues->result_array() as $key_vue) {
              $nombre_vue2 = $key_vue['total'];
            }
          }
          
          ?>

          <div class="post-item small col-md-12">
            <div class="row">
              <div class="col-sm-4 col-xs-3">
                <div class="img-thumb">
                  <a href="<?php echo(base_url())?>home/blog/<?php echo($key['idart'])?>">
                    <img src="<?php echo(base_url())?>upload/article/<?php echo($key['image'])?>" alt="IMG" class="img img-responsive img-thumbnail" style="border-color:#DC4405;">
                  </a>
                </div>
              </div>
              <div class="col-sm-8 col-xs-9 no-padding-left">
                <div class="post-content">
                  <a href="<?php echo(base_url())?>home/blog/<?php echo($key['idart'])?>"><h5> <?php echo (substr($key['nom'], 0,50)); ?> ...</h5></a>
                  <div class="post-info clearfix">
                    <span>  <?= nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23));?></span>
                  <span>-</span>
                  <span> <i class="fa fa-eye"></i> <?php echo($nombre_vue2) ?> </span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <hr>
              </div>

            </div>
          </div>



                
          <?php
        }

        
      }

     ?>
              

  </div>
</div>
<!-- fin -->