<?php include "connect.php"; ?>
</!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

	<title>Filter</title>
</head>
<body>
	<div class="container">
		<form>
		  <div class="row">
		    <div class="col">
		    	<?php 
		    		$employee_name = '';
		    		if(isset($_GET['employee_name']) && !empty($_GET['employee_name'])){
		    			$employee_name = trim($_GET['employee_name']);
		    		}
		    	?>
		      <input type="text" class="form-control" name="employee_name" placeholder="Employee name" value="<?php echo $employee_name; ?>">
		    </div>
		    <div class="col"> 
		    	<?php 
		    		$event_name = '';
		    		if(isset($_GET['event_name']) && !empty($_GET['event_name'])){
		    			$event_name = trim($_GET['event_name']);
		    		}
		    	?>
		      <input type="text" class="form-control" name="event_name" placeholder="Event name" value="<?php echo $event_name; ?>">
		    </div>
		    <div class="col">
		    	<?php 
		    		$date = '';
		    		if(isset($_GET['date']) && !empty($_GET['date'])){
		    			$date = trim($_GET['date']);
		    		}
		    	?>
		      <input type="text" class="form-control" id="datepicker" name="date" placeholder="Date" value="<?php echo $date; ?>">
		    </div>
		    <div class="col">
		      <input type="submit" class="btn btn-primary">
		      <a href="http://localhost/challange/index.php" class="btn btn-primary">Clear</a>
		    </div>
		  </div>
		</form> 
	</div>
	  <table class="table">
	    <thead class="thead-light">
	      <tr>
	        <th>Id</th>
	        <th>Employee name</th>
	        <th>Employee mail</th>
	        <th>Event Id</th>
	        <th>Event Name</th>
	        <th>Participation Fee</th>
	        <th>Event Date</th>
	        <th>Version</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    	$total = 0;
	    		$whr = '';
	    	if(isset($_GET['employee_name'],$_GET['event_name'],$_GET['date'])){
	    		if(!empty($_GET['employee_name'])){
	    			$whr .= "and employee_name like '%".trim($_GET['employee_name'])."%'";
	    		}
	    		if(!empty($_GET['event_name'])){
	    			$whr .= "and event_name like '%".trim($_GET['event_name'])."%'"; 
	    		}
	    		if(!empty($_GET['date'])){
	    			$whr .= "and event_date = '".trim($_GET['date'])."'";
	    		}
	    	}
	    	$sql = "SELECT * FROM employee where 1 ".$whr;
			$result = $conn->query($sql);

			if ($result->num_rows > 0) { 
			  while($row = $result->fetch_assoc()) { 
	    	?>
	      <tr>
	        <td><?php echo $row["participation_id"]; ?></td> 
	        <td><?php echo $row["employee_name"]; ?></td> 
	        <td><?php echo $row["employee_mail"]; ?></td> 
	        <td><?php echo $row["event_id"]; ?></td> 
	        <td><?php echo $row["event_name"]; ?></td> 
	        <td align="right"><?php echo $row["participation_fee"]; $total +=$row["participation_fee"]; ?></td> 
	        <td><?php echo $row["event_date"]; ?></td> 
	        <td><?php echo $row["version"]; ?></td> 
	      </tr> 
	  		<?php } } ?>
	    </tbody>
	    <tfoot>
	    	<tr>
	    		<td colspan="5" align="right">Total</td> 
	    		<td align="right"><?php echo $total;?></td>
	    		<td colspan="2"></td>  
	    	</tr>
	    </tfoot>
	  </table> 
	  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
    	dateFormat: 'yy-mm-dd'  
    });
  } );
  </script>

</body>
</html>