			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<script type="text/javascript" src="{{asset('assets/js/jquery.tabledit.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.4-build.3588/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>
	<script type="text/javascript" src="{{asset('assets/js/my-angular.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{asset('assets/js/adminValidation.js')}}">
	    
	</script>
	<script>
    
    function deleteFun(id){
        console.log('hi'); 
        $('#'+id).submit();
    }
    </script>
	<script type="text/javascript">
		$(".chosen-select").chosen();
		$('.date-picker').datepicker({
		    format: 'yyyy-mm-dd',
		    todayHighlight: true,
            autoclose: true
		});
// 		$('.date-picker').datepicker('setDate', 'now');
		$(function() {
		    var start = moment().subtract(29, 'days');
		    var end = moment();
		    function cb(start, end) {
		        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		    }
		    $('#reportrange').daterangepicker({
		        startDate: start,
		        endDate: end,
		        ranges: {
		           'Today': [moment(), moment()],
		           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		           'This Month': [moment().startOf('month'), moment().endOf('month')],
		           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		        }
		    }, cb);
		    cb(start, end);
		});
		$('.summernote').summernote({
            placeholder: "Let's write",
            height: 400,
            fontSizes: ['12','13', '14', '16', '18', '24', '36', '48'],
            fontNames: ['Work Sans, sans-serif', 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento'],
            toolbar: [
            ['fontname', ['fontname']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'myvideo', 'link', 'table', 'hr']],
            ['misc', ['fullscreen', 'undo', 'redo']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ],
            disableDragAndDrop: true,
            shortcut: false
        });
    </script>

</body>
</html>
