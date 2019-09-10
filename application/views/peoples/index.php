<div class="container">
  <h3 class="mt-3">List Of People</h3>
  <div class="row">
    <div class="col-md-6">
      <form action="<?= base_url('peoples'); ?>" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off" autofocus>
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <h5>Result : <?= $total_rows; ?></h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (empty($peoples)) :
            echo '
            <tr>
              <td colspan="4">
                <div class="alert alert-danger text-center mt-2" role="alert">
                  <h4>Data ' . $keyword . ' Not Found !</h4>
                </div>
              </td>
            </tr>';
          endif;
          $i = 1;
          foreach ($peoples as $people) : ?>
            <tr>
              <th scope="row"><?= ++$start_page; ?></th>
              <td><?= $people['name']; ?></td>
              <td><?= $people['email']; ?></td>
              <td>
                <a href="" class="badge badge-warning">detail</a>
                <a href="" class="badge badge-success mx-2">edit</a>
                <a href="" class="badge badge-danger">delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?= $this->pagination->create_links(); ?>
    </div>
  </div>
</div>