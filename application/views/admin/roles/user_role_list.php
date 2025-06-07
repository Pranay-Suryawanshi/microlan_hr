
<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
      <?php } ?>
      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">User Role List</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">User Role List</li>
						</ol>
					</nav>
				</div>
				<!-- <div class="ms-auto">
					<div class="btn-group">
						<a href="<?php echo base_url();?>add-role" class="btn btn-primary">Add Role</a>
					</div>
				</div> -->
			</div>
			<!--end breadcrumb-->
			<div class="card">
				<div class="card-body">
					<div class="row"> 
						<div class="col-sm-12">
							<div class="btn-group" style="float: right">
									<a href="<?php echo base_url();?>add-role" class="btn btn-primary">Add Role</a>
							</div>
						</div>
						<div class="col-sm-12 mt-3">
							<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Action</th>
									<th>Sr.No.</th>
									<th>Name</th>





								</tr>
							</thead>
							<tbody>
							<?php foreach ($arr_role as $key => $val) { ?>
								<tr>
									<td class="">
										<div class="dropdown">
											<button class="dropbtn">
												<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
											</button>
											<div class="dropdown-content">
												<a href="<?php echo base_url(); ?>edit-role/<?php echo base64_encode($val['role_id']); ?>" style=" background-color: #007bff;color:white">
													<i class='fa fa-edit'></i> Edit</a>

											</div>
										</div>
									</td>

									<td><?php echo ($key + 1) ?></td>
									<td><?php echo $val['role_name']; ?></td>

								</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Action</th>
									<th>Sr. No.</th>

									<th>Role Name</th>
								</tr>
							</tfoot>
						</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--end page-content-wrapper-->
</div>
