
<!DOCTYPE html>
<html>
<head>

	<title>Translation</title>
	<div class ="head">
    </title ><center><marquee><centers> TRANSIRATION LANGUAGES</center></marquee></title>
</div>
	<style >
		
		<style ="text/css">
          . head{
        width: 50%;
        height :90%;
        text-align:center;
        margin:0;
        font-size:5%;
        font-weight:bold;}

	.body{
        width:40%;
        height :60%;
        left :40%;
        top:20%;
        position: absolute;
        border-radius:20px
	}
	.image{
    top:10%;
    width:100%;
    height:100%;
	}
	.post{
    width:40%;
        height :60%;
        left :30%;
        top:20%;
        position: absolute;
        border-radius:20px;   
}	
.p{
	text-align:center;
	top:5%;
	font-weight:bold;
	position: absolute;
	left :45%;
}
.t{
	text-align:center;
	top:15%;
	font-weight:bold;
	position: absolute;
	left : 30%;
	color:black;

}
.y{
	text-align:center;
	top:15%;
	font-weight:bold;
	position: absolute;
	right :30%;
	color:black;

}
	</style>
	<link rel="icon" href="images/happy.jpg">
</head>
<body bgcolor="powderblue">
<div> 
    <card.grid="2"><img src="images/happy.jpg" class="image" ></card>
	</div >
	<center>
<table width="10%" cellspacing="20" border="0">
<tr>
    <td class = "t"><a href="index.php">HOME</a></td><td></td>
      <td class ="y" color :"black"><bold><a href="new.php">INSART</bold></a> </td>
  </tr>
  </table>
	<p class ="p">Welcome to translation pages</p>
	 
		<form method="post"  class="post">
			
       
 
		<table bgcolor="powderblue"  width="50%" cellspacing="20" border="0">
				<tr ><td colspan="2"><h1 style="font-weight:bold; font-size:100%;text-align:center "> language transilation form</h1></tr>
	<tr>			
	<td>Translating :</td>
	<td><!-- <select name="status" id="status" onchange="sayIt()">
				<option name="gura">V_Gura</option>
				<option name="tuma">V_Rangura</option>
				<option name="rangura">V_Gurisha</option>
				<option name="Gurisha">V_Tuma</option>
				
			</select> -->
			 <select name="word" id="val">
    <option value="0" >-- Select word --</option>
    <?php
        include "conn.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT * From indimi");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['variable'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
			</td>
			<td>To :</td>
			<td>
				<select name="status">
			    <option value="0">-- Select language --</option>
				<option value="1">Kinyarwanda</option>
				<option value="2">French</option>
				<option value="3">English</option>
				<option value="4">Swahili</option>
				
			</select></td>
			<td>
                  <button name="translate" style="color: black;border-color:powderblue ;border-style:dashed;padding: 12px;background-color:gray;">Translate</button>
                   </td>
     </tr>
     <tr>

		 <?php 
		 $result=[];
		 if(isset($_POST['translate']))
		 {	
			$result[0] = " ";
			 $language = $_POST['status'];
			 $word = $_POST['word'];
			 if(($language == 0) || ($word == 0))
			 {
				 $result[0] = "choose valid data";

			 }
			 else {
				 
				$query_select_indimi= mysqli_query($db, "SELECT * FROM indimi where id='$word'");
				if(mysqli_num_rows($query_select_indimi) > 0)
				{
					$result[0] = "one element found";

					$data_re = $query_select_indimi->fetch_array();

			if($language == 1)
			{
				$result[0] = $data_re['kinyarwanda'];
			}
			else if ($language == 2)
			{
				$result[0] = $data_re['french'];
			}	else if ($language == 3)
			{
				$result[0] = $data_re['english'];
			}	else if ($language == 4)
			{
				$result[0] = $data_re['swahili'];
			}
			else{
				$result[0]="couldn't find";
			}
				}
				else{
					$result[0] = "no element found";
				}

			 }

			
	
				
			

		
?> 
  <td>Here is your Result</td><td><label></label><?php echo $result[0];?></td><?php
		 }

		 
		 ?>
   
    
     </tr>

          
                   
</table>
<!-- <label name="selected" id="selected">hjjfj</label>
 <script>
 function sayIt(){
	const variable=document.getElementById("status").value;
	document.getElementsByName("selected").value=variable;
	return variable;
}

// </script>-->
</center>
</body>
</html>			


