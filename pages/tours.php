<div class="container-fluid hed">
      <br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
          <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>

      <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/1/1.jpg" alt="tur" width="460" height="300">
          </div>

          <div class="item">
            <img src="images/1/2.jpg" alt="tur" width="460" height="300">
          </div>
    
          <div class="item">
            <img src="images/1/3.jpg" alt="tur" width="460" height="300">
          </div>

          <div class="item">
            <img src="images/1/4.jpg" alt="tur" width="460" height="300">
          </div>
          <div class="item">
            <img src="images/1/5.jpg" alt="tur" width="460" height="300">
          </div>
          <div class="item">
            <img src="images/1/6.jpg" alt="tur" width="460" height="300">
          </div>
        </div>

      </div>
    </div>
    <div class="container vibor">
        <p> 
          <select name="countryid" id="countryid" onchange="showCities(this.value)">
            <?php 
            connect();
            $res=mysql_query("select * from countries");
            while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
              echo "<option value='".$row[0]."'>".$row[1]."</option>";
            }
            ?>
          </select>
          <div id="citylist">
            
          </div>
          <div id="hotellist">
            
          </div>

          <!-- <select name="" id="">
            <option value="">Выбор города</option>
          </select> -->
            <a href="index.php?page=5" class="btn btn-primary btn-lg" role="button">Выбрать</a>
        </p>
    </div>
    
	<div id="section2" class="sections"></div>
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
      </div>
      <a href="#" class="top">to top</a>
      <hr>
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
      </div>
    </div> <!-- /container -->
    <div id="section1" class="sections"></div>