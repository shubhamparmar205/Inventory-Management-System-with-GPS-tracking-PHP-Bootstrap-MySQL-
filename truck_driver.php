<?php
  $page_title = 'All Locations';
  require_once('includes/load.php');
  // Check user's permission level
  page_require_level(1);

  // Fetch data from the locations table
  $all_locations = find_all('locations');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Locations</span>
        </strong>
        <!-- Add a link to add new location -->
        <!-- <a href="add_location.php" class="btn btn-info pull-right btn-sm"> Add New Location</a> -->
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Driver name</th>
              <th>Link</th> <!-- Added link column -->
            </tr>
          </thead>
          <tbody>
            <?php foreach($all_locations as $location): ?>
              <tr>
                <td class="text-center"><?php echo count_id(); ?></td>
                <td><?php echo remove_junk($location['latitude']); ?></td>
                <td><?php echo remove_junk($location['longitude']); ?></td>
                <td><?php echo remove_junk($location['username']); ?></td>
                <?php $l=$location['link'];?>
                <td><a href="<?php echo $location['link']; ?> "><?php echo $location['link']; ?></a></td> <!-- Fetch link data -->
                <!-- Add more columns as needed -->
                <td class="text-center">
                  <div class="btn-group">
                    <!-- Add edit and delete actions if required -->
                    <!-- <a href="edit_location.php?id=<?php echo (int)$location['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="delete_location.php?id=<?php echo (int)$location['id']; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a> -->
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
