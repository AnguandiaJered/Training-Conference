<div class="col-md-12">
	<div class="row">

      <div class="col-md-12">

          <div class="row">
            <div class="col-md-6 form-inline mb-2">
	           <select class="form-control" id="limit">
	              <option value="">Filtrage</option>
	              <option value="2">2</option>
	              <option value="10">10</option>
	              <option value="25">25</option>
	              <option value="50">50</option>
	              <option value="100">100</option>
	            </select>
	            &nbsp;&nbsp;
	            <a href="" class="btn btn-outline-warning mr-2"><i class="fa fa-refresh"></i></a>
	            <a href="javascript:void(0);" class="btn btn-hub btn-md  pull-left mt-4  mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</a>
		    </div>
            <div class="col-md-1 mt-4"></div>
            <div class="col-md-5 mt-4">

            	<div class="input-group mb-3">
				  <input type="text" class="form-control" placeholder="Recherche..." aria-label="Recipient's username" aria-describedby="basic-addon2" id="search_text">
				  <div class="input-group-append">
				    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search mr-2"></i></span>
				  </div>
				</div>

              
            </div>
          </div>
          
      </div>
      <!-- insertion de tableau -->
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
      <!-- fin insertion tableau -->
		
	</div>
</div>