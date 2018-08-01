<?php
 function fetch_data()
 {
      $output = '';
      $conn = mysqli_connect("localhost", "root", "", "bus");  
      $sql = "SELECT * FROM bus_details";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result))
      {
      $output .= '<tr>
                          <td>'.$row["no_plate"].'</td>
                          <td>'.$row["no_of_seats"].'</td>
                          <td>'.$row["route"].'</td>
                     </tr>
                          ';
      }
      return $output;
 }
 if(isset($_POST["generate_pdf"]))
 {
      require_once('tcpdf/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Company Buses");
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
      <h2 align="center">Company Buses</h2><br />
      <table border="1" cellspacing="0" cellpadding="3">
                 <tr>
                      <th width="20%">Number plate</th>
                      <th width="20%">No. of seats</th>
                      <th width="50%">Route</th>
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
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      </head>
      <body>
           <br />
           <div class="container">
                <h4 align="center">Company Buses</h4><br />
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
                               <th width="10%">Number plate</th>
                               <th width="20%">No. of seats</th>
                               <th width="30%">Route</th>
                          </tr>
                     <?php
                     echo fetch_data();
                     ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
