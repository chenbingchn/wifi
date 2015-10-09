
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">body{margin:0;padding:0;}</style>

<?php
if (isset($_GET['new'])) {
    echo '<iframe id="content" height="100%" width="100%" src="' . $_GET['new'] . '"></iframe>';
} else {
    echo '<p style="text-align:center;color:red;margin-top:30%;">No target url.</p>';
}
?>