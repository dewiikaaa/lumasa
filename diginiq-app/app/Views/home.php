<div class="row justify-content-center">
    <div class="col-12 col-md-6 my-2">
      <h3>お知らせ <span class="badge badge-dark float-right"><?=is_array($news) ? count($news) : 0?></span></h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">News Title</th>
            <th scope="col">Published Date</th>
          </tr>
        </thead>
        <tbody>
			<?php foreach ($news as $i => $row) : ?>
          <tr>
            <th scope="row"><?=($i+1)?></th>
            <td><a href=""><?=$row['title']?></a></td>
            <td><a href=""><?=$row['published_at']?></a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a href="<?=site_url('news')?>" class="btn btn-outline-dark btn-block"><i class="fas fa-cog"></i> Manage News</a>
    </div>

    <div class="col-12 col-md-6 my-2">
      <h3>オンラインショップ <span class="badge badge-dark float-right"><?=is_array($products) ? count($products) : 0?></span></h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Items</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($products as $i => $row) : ?>
          <tr>
		    <th scope="row"><?=($i+1)?></th>
            <td><a href=""><?=$row['name']?></a></td>
            <td><a href="">¥<?=$row['price']?></a></td>
          </tr>
		  <?php endforeach; ?>
        </tbody>
      </table>
      <a href="<?=site_url('products')?>" class="btn btn-outline-dark btn-block"><i class="fas fa-cog"></i> Manage Shop</a>
    </div>

  </div>