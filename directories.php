		<!-- Modal -->
<div id="directories" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-body">
<?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'mission' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
								<hr>
										<?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'vision' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>

</div>
</div>