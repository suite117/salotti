<div id="summernote">Hello Summernote</div>

<div class="container">

	<form class="form-horizontal" role="form" method="post" action="">
		<div class="form-group">
			<label for="title" class="col-md-2">Titolo</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="title" id="title" placeholder="Iserisci il nome del prodotto">
			</div>
		</div>
		<div class="form-group">
			<label for="category" class="col-md-2">Categoria</label>
			<div class="col-md-4">
				<select class="form-control" id="category">
					<option>sofa</option>
					<option>bed</option>
				</select>
			</div>
			<label for="version" class="col-md-2">Versione</label>
			<div class="col-md-4">
				<select class="form-control" id="version">
					<option value="2p">2 posti</option>
					<option value="l2p">laterale 2 posti</option>
					<option value="2pm">2 posti max </option>
					<option value="l2pm">laterale 2 posti max </option>
					<option value="l3p">laterale 3 posti</option>
					<option value="l3pm">laterale 3 posti max</option>
					<option value="cl">chaise longe</option>
					<option value="clm">chaise longe max</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<label for="description">Descrizione</label>
				<textarea name="description" class="form-control editor" rows="6" id="description" ></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<label for="scheda_tecnica">Scheda tecnica</label>
				<textarea name="scheda_tecnica" class="form-control editor" rows="6" id="scheda_tecnica" ></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-1">
				<button type="submit" name="submit" class="btn btn-default">
					Crea prodotto
				</button>
			</div>
		</div>
	</form>

</div>
