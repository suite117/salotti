<div class="container">

	<div class="row">
		<div>
			<h1 class="page-header"><?=$title ?><?='<small> '.$description.'</small>' ?></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?=curURL()?>">Home</a>
				</li>
				<?php if (isset($category)): ?>
					<li>
					<a href="<?=curURL().$category ?>"><?=$category ?></a>
				</li>
				<?php endif; ?>				
				<li class="active">
					<?=$title ?>
				</li>
			</ol>
		</div>

	</div><!-- /.row -->
</div>