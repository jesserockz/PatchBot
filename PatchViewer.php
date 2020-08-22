<?php

require('PatchObject.php');
require('Database.php');

date_default_timezone_set('UTC');
$db = new Database(__DIR__ . '/db.json');
if (!$db->load()) {
	exit(1);
}
$db->sort();

?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#list').DataTable();
      });
    </script>
    <title>PatchBot</title>
  </head>
  <body>
    <div class="container p-5">
      <h2 class="mb-4"><a class="text-decoration-none" href="">Patch Notification Robot</a></h2>
      <p class="text-center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=WYQZCVJPVSS5L&amp;source=url"><img src="assets/btn_donateCC_LG.gif" alt="Donate" /></a></p>
      <p><a href="https://www.patchbot.de/rss.xml"><img src="assets/rss.png" alt="Subscribe" /></a> <a href="https://twitter.com/Patchbot_de"><img src="assets/twitter.png" alt="Follow me" /></a> <a href="https://github.com/stelas/PatchBot"><img src="assets/github.png" alt="Fork me" /></a> Providing you the latest update notifications.</p>
      <table id="list" class="table table-bordered table-hover table-sm" data-order='[[ 4, "desc" ]]' data-page-length='25'>
        <thead class="thead-dark">
          <tr>
            <th>Vendor</th>
            <th>Product</th>
            <th>Branch</th>
            <th>Version</th>
            <th title="*) or first discovery time">Release Date*</th>
          </tr>
        </thead>
        <tbody>
<?php

	for ($i = 0; $i < $db->count(); $i++) {
		$patch = $db->get($i);
		echo '<tr>';
		echo '<td>' . $patch->getVendor() . '</td>';
		echo '<td><a href="' . $patch->getURL() . '">' . $patch->getProduct() . '</a></td>';
		echo '<td>' . $patch->getBranch() . '</td>';
		echo '<td>' . $patch->getVersion() . '</td>';
		echo '<td>' . date('Y-m-d', $patch->getTimestamp()) . '</td>';
		echo '</tr>' . "\r\n";
	}

?>
        </tbody>
      </table>
      <div class="text-right">
        <p><a href="https://www.dateihal.de/cms/imprint">Imprint</a> &amp; <a href="https://www.dateihal.de/cms/privacy">Privacy</a></p>
      </div>
    </div>
  </body>
</html>
