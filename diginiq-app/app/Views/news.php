<div class="row justify-content-center">
    <div class="col-12 col-md-12">
      <div class="d-flex">
        <h3><i class="fas fa-newspaper"></i> Manage News</h3>
        <div class="ml-auto">
          <button type="button" class="btn btn-dark d-none" data-toggle="modal" data-target="#addCatModal"><i class="fas fa-plus-square fa-fw"></i> Add Category</button>
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#formModal"><i class="fas fa-plus fa-fw"></i> Post News</button>
        </div>
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">News</th>
            <th scope="col" width="250">Action</th>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($news as $i => $row) :
			$title   = $row['title'];
			$content = $row['content'];
		?>
          <tr>
            <th scope="row"><?=($i+1)?></th>
            <td>
              <h4><?=$title?></h4>
              <p><?=nl2br($content)?></p>
            </td>
            <td>
              <div class="btn-group btn-group-sm" role="group" aria-label="News Modal">
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#viewModal" data-title="<?=$title?>" data-content="<?=nl2br($content)?>"><i class="fas fa-eye fa-fw"></i> View</button>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#formModal" data-id="<?=$row['id']?>" data-title="<?=$title?>" data-content="<?=$content?>" data-backdrop="static"><i class="fas fa-edit fa-fw"></i> 編集</button>
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
        <p id="content-view"></p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="post">
		<input type="hidden" id="id" name="id" value="">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"><i class="fas fa-file-alt fa-fw"></i> <span id="formType"></span> Post News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
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
