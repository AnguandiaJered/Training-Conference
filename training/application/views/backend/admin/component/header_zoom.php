<div class="col-md-12">
	<div class="row">

		<!-- en tête -->
        <div class="col-md-12">
          <div class="row">

            <form class="col-md-12 col-xs-12" method="post" id="user_form" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="row">

                  
                  <div class="col-md-12">
                  
                    <div class="row">
                      <div class="col-md-2">

                        <div class="col-md-12">

                           <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                   
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-refresh fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Actualialisation
                                    </a>
                                    <a class="dropdown-item add_button2" href="javascript:void(0);">
                                        <i class="fas fa-group fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Invité les amis
                                    </a>

                                    <a class="dropdown-item" target="_blank" href="<?php echo(base_url()) ?>admin/reunion">
                                        <i class="fas fa-video fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Démarer une reunion
                                    </a>

                                   
                                    
                                </div>
                            </li>
                          </ul>
                          
                        </div>
                        
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <div class="col-md-12 mb-4 mt-2"><div class="form-group">
                          <div class="input-group">
                           
                             <input type="text" name="search_text" id="search_text" placeholder="Rechercher un invité" class="form-control mr-1" />
                             <span class="input-group-addon btn btn-primary"><i class="fa fa-search mr-2"></i></span>
                             &nbsp;
                             <span class="input-group-addon btn btn-hub add_button_user"><i class="fa fa-group"></i>  Invité les amis</span>
                          </div>
                         </div>
                       </div>
                      </div>

                    

                    </div>
                    <hr>
                  </div>

                  
                  
                </div>
              </div>
              
            </form>

             <!-- resultat -->
            <div class="col-md-12 mb-2">
               
               <div class="col-md-12 table-responsive" id="country_table">
                
                
               </div>
               <div class="col-md-12">

                 <div align="right" class="col-md-12" id="pagination_link"></div>
                 
               </div>
            </div>
            <!-- fin resultat -->



            
          </div>
        </div>
        <!-- fin en-tete -->
		

	</div>
</div>