<?php

		require_once('connections/conn.php');
		$g_cat=$_GET['catCode'];

		$sql_qry_commodity 	= "SELECT * FROM ref_commodities WHERE `CATEGORY_CODE`='$g_cat'";
		$result_qry_commodity = $conn->query($sql_qry_commodity);

?>
	
			<select class="form-control form-control-sm" name="COMMODITY_CODE">
    			<option value=""><?php echo "Select Provider" ?></option>

 		 	<?php while($row_comm = $result_qry_commodity->fetch_assoc()) { ?>

				<option value="<?php echo $row_comm['COMMODITY_CODE']; ?>" ><?php echo $row_comm['COMMODITY']?></option>

			<?php
					}
			?>
 	    </select>
