 <?php 
 	require('header.php');
  ?>

<div class="container-fluid m-5 p-5">	
	<div class="row">
		<div class="col p-5">
			<select id="state-select" class="form-control">
				<option value disabled selected>-- Select State --</option>
				<?php 
					$query = "SELECT * FROM `state_master` WHERE `state_status`='active' ORDER BY `state_name`";
					$res = mysqli_query($conn, $query);
					while ($row=mysqli_fetch_object($res)) {
						echo "<option value='$row->state_id'> $row->state_name </option>";
					}
				 ?>
			</select>		
		</div>
		<div class="col p-5">
			<select id="city-select" class="form-control">
				<option value disabled selected>-- Select City --</option>
			</select>		
		</div>
		<div class="col p-5">
			<input type="text" list="city-list" class="form-control" id="ajax-search" placeholder="enter search keyword..">
			<datalist id="city-list"></datalist>
		</div>
	</div>
</div>
<?php 
 	require('footer.php');
  ?>

<script>
	$(document).on('input', '#ajax-search', function(){
		var word = $('#ajax-search').val();
		console.log(word)

		if ( word.length < 2  ) {
			return;
		}

		$.ajax({
			url: 'script/get_cities.php',
			type: 'POST',
			data :  {
				POST_TYPE : 'GET_VIA_NAME',
				KEY_WORD : word
			},
			success : function(res) {
				console.log(res)
				if ( res.trim() == 'failure' ) {
					$("#city-list").html('')
				} else {
					$("#city-list").html(res)
				}
				
			}
		})
	})

	$(document).on('change', '#state-select', function(){
		var stateID = $("#state-select").val();

		$.ajax({
			url: 'script/get_cities.php',
			type: 'POST',
			data :  {
				POST_TYPE : 'GET_VIA_ID',
				STATE_ID : stateID
			},
			success : function(res) {
				console.log(res)
				$("#city-select").html(res);
			}
		})
	})
</script>	