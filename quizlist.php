<html>


<?php require ("header.php");?>

<?php
session_start();
require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
} else {
    $staffid = $_SESSION["staffid"];
    $sql = "select * from staff where staffid='{$staffid}'";
    $res =   mysqli_query($conn, $sql);
    if ($res == true) {
        global $dbstaffid, $dbpw;
        while ($row = mysqli_fetch_array($res)) {
            $dbstaffid = $row['staffid'];
            $dbname = $row['name'];
			$dbmail = $row['mail'];
            $dbphno = $row['phno'];
            $dbgender = $row['gender'];
            $dbdob = $row['DOB'];
            $dbdept = $row['dept'];
        }
    }
}
?>
 <body class="bg-white" id="top">


	
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>


<div class="container"> 
      

<div class="row">
            <div class="col-sm-12 mb-3">  
              <div class="card card-body bg-gradient-white text-white mt-3">
			   <div class="col-12 mx-auto text-center">
            <span class="badge badge-warning badge-pill mb-3">Quiz List</span>
          </div>
		  
		  
		      <table id="tabledata" class=" table table-striped table-hover table-bordered  text-center ">

            <thead class="font-weight-bold">
                      <tr >

                <td >Quiz ID</td>
                <td> Quiz Title </td>
                <td> Created On </td>
                <td> View </td>

				<td> Delete </td>
				        </tr>

            </thead>

		<tbody >
		
		
		  				        <?php


  $sql ="select * from quiz where staffid='{$staffid}'";
            $res=mysqli_query($conn,$sql);
       
while ($row = mysqli_fetch_array($res)) {                
             
			$id=$row['quizid'];
			$name=$row['quizname'];
			$date=$row['date_created'];
			
        ?>
		
			     <tr class="text-center">
              
                <td data-label="Quiz ID"> <?php echo $id ?> </td>
                <td data-label="Quiz Title"> <?php echo $name  ?> </td>
                <td data-label="Created On"> <?php echo $date  ?> </td>
                
        <td data-label="Profile"> <button class="btn btn-info btn-sm" > <a href="viewq.php?qid=<?php echo $id ?>" class="nav-link text-white"> View </a> </button> </td>
	
       <td data-label="delete"> <button class="btn btn-sm btn-danger" > <a href="delete.php?id=<?php echo $id ?>"  class=" nav-link text-white" data-toggle="tooltip">Delete</a> </button> </td>

            </tr>

							<?php
					
					
					}
				?>
			</tbody>
			
    </table>
     
             </div>
                </div>
              </div>    	
    </div>
</section>


    <?php require("footer.php");?>

</body>

</html>