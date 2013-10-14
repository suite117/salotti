<table>
	<tr>
		<td style="width: 40%"><img
			src="<?php echo curURL(); ?>images/SDR.png"
			style="margin-left: 80px;" />
		</td>
		<td style="width: 60%">
			<!-- slideshow -->
			<div class="cycle-slideshow" data-cycle-prev=".prevControl"
				data-cycle-next=".nextControl" data-cycle-pager="#adv-custom-pager"
				data-cycle-pager-template="<a    href='#'>
				<img src='{{src}}' width=100 height=80></a>"
				data-cycle-pause-on-hover="true">
				<?php
				$subdir = 'images/slideshow';
				$imagesPaths = getImagePaths($subdir);
				echo $imagesPaths;
				?>
			</div> <!-- empty element for pager links -->
			<div id=adv-custom-pager class="center external"></div> <!-- prev/next links -->
			<div class=center>
				<span class="prevControl"> &lt;&lt; Prev </span> <span
					class="nextControl"> Next &gt;&gt; </span>
			</div>
		</td>
	</tr>
</table>
