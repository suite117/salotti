<h1>Nestable</h1>

<p>Drag &amp; drop hierarchical list with mouse and touch compatibility (jQuery plugin)</p>

<p>
  <strong><a href="https://github.com/dbushell/Nestable">Code on GitHub</a> </strong>
</p>

<p>
  <strong>PLEASE NOTE: I cannot provide any support or guidance beyond this README. If this code helps you that's great
    but I have no plans to develop Nestable beyond this demo (it's not a final product and has limited functionality). I
    cannot reply to any requests for help.</strong>
</p>

<menu id="nestable-menu">
  <button type="button" data-action="expand-all" class="btn btn-default">Espandi tutto</button>
  <button type="button" data-action="collapse-all" class="btn btn-default">Comprimi tutto</button>
</menu>

<div class="cf nestable-lists">

  <div class="dd" id="njson"></div>

  <div class="dd" id="nestable">
    <ol class="dd-list">
      <li class="dd-item" data-id="1">
        <div class="dd-handle">Item 1</div>
      </li>
      <li class="dd-item" data-id="2">
        <div class="dd-handle">Item 2</div>
        <ol class="dd-list">
          <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
          <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
          <li class="dd-item" data-id="5">
            <div class="dd-handle">Item 5</div>
            <ol class="dd-list">
              <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
              <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
              <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
            </ol>
          </li>
          <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
          <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
        </ol>
      </li>
      <li class="dd-item" data-id="11">
        <div class="dd-handle">Item 11</div>
      </li>
      <li class="dd-item" data-id="12">
        <div class="dd-handle">Item 12</div>
      </li>
    </ol>
  </div>

  <div class="dd" id="nestable2">
    <ol class="dd-list">
      <li class="dd-item" data-id="13">
        <div class="dd-handle">Item 13</div>
      </li>
      <li class="dd-item" data-id="14">
        <div class="dd-handle">Item 14</div>
      </li>
      <li class="dd-item" data-id="15">
        <div class="dd-handle">Item 15</div>
        <ol class="dd-list">
          <li class="dd-item" data-id="16"><div class="dd-handle">Item 16</div></li>
          <li class="dd-item" data-id="17"><div class="dd-handle">Item 17</div></li>
          <li class="dd-item" data-id="18"><div class="dd-handle">Item 18</div></li>
        </ol>
      </li>
    </ol>
  </div>

</div>

<p>
  <strong>Serialised Output (per list)</strong>
</p>

<textarea id="nestable-output"></textarea>
<textarea id="nestable2-output"></textarea>

<p>&nbsp;</p>

<div class="cf nestable-lists">

  <p>
    <strong>Draggable Handles</strong>
  </p>

  <p>If you're clever with your CSS and markup this can be achieved without any JavaScript changes.</p>

  <div class="dd" id="nestable3">


    <ol class="dd-list">
      <li class="dd-item dd3-item" data-id="13">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">Item 13</div>
      </li>
      <li class="dd-item dd3-item" data-id="14">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">Item 14</div>
      </li>
      <li class="dd-item dd3-item" data-id="15">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">Item 15</div>
        <ol class="dd-list">
          <li class="dd-item dd3-item" data-id="16">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">Item 16</div>
          </li>
          <li class="dd-item dd3-item" data-id="17">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">Item 17</div>
          </li>
          <li class="dd-item dd3-item" data-id="18">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">Item 18</div>
          </li>
        </ol>
      </li>
    </ol>
  </div>

</div>

<script>
	  $(document).ready(function() {

		var updateOutput = function(e) {
		  var list = e.length ? e : $(e.target);
		  output = list.data('output');
		  if (window.JSON) {
			output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
		  } else {
			output.val('JSON browser support required for this demo.');
		  }
		};

		// activate Nestable for list 1
		$.getJSON(base_url + 'rest/category_rest.php?nested=true', function(data) {
					

					$('#njson').bootnestable({
					  group : 1,
					  source : data,
					  label : 'category_name',
					  value : 'category_id',
					  parent_label : 'category_parent_id'
					}).on('change', function(e) {
						var list = e.length ? e : $(e.target);
						var output = $(this).bootnestable('serialize');
						console.log(output);
						// POST to server using $.post or $.ajax
						// POST to server using $.post or $.ajax
        $.ajax({
            data: output,
            type: 'POST',
            url: base_url + 'rest/category_rest.php'
        });
						
				       
			});
		});
		// activate Nestable for list 1
		$('#nestable').bootnestable({
		  group : 1
		}).on('change', updateOutput);

		// activate Nestable for list 2
		$('#nestable2').bootnestable({
		  group : 1
		}).on('change', updateOutput);

		// output initial serialised data
		updateOutput($('#njson').data('output', $('#njson')));
		updateOutput($('#nestable').data('output', $('#nestable-output')));
		updateOutput($('#nestable2').data('output', $('#nestable2-output')));

		$('#nestable-menu').on('click', function(e) {
		  var target = $(e.target), action = target.data('action');
		  if (action === 'expand-all') {
			$('.dd').nestable('expandAll');
		  }
		  if (action === 'collapse-all') {
			$('.dd').nestable('collapseAll');
		  }
		});

		$('#nestable3').bootnestable();

	  });
	</script>
