

            </div>
        </div>
    </div>



	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
		$(document).ready(function() {
			
			var table = $('#example').DataTable( {
					responsive: true,
					"paging":   false,
					"searching":false,
					"sort":     false
				} )
				.columns.adjust()
				.responsive.recalc();
		} );
	</script>
    </script>


</body>

</html>
