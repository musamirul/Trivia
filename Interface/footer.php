</div>
<footer>
    
	<!--<div class="container pt-4">
    	<section class="mb-4">
        	<a class="btn btn-outline-light rounded-circle m-1 me-3" href="#" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light rounded-circle m-1 me-3" href="#" role="button"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-light rounded-circle m-1 me-3" href="#" role="button"><i class="fab fa-google"></i></a>
            <a class="btn btn-outline-light rounded-circle m-1 me-3" href="#" role="button"><i class="fab fa-instagram"></i></a> 
            <a class="btn btn-outline-light rounded-circle m-1 me-3" href="#" role="button"><i class="fab fa-linkedin"></i></a>  
            <a class="btn btn-outline-light rounded-circle m-1 me-3" href="#" role="button"><i class="fab fa-github"></i></a>           
        </section>
    </div>-->

    <!-- 
    Active navbar button by
    1) get current file name (php)
    2) set if else on button class 
    3) if file name = product.php therefore button == active
    -->
</footer>

    <script src="Interface/style/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Interface/style/jQuery/jquery-3.6.0.min.js"></script>
    <script src="Interface/style/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="Interface/style/DataTables/js/dataTables.bootstrap5.min.js"></script>
    <script src="Interface/style/summernote/summernote-lite.js"></script>

    <script>
      window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
      </script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
    <script>
    $('#summernote').summernote({
      placeholder: 'Enter Product Details',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
    $('#summernote_spec').summernote({
      placeholder: 'Enter Product Details',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
  </body>
</html>