
<?php
		include("conexion.php");
		$con=conectarse();	
		$result=$con->query("SELECT * FROM municipio where codigo_dep=".$_GET['id']);
	?>
		<br>
		<li id="li_7" >
		<label class="description" for="element_7">Municipio </label>
			<div>
				<select class="" id="municipio"  name="municipio" required>	
				<?php while ($row=mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row['codigo_mun']?>"><?php echo $row['nombre']?></option>
				<?php }?>
				</select>
			</div>
		</li>
