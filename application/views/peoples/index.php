<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h3>List Of People</h3>
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