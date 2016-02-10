
<div class="col-lg-12 well">
		<center><h4>Resources<h4></center>
		<div class="row">
			<form class="form" id="form" action="rolepost.php" method="post">
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Resources</h6></center></label>
						<div class="col-sm-4">
							<select class="form-control" name="name" id="name">
								<?php 
									$value = $objName->viewResource();
									for($i=0; $i<count($value); $i++) {
									?> <option><?php echo $value[$i]; ?></option> <?php
									}
								?>
							</select>
						</div>
						<div class="form-group col-sm-4">	
							<center><button type="submit" id="delete" class="btn btn-sm btn-danger" name="delete" value="delete">Delete</button></center>	
						</div >	
					</div>
				</div>
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Add</h6></center></label>
						<div class="col-sm-4">
							<input type="text" name="recource" id="resource"/>
						</div>
						<div class="form-group col-sm-4">	
							<center><button type="submit" id="add" class="btn btn-sm btn-info" name="add" value="add">Add</button></center>	
						</div >	
					</div>
				</div>
				<div class="col-sm-12 row">	
					<div class="col-sm-3"></div>
					
						
				</div>	
			</form> 
		</div>
	</div>