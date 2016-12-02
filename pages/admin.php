<div class="container adm">
	<div class="row">
		<div class="left col-lg-1  col-md-1 "></div>
        <div class="left col-lg-10  col-md-10 col-sm-12 col-xs-12">
	        <script>
	  			$( function() {
	    		$( "#tabs" ).tabs();
	  			} );
	  		</script>
	  		<div id="tabs">
		  		<ul>
		   			<li><a href="#tabs-1">Категории товаров</a></li>
		    		<li><a href="#tabs-2">Добавление товаров</a></li>
		    		<li><a href="#tabs-3">Добавление картинок</a></li>
		  		</ul>
		  		<div id="tabs-1">
		  			<label for="category">Введите категорию</label><br>
		    		<input type="text" name="category"><br><br>
		    		<input type='submit' name='addcat' value='Добавить категорию'>
					<input type='submit' name='delcat' value='Удалить'>
					<br><br>
					<label for="cat">Выберите категорию</label><br>
					<select name="cat" id="">
						<option value="default">Категории</option>
					</select>
					<br>
					<label for="subcat">Введите подкатегорию</label><br>
		    		<input type="text" name="subcat"><br><br>
		    		<input type='submit' name='addsubcat' value='Добавить подкатегорию'>
					<input type='submit' name='delsubcat' value='Удалить'>

		  		</div>
		  		<div id="tabs-2">
		    		<label for="cat">Выберите категорию</label><br>
					<select name="cat" id="">
						<option value="default">Категории</option>
					</select>
					<br>
					<label for="subcat">Выберите подкатегорию</label><br>
					<select name="subcat" id="">
						<option value="default">Подкатегории</option>
					</select>
					<br><br>
					<label for="itemname">Введите название товара</label><br>
		    		<input type="text" name="itemname"><br><br>
		    		<label for="pricein">Цена закупки</label><br>
		    		<input type="text" name="pricein"><br><br>
		    		<label for="pricesale">Цена продажи</label><br>
		    		<input type="text" name="pricesale"><br><br>
		    		<label for="info">Информация о товаре</label><br>
		    		<textarea name="info" id="" cols="30" rows="10"></textarea>
		    		<br><br>

		    		<input type='submit' name='additem' value='Добавить товар'>
					<input type='submit' name='delitem' value='Удалить'>
		  		</div>
		  		<div id="tabs-3">
		  			
		    		<form action='' method='post' enctype="multipart/form-data" style="display:table">
		    		<label for="items">Выберите товар</label><br>	
					<select name="items">
						<option value="default">Товары</option>
					</select><br><br>
				<input type="file" name="file[]" multiple accept="image/*"><br> <!-- картинки любых форматов -->
				<input type="submit" name="addImage" value="Добавить картинки">
			</form>
		  		</div>
			</div>
       	</div>
		
	</div>
	<hr>
		
</div>