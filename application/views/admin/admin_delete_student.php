<!-- CURRENTLY UNUSED -->
<div class="modal fade" id="deleteConfirmModal-<?php echo $student->id;?>" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Xóa sinh viên này?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<?php echo anchor('admin/delete-student/'.$student->id, 'Delete', ['class'=>'btn btn-primary btn-sm']); ?>
			</div>
		</div>
	</div>
</div>