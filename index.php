
<?php require("resourses/conf/router.php");
header("Location: http://".$_SERVER['HTTP_HOST']."/".$routing['layout']."/".$routing['start']);
?>