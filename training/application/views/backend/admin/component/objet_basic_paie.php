<div class="col-md-12">
  <div class="row mb-2">
      <div class="col-md-4">
            <button class="btn btn-hub btn-md  pull-left mt-2  mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4">
       <div class="col-md-12">
         <div class="row">
           <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                  
                   <input type="text" name="search_text" id="search_text" placeholder="Rechercher une transaction..." class="form-control mt-2 mr-1" value="<?php
                    if(isset($token)){
                      echo($token);
                    }
                    else{

                    }
                    ?>" />
                    <span class="input-group-addon  btn btn-hub mr-1" style="margin-top: 5px;"><i class="fa fa-search"></i> </span>
                </div>
              </div>
           </div>
         </div>
       </div>
      </div>
    </div>

    <div class="table-responsive" id="country_table" style="margin-top: 10px;">
                                
    </div>

    <div class="col-md-12 mb-2">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <nav class="pagination" id="pagination_link">
        
          </nav>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>


</div>

