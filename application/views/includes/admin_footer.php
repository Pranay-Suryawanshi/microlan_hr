<?php
$strQry = "SELECT *
FROM company_setting 
WHERE comp_sett_id = '1'";

$company = $this->model->getSqlData($strQry);


?>
<div class="footer">
    <p class="mb-0"><?php echo $company[0]['company_name'];?> @<?php echo date('Y');?> | Developed By : <a href="https://microlan.in/"
        target="_blank">Microlan</a>
    </p>
</div>
<!-- end footer -->
</div>
<!--start switcher-->
<div class="switcher-body">
    <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
            class="bx bx-cog bx-spin"></i></button>
    <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="lightmode" value="option1"
                    checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="darkmode" value="option2">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="darksidebar" value="option3">
                <label class="form-check-label" for="darksidebar">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ColorLessIcons"
                    value="option3">
                <label class="form-check-label" for="ColorLessIcons">Color Less Icons</label>
            </div>
        </div>
    </div>
</div>
<!--end switcher-->
<!-- JavaScript -->
<!-- Bootstrap JS -->
<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- Vector map JavaScript -->
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
<script src="<?php echo base_url()?>assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
<script src="<?php echo base_url()?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="<?php echo base_url()?>assets/js/index2.js"></script>
<!-- App JS -->
<script src="<?php echo base_url()?>assets/js/app.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        //Default data table
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Quill.js Script -->
<!--<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>-->
<script>
    // // Initialize Quill editor for all elements with the class "editor"
    // const editors = document.querySelectorAll('.editor'); // Select all elements with the class "editor"
    // editors.forEach(editor => {
    //     new Quill(editor, {
    //         theme: 'snow',
    //         placeholder: 'Start typing here...',
    //         modules: {
    //             toolbar: [
    //                 ['bold', 'italic', 'underline', 'strike'], // Formatting options
    //                 [{ 'list': 'ordered' }, { 'list': 'bullet' }], // Lists
    //                 [{ 'script': 'sub' }, { 'script': 'super' }], // Subscript/superscript
    //                 [{ 'header': [1, 2, 3, false] }], // Headers
    //                 [{ 'align': [] }], // Text alignment
    //                 ['link', 'image'] // Link and image
    //             ]
    //         }
    //     });
    // });

    
</script>
<!-- Include Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet"> 
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script> 
<script>
$(document).ready(function() {
    $('.editor').summernote({
        placeholder: 'Start typing here...',
        tabsize: 2,
        height: 200, // Set editor height
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['font', ['superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>
</body>
</html>