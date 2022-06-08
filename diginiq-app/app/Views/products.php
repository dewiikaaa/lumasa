<div class="row justify-content-center">
    <div class="col-12 col-md-12">
      <div class="d-flex">
        <h3><i class="fas fas fa-store fa-fw"></i> Manage Products</h3>
        <div class="ml-auto">
          <button type="button" class="btn btn-dark d-none" data-toggle="modal" data-target="#addCatModal"><i class="fas fa-plus-square fa-fw"></i> Add Category</button>
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#formModal"><i class="fas fa-plus fa-fw"></i> Add Product</button>
        </div>
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Product Name & Description</th>
            <th scope="col" width="250">Action</th>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($products as $i => $row) : 
			$title   = $row['name'];
			$price   = $row['price'];
			$content = $row['description'];
			$imgUrl  = base_url('uploads/files') . '/' . $row['picture'];
		?>
          <tr>
            <th scope="row"><?=($i+1)?></th>
            <th><img src="<?=$imgUrl?>" width="250"></th>
            <td>
              <h4><?=$title?></h4>
              <p><?=nl2br($content)?></p>
            </td>
            <td>
              <div class="btn-group btn-group-sm" role="group" aria-label="News Modal">
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#viewModal" data-image="<?=$imgUrl?>" data-title="<?=$title?>" data-content="<?=nl2br($content)?>"><i class="fas fa-eye fa-fw"></i> View</button>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#formModal" data-id="<?=$row['id']?>" data-title="<?=$title?>" data-price="<?=$price?>" data-content="<?=$content?>" data-backdrop="static"><i class="fas fa-edit fa-fw"></i> 編集</button>
                <button type="button" class="btn btn-outline-dark deleteBtn" data-id="<?=$row['id']?>" data-title="<?=$title?>"><i class="fas fa-trash fa-fw"></i> 削除</button>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>

  <!-- Modal View -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel"><i class="fas fa-eye fa-fw"></i> Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 id="title-view"></h3>
        <img id="picture-view" class="mx-auto d-block my-3" height="250">
        <p id="content-view"></p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="post" enctype="multipart/form-data">
		<input type="hidden" id="id" name="id" value="">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"><i class="fas fa-file-alt fa-fw"></i> <span id="formType"></span> Product Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <div class="form-group">
            <label for="title">Product Name</label>
            <input type="text" class="form-control" name="name" id="title" placeholder="">
          </div>
          <div class="form-group">
            <label for="content">Product Description</label>
            <textarea class="form-control" name="description" id="content" rows="3"></textarea>
          </div>
		  <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="">
          </div>
          <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" accept="image/png, image/jpg, image/jpeg" class="filestyle" data-btnClass="btn btn-outline-dark text-nowrap" data-text="Upload">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> Cancel</button>
        <button type="submit" class="btn btn-dark"><i class="fas fa-save fa-fw"></i> Save</button>
      </div>
    </form>
  </div>
</div>