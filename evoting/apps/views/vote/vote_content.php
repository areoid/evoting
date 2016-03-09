<div id="listcandidate">
	<div class="row" >
		<?php foreach ($_data['lscan']->results() as $res) : ?>
		<div class="col-md-3">
			<div onclick="vote(<?php echo $res->id_candidate; ?>)" class="panel panel-primary">
				<div class="panel-body">
					<a href="#" class="thumbnail">
						<img class="img-rounded" src="<?php echo Redirect::base_url(); ?>assets/admin/imagescandidates/<?php echo $res->path_foto; ?>">
					</a>
				</div>
				<div class="panel-footer" align="center">
					<b><?php echo $res->name; ?></b>
				</div>
			</div>
			<form method="POST" action="<?php echo Redirect::base_url(); ?>vote/home/choose">
				<input id="kompre" type="text" name="val" value="<?php echo $res->id_candidate; ?>">
				<button id="btnvote<?php echo $res->id_candidate; ?>" type="submit">Test</button>
			</form>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/vote/js/vote.js"></script>
