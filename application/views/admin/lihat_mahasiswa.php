<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header"><?php echo $pageTitle;?></h1>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover"
									id="tableMahasiswa">
									<thead>
										<tr>
											<th>NIM</th>
											<th>Nama</th>
											<th>No. Handphone</th>
											<th>Status</th>
											<th>No. BRI</th>
											<th>Email</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach ($listMahasiswa as $itemMahasiswa){
											echo $itemMahasiswa;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
