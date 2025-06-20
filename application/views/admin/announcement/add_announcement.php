
<style>
  .checked {
    color: orange;
  }
</style>
<script>
  function restrictToNumbers(event) {
      const input = event.target;
      const value = input.value;
      input.value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  }
</script>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />


<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Announcement </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>announcement">Announcement List</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Announcement </li>
            </ol>
          </nav>
        </div>

      </div>
      <!--end breadcrumb-->
      <form  method="post" action="<?php echo base_url();?>save-announcement" enctype="multipart/form-data">
                
        <input type="hidden" name="op_user_id" value="<?php echo $this->session->userdata('op_user_id');?>">
        <input type="hidden" name="role_id" value="<?php echo $this->session->userdata('user_role');?>">

        <div class="card radius-15">
          <div class="card-body">

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <!-- Announcement Information -->
                <div class=" row">
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="lead_number">Announcement Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="announcement_description" id="announcement_description" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div data-target-input="nearest">
                            <input type="file" name="announcement_image" class="form-control" id="announcement_image">
                        </div>
                    </div>
                  </div>
                </div>
                <!-- ToDo Information -->

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
                <!-- /.card-body -->

              </div>
              
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end page-content-wrapper-->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='todo_from']").validate({
    // Specify validation rules
rules: {
      description:"required",
      start_date_time:"required",
      end_date_time:"required"

    },

    // Specify validation error messages
    messages: {
      description:"Please enter description",
      start_date_time:"Please select the start date",
      end_date_time:"Please select the start date"
         },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script>    
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
     $('#reservationdatetime1').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>