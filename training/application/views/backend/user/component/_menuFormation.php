<!-- recherche -->
<div class="col-md-12">
  <!-- Input -->
  <form class="input-group">
    <input type="search" class="form-control search_text" placeholder="Rechercher..." aria-label="Rechercher une formation...">

    <div class="input-group-append">
      <button type="button" class="btn btn-dark"><i class="fa fa-search"></i></button>
    </div>


  </form>
  <div class="dropdown-divider text-danger"></div>
 <!-- End Input -->
</div>
<!-- fin -->

<!-- publicite -->
<div class="col-md-12">
  <div class="row">

    <!-- facebook -->
   <!--  <div class="col-md-12 mb-2">
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v12.0&appId=301499887887474&autoLogAppEvents=1" nonce="4cLx3YwJ"></script>

      <div class="fb-page" data-href="https://www.facebook.com/pages/category/Education/INSTITUT-NATIONAL-DE-PREPARATION-PROFESSIONNELLE-INPP-120330108055745/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pages/category/Education/INSTITUT-NATIONAL-DE-PREPARATION-PROFESSIONNELLE-INPP-120330108055745/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pages/category/Education/INSTITUT-NATIONAL-DE-PREPARATION-PROFESSIONNELLE-INPP-120330108055745/">INSTITUT NATIONAL DE PREPARATION PROFESSIONNELLE &quot;INPP&quot;</a></blockquote></div>

    </div> -->
    <!-- fin facebook -->
    <div class="col-md-12">
      <hr>
    </div>

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

          <div class="post-item small col-md-12 mt-2">
            <div class="row">
             
              <div class="col-sm-4 col-xs-3">
                <div class="img-thumb">
                  <a href="<?php echo(base_url())?>user/blog/<?php echo($key['idart'])?>">
                    <img src="<?php echo(base_url())?>upload/article/<?php echo($key['image'])?>" alt="IMG" class="img img-responsive img-thumbnail" style="border-color:#DC4405;">
                  </a>
                </div>
              </div>
              <div class="col-sm-8 col-xs-9 no-padding-left">
                <div class="post-content">
                  <a href="<?php echo(base_url())?>user/blog/<?php echo($key['idart'])?>"><h6> <?php echo (substr($key['nom'], 0,50)); ?> ...</h6></a>
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