<?php
session_start();
 function fetch_data()
 {
      $output = '';
      $conn = mysqli_connect("localhost", "root", "", "bus");
      $sql = "SELECT driver_details.driver_id,driver_name,no_plate FROM `driver_details`JOIN bus_details ON driver_details.driver_id = bus_details.driver_id WHERE company LIKE '%".$_SESSION['username']."'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result))
      {
      $output .= '<tr>
                          <td>'.$row["driver_id"].'</td>
                          <td>'.$row["driver_name"].'</td>
                          <td>'.$row["no_plate"].'</td>
                     </tr>
                          ';
      }
      return $output;
 }
 if(isset($_POST["generate_pdf"]))
 {
      require_once('C:\xampp\htdocs\loginphp\assets\libs\tcpdf\tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Company Drivers");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '', 11);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '
      <h2 align="center">Company Drivers</h2><br />
      <table border="1" cellspacing="0" cellpadding="3">
                <tr>
                       <th width="20%">National ID</th>
                      <th width="40%">Drivers Name</th>
                      <th width="40%">Number plate</th>
                </tr>
      ';
      $content .= fetch_data();
      $content .= '</table>';
      $obj_pdf->writeHTML($content);
      $obj_pdf->Output('file.pdf', 'I');
 }
?>
<!DOCTYPE html>
 <html>
      <head>
           <title>Reports</title>
           <link rel="stylesheet" href="../css/bootstrap.min.css" />
      </head>
      <body>
           <br />
           <div class="container">
                <h4 align="center">Company Drivers</h4><br />
                <div class="table-responsive">
                	<div class="col-md-12" align="right">
                     <form method="post">
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />
                     </form>
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">
                          <tr>
                               <th width="10%">National ID</th>
                               <th width="20%">Driver's Name</th>
                               <th width="30%">Number plate</th>
                          </tr>
                     <?php
                     echo fetch_data();
                     ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
