<!--sidebar-wrapper-->
<?php include_once('header.php') ?>
<style>
   .checked {
     color: orange;
   }
</style>
<style>
   .checked {
     color: orange;
   }
   @media print {
       body * {
           visibility: hidden;
       }
       .page-content {
           visibility: visible;
           position: absolute;
           left: 0;
           top: 0;
           width: 100%;
       }
   }
</style>


<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
   <!--page-content-wrapper-->
   <div class="page-content-wrapper">
     <div class="page-content">
       <!--breadcrumb-->
       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Proposals</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Proposals</li>
             </ol>
           </nav>
         </div>
       </div>
       <!--end breadcrumb-->
       <div> <?php if($this->session->flashdata('msg')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('msg'); ?></div>
                    <?php }?><a class="btn btn-info" style="background-color:#17a2b8;color:white;" href="javascript:void(0)" onclick="printContent()">Print</a>&nbsp;&nbsp;<a class="btn btn-info" href="<?php echo base_url('lead/download_praposal/'.$res['lp_id']); ?>" style="background-color:#17a2b8;color:white;">Download PDF</a>

    
&nbsp;&nbsp;<a class="btn btn-info" href="<?php echo base_url('lead/send_praposal/'.$res['lp_id']); ?>"style="background-color:#17a2b8;color:white;">Send</a></div>

       <div class="card" id="printarea">
         <div class="card-body">
      
           <div class="row adv_print" >
             <div class="col-sm-12 col-lg-12 border-right">
           
               <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%">
              
                 
               <tbody>
                   <!-- <tr>
                     <td>
                       <center><img src="http://localhost/microcrm/uploads/1468747408logo-1.png" width="600" style="width: 40%; max-width: 600px;"></center>
                     </td>
                   </tr> -->
                  
                   <tr>
                 

                     <td>
                    
                       <table cellspacing="0" cellpadding="0" border="0" width="100%">
                         <tbody>
                           <tr>
                           
                             <td style="padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                               <b>To,</b>
                               <p><b><?php echo $res['lp_to']; ?>,</b></p>
                               <p>Microlan, NAVI-MUMBAI, MAHARASHTRA</p>
                               <p><b>SUB: <?php echo $res['subject']; ?>.</b></p>
                               <!-- <p>We thank you for the keen interest shown by you in our services...</p>
                               <p>Thanking You,</p>
                               <b>For MICROLAN IT SERVICES PVT. LTD.</b>
                               <p>Mr.</p>
                               <p>+91-9870094555</p>
                               <p>Mumbai, Maharashtra, India.</p> -->
                               <p> <?php echo $template[0]['description_covering']; ?></p>
                               <center>
                                 <h5><u>PROJECT</u></h5>
                                 
                                 <h6><u>New Project</u></h6>
                                 <h6><u>PREPARED BY:</u> <?php echo $template[0]['signature']; ?></h6>
                                 <h6>ADDRESS: UNIT NO.113, 2ND FLOOR, PUNJANI INDUSTRIAL ESTATE, THANE WEST - 400601</h6>
                               </center>
                             </td>
                           </tr>
                         </tbody>
                       </table>
                     </td>
                   </tr>
                   <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                      <!-------------------------------------------------------->   
                        <?php echo $template[0]['description_over_view_project']; ?>
                                </td>
                                </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                                 <!-------------------------------------------------------->   
                                  <?php echo $template[0]['description_key_point']; ?>
                                   
                               
                                </td>
                                </tr>
                        </table>
                    </td>
                </tr>
                   <tr>
                     <td style="padding: 40px;">
                       <table class="table table-bordered"   style="border-collapse: collapse; text-align: center;">
                         <thead>
                           <tr>
                             <th>DESCRIPTION</th>
                             <th>DAYS</th>
                             <th>QTY</th>
                             <th>UNIT PRICE</th>
                             <th>TOTAL</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?php
                                     $total_qty=0;
                                     $total=0;
                                     $total_days=0;
                                     $total_price=0;
                                if(!empty($invoices_details)){
                                 foreach ($invoices_details as $key => $value){
                                ?>
                               <tr>
                                <td><b><u><?php echo $value['product_name']; ?></u></b><p><?php echo $value['description']; ?></p></td>
                                <td><?php $total_days+=$value['days']; echo $value['days']; ?></td>
                                <td><?php $total_qty+=$value['qty']; echo $value['qty']; ?></td>
                                 <td><?php $total_price+=$value['price'];  echo $value['price']; ?></td>
                                <td><?php $total+=$value['unit_total']; echo $value['unit_total']; ?></td>
                                </tr> 
                              <?php } }  ?>
                              <tr>
                                <th>TOTAL</th>
                                <td><?php echo $total_days; ?></td>
                                <td><?php echo $total_qty; ?></td>
                                <td><?php echo $total_price; ?></td>
                                <td><?php echo $total; ?></td>
                                </tr>
                 </tbody>
               </table>
                </td>
                </tr>
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                                 <!-------------------------------------------------------->

                                  <?php echo $template[0]['description_term_and_condtion']; ?>
                                
                                 
                                </td>
                                </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                                 <!--------------------------------------------------------> 
                                  <p><b>For Microlan IT Services Pvt. Ltd.</b></p>
                                  <b>SACHIN GODAGE</b><br>
                                  Mobile: 9870094555<br>
                                  <u>sachin.godage @microlan.in</u><br>
                                </td>
                                </tr>
                                 </div>
                        </table>
                    </td>
                </tr>
            
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
<!--end page-content-wrapper-->
</div>
<!--end page-wrapper-->
<div class="overlay toggle-btn-mobile"></div>
<a href="javaScript:;" class="back-to-top">
  <i class='bx bxs-up-arrow-alt'></i>
</a>

<?php if ($this->session->flashdata('msg')): ?>
    <script>
        window.onload = function() {
            document.getElementById("emailStatusMessage").innerText = "<?php echo $this->session->flashdata('msg'); ?>";
            var myModal = new bootstrap.Modal(document.getElementById('emailStatusModal'));
            myModal.show();

            document.getElementById('emailStatusModal').addEventListener('hidden.bs.modal', function () {
                location.reload();
            });
        };
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        window.onload = function() {
            document.getElementById("emailStatusMessage").innerText = "<?php echo $this->session->flashdata('error'); ?>";
            var myModal = new bootstrap.Modal(document.getElementById('emailStatusModal'));
            myModal.show();

            document.getElementById('emailStatusModal').addEventListener('hidden.bs.modal', function () {
                location.reload();
            });
        };
    </script>
<?php endif; ?>

<div class="modal fade" id="emailStatusModal" tabindex="-1" aria-labelledby="emailStatusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emailStatusLabel">Email Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="emailStatusMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
//   function display() {
//     var divToPrint = document.querySelector('.card'); // Target only the relevant content

//     var newWin = window.open('', '_blank'); // Open a new print window

//     newWin.document.open();
//     newWin.document.write(`
//         <html>
//         <head>
//             <title>Print Proposal</title>
//             <style>
//                 body {
//                     font-family: Arial, sans-serif;
//                     padding: 20px;
//                     margin: 0;
//                 }
//                 .card {
//                     width: 100%;
//                     padding: 20px;
//                 }
//                 table {
//                     width: 100%;
//                     border-collapse: collapse;
//                 }
//                 th, td {
//                     border: 1px solid #ddd;
//                     padding: 8px;
//                     text-align: left;
//                 }
//                 th {
//                     background-color: #f2f2f2;
//                 }
//                 @media print {
//                     body * {
//                         visibility: hidden;
//                     }
//                     .card, .card * {
//                         visibility: visible;
//                     }
//                     .card {
//                         position: absolute;
//                         left: 0;
//                         top: 0;
//                         width: 100%;
//                     }
//                 }
//             </style>
//         </head>
//         <body>
//             ${divToPrint.outerHTML} <!-- Include only the necessary content -->
//             <script>
//                 window.onload = function() {
//                     window.print(); // Open print dialog
//                     window.onafterprint = function() {
//                         window.close(); // Close window after printing
//                     };
//                 };
//             <\/script>
//         </body>
//         </html>
//     `);

//     newWin.document.close();
// }

function display() 
{

  // var divToPrint=document.getElementById('printarea');
  var divToPrint = document.querySelector('.card');
  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  //setTimeout(function(){newWin.close();},10);

}




  </script>

  <script>
function printContent() {
    var printContents = document.querySelector('.adv_print').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(); // Reload to restore original page after printing
}
</script>
<?php include_once('footer.php') ?>
