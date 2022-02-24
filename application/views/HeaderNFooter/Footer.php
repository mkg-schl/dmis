<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Add all script and other footer source here! -->      
		<!-- Script Source Files -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
		
		<!-- Product Table Page -->
		<script>
			$(document).ready( function () {
    				$('#product_table').DataTable({
					"ajax": "<?php echo base_url('main/getProducts');?>", 
					 	columns : [
						{ "data" : 'productId' },
						{ "data" : 'productName' },
						{ "data" : 'productCategory' },
						{ "data" : 'productCondition' },
						{ "data" : 'productQuantity' },
						{ "data" : 'DateTime'},
						{ "data" : 'productId',
  						render: function ( data, type, row ) {
						var baseurl = '<?php echo base_url('') ?>';
						<?php if($this->session->userdata('level')==='1'):?>
    					return '<a href="'+baseurl+'main/edit/'+data+'" class="btn btn-primary">Edit</a> <a href="'+baseurl+'main/delete/'+data+'" class="btn btn-danger" <?php echo (($this->uri->segment(2)) == "edit" ? 'style="display:none;"' : null)?>> Delete</a>';
						<?php elseif($this->session->userdata('level')==='2'):?>
							return '<a href="'+baseurl+'main/edit/'+data+'" ></a> <a href="'+baseurl+'main/delete/'+data+'"  <?php echo (($this->uri->segment(2)) == "edit" ? 'style="display:none;"' : null)?>> </a>';
							<?php endif;?>
						}
						}
					]
				} );
			} );
		</script>

		<!-- Request Products Page Data Table Script -->
		<script>
			$(document).ready( function () {
    				$('#reqproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getProducts');?>", 
					 	columns : [
						{ "data" : 'productId' },
						{ "data" : 'productName' },
						{ "data" : 'productCategory' },
						{ "data" : 'productCondition' },
						{ "data" : 'productQuantity' },
						{ "data" : 'DateTime'},
						{ "data" : 'productId',
  						render: function ( data, type, row ) {
						var baseurl = '<?php echo base_url('') ?>';
    					return '<a href="'+baseurl+'main/reqproducts/'+data+'" class="btn btn-primary">Select Product</a>';
						}
						}
					]
				} );
			} );
		</script>

		<!-- Status Product Table Warehouse User -->
		<script>
			$(document).ready( function () {
    				$('#statusproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getRequests');?>", //echo base url needs to change
					 	columns : [
						{ "data" : 'reqproductId' },
						{ "data" : 'productId' },
						{ "data" : 'reqproductQuantity' },
						{ "data" : 'reqDateTime' },
						{ "data" : 'reqproductStatus' },
						//release product button insert here	
					]
				} );
			} );
		</script>

		<!--Admin Status Product Table Warehouse User -->
		<script>
			$(document).ready( function () {
    				$('#adminstatusproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getRequests');?>", //echo base url needs to change
					 	columns : [
						{ "data" : 'reqproductId' },
						{ "data" : 'productId' },
						{ "data" : 'reqproductQuantity' },
						{ "data" : 'reqDateTime' },
						{ "data" : 'reqproductStatus' },	
						{ "data" : 'reqproductId',
  						render: function ( data, type, row ) {
						var baseurl = '<?php echo base_url('') ?>';
    					return '<a href="'+baseurl+'main/approve/'+data+'" class="btn btn-primary">Approve</a> <a href="'+baseurl+'main/reject/'+data+'" class="btn btn-danger">Reject</a>';
						}
						}
					]
				} );
			} );
		</script>

        <!-- HighChart.js -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/highcharts.src.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/charts.js"></script> 	









		 
		<script type="text/javascript">
  
			$(function () { 
			
				var data_click = <?php echo $click; ?>;
				var data_viewer = <?php echo $viewer; ?>;
			
				$('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Yearly Website Ratio'
					},
					xAxis: {
						categories: ['2013','2014','2015', '2016']
					},
					yAxis: {
						title: {
							text: 'Rate'
						}
					},
					series: [{
						name: 'Click',
						data: data_click
					}, {
						name: 'View',
						data: data_viewer
					}]
				});
			});
  
		</script>
	</body>
</html>