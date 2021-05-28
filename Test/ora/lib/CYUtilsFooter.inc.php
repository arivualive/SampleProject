<?php
/**
 * 【フッターファイル】
 *
 * @package default
 * @version $Id: CYUtilsFooter.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

if (isset($_SERVER['HTTP_X_CY_VTIME'])) {
?>
<br>
<font color="#CCCCCC"><?php echo $_SERVER['HTTP_X_CY_VTIME']; ?></font>
<?php 
} 
?>
</body>
</html>
<?php
?>