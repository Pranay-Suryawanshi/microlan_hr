<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<style type="text/css">
   @import url(https://fonts.googleapis.com/css?family=Denk+One);
   @import url(https://fonts.googleapis.com/css?family=Arimo);
   .rotingtxt{
   -webkit-transform: rotate(331deg);
   -moz-transform: rotate(331deg);
   -o-transform: rotate(331deg);
   transform: rotate(331deg);
   font-size: 10em;
   color: rgba(255, 5, 5, 0.17);
   position: absolute;
   font-family: 'Trebuchet MS', sans-serif;
   text-transform:uppercase;
   margin-top: 30%;
   padding-left: 20%;
   }
</style>

<p class="rotingtxt"><?php echo $res['watermark']; ?>
<!-- <center style="margin-top: 30px;">
   <img width="100" alt="No Image" border="0" align="center" style="width: 100%; max-width: 200px;" src="<?php echo FCPATH.'/uploads/1468747408logo-1.png';?>">
   <hr>
</center>
<b>To,</b>
<p><b><?php echo $res['lp_to']; ?>,</b></p>
<p >Microlan, NAVI-MUMBAI, MAHARASHTRA</p>
<p style="margin-top: 50px;"><b>SUB: <?php echo $res['subject']; ?>.</b></p>
<!-- <p>We thank you for the keen interest shown by you in our services. In continuation to the
   discussion, we have worked out on requirement analysis. We request you to kindly go
   through the same and advice accordingly
</p>
<p>Assuring you best of our service and support at all times.</p>
<p style="margin-top: 50px;">Thanking You,</p>
<b>For MICROLAN IT SERVICES PVT. LTD.</b></p>
<p>Mr. <?php echo $template[0]['signature']; ?></p>
<p>+91-9870094555</p>
<p>Mumbai, Maharashtra, India.
   Microlan IT
</p> -->

<!-- <p> <?php echo $template[0]['description_covering']; ?></p>
<center style="margin-top: 250px;">
   <h1 ><u>PROJECT</u></h1>
   <p style="margin-top: 80px;" class="rotingtxt"><?php echo $res['watermark']; ?>
   <h3><u><?php echo $res['project']; ?></u></h3>
   </p>
</center>
<center style="margin-top: 80px;">
   <p>
   <h3 style="margin-top: 80px;"><u>PREPARED BY: <?php echo $template[0]['signature']; ?></u></h3>
   </p>
</center>
<center style="margin-top: 100px;">
   <p>
   <h3>
   ADDRESS:</h1></p>
   <p style="margin-top: 100px;">UNIT NO.113, 2ND FLOOR, PUNJANI INDUSTRIAL ESTATE,
      POKHRAN ROAD NO.01 KHOPAT, THANE WEST - 400601
   </p>
</center>
</p>
<p style="margin-top: 350px;">
   <?php echo trim($template[0]['description_over_view_project']); ?>
<p style="margin-top: 50px;"><?php echo trim($template[0]['description_key_point']); ?>
   <?php echo trim($template[0]['description_key_point']); ?>
</p>
<p ><u>QUOTATION FOR DEVELOPMENT:</u></p>
<p><?php echo $res['invoices_details']; ?></p>

<p> <?php echo $template[0]['description_term_and_condtion']; ?></p>
<p style="margin-top: 10px;" class="rotingtxt"><?php echo $res['watermark']; ?><?php echo trim($template[0]['description_term_and_condtion']); ?></p>
<p><b>For Microlan IT Services Pvt. Ltd.</b></p>
<p><b><?php echo $template[0]['signature']; ?></b></p>
<p>Mobile: 9870094555</p>
<p><u>sachin.godage @microlan.in</u></p> --> -->

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

