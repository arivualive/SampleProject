<?php 
	error_reporting(0);
	session_start();
	/* checking that the channel name is correct or not*/
	if(!isset($_GET['channel']) && !isset($_POST['channel_name']))
	{
		echo "wrong URL<br><br>";
		echo "URLに誤りがあるためアクセスできません。";
		exit;
	}
	else
	{
		/*loading the database from json files */

		//setting the server timezone to Tokyo time
		date_default_timezone_set("Asia/Tokyo");
		//loading infromations of all folders
		$data_results = file_get_contents('jsonFiles/folder.json');
		$folderJsonData = json_decode($data_results,true);
		//loading infromations of all files
		$data_results = file_get_contents('jsonFiles/file.json');
		$fileJsonData = json_decode($data_results,true);
		//loading infromations of all schools
		$data_results = file_get_contents('jsonFiles/school.json');
		$schoolJsonData = json_decode($data_results,true);
		
		/*loading the database from json files */

		$channelName = "";
		//  Getting the channel Name
		if(isset($_GET['channel']))
			$channelName = $_GET['channel'];
		else
			$channelName = $_POST['channel_name'];
		
		if($channelName == "" || !isset($schoolJsonData[$channelName]))
		{
			echo "wrong URL<br><br>";
			echo "URLに誤りがあるためアクセスできません。";
			exit;
		}
		else if($schoolJsonData[$channelName]['active'] == 0)
		{
			echo "Your channel has been disabled. Now to get back your channel contact with KJS Administrator.<br><br>";
			echo "チャンネルが無効になっています。KJS管理者までに連絡お願いいたします。";
			exit;
		}
		/* initializing laguage parameter */
			if(isset($_GET['ln']))
			{
				$ln = $_GET['ln'];
				if(intval($ln) < 1 || intval($ln) > 2)
					$ln = $schoolJsonData[$channelName]['defaultLanguage'];
			}
			else
			{
				$ln = $schoolJsonData[$channelName]['defaultLanguage'];
			}
			if($ln == $schoolJsonData[$channelName]['defaultLanguage'])
				$defaultLanguageSelected = 1;
			else
				$defaultLanguageSelected = 0;

			$languageJsonFile = "";
			switch($ln)
			{
				case 1:
					$data_results = file_get_contents('lang/jp.json');
					$languageJsonFile = json_decode($data_results,true);
					break;
				case 2:
					$data_results = file_get_contents('lang/en.json');
					$languageJsonFile = json_decode($data_results,true);
					break;
			}
		/* End */
	}
	/* setting the credentials of login */
	$from =(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."$_SERVER[REQUEST_URI]";
	$to = ("Terms_of_service.php?from=".urlencode($from));
	$studentPageOfThisChannel = "tbcontents.php?channel=".$channelName;
	$protocol = "";
	if (isset($_SERVER['HTTPS'])) {
		$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	} else {
		$protocol = 'http';
	}
	$adminURL =  ($protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME'])."/admin.php" .'?channel='.$channelName);
?>
<script src="tbwp4/script/jquery.min.js"></script>
<script>
	/* checking that this client device is already logged in or eligible to log in or not */
	/* getting the browser name of the client side */
	var channelName = "<?=$channelName;?>";
	/* getting browser-OD as index */
	function isMobile() {
		var check = false;
		(function(a){
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) 
			check = true;
		})(navigator.userAgent||navigator.vendor||window.opera);
		return check;
	}
	function isMobileTablet(){
		var check = false;
		(function(a){
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) 
				check = true;
		})(navigator.userAgent||navigator.vendor||window.opera);
		return check;
	}
	var browser = (function (agent) {
		switch (true) {
			case agent.indexOf("edge") > -1: return "edge";
			case agent.indexOf("edg") > -1: return "newEdge";
			case agent.indexOf("opr") > -1 && !!window.opr: return "other";
			case agent.indexOf("chrome") > -1 && !!window.chrome: return "chrome";
			case agent.indexOf("trident") > -1: return "ie";
			case agent.indexOf("firefox") > -1: return "firefox";
			case agent.indexOf("safari") > -1: return "safari";
			default: return "other";
		}
	})(window.navigator.userAgent.toLowerCase());

	var od = (function(userAgent){
				if(isMobile() == false && isMobileTablet() == false)
				{
					// it is sure that client device is not mobile or tablet. So the device must be a PC. Now we will check the OS of the PC.
					switch(true)
					{
						case (userAgent.indexOf('macintosh') > -1 ||userAgent.indexOf('macintel') > -1 ||userAgent.indexOf('macppc') > -1 ||userAgent.indexOf('mac68k') > -1): return "mac_pc";
						case ((userAgent.indexOf('win32') > -1 ||userAgent.indexOf('win64') > -1 ||userAgent.indexOf('windows') > -1 ||userAgent.indexOf('wince') > -1) && userAgent.indexOf('windows nt 10.0') > -1): return "windows_10";
						case ((userAgent.indexOf('win32') > -1 ||userAgent.indexOf('win64') > -1 ||userAgent.indexOf('windows') > -1 ||userAgent.indexOf('wince') > -1) && userAgent.indexOf('windows nt 10.0') == -1): return "windows_other";
						default: return "other"; // i.e. this device is PC but OS is not familiar.
					}
				}
				else
				{
					// this device is mobile or tablet. Now we will determine the OS of this device.
					switch(true)
					{
						case (userAgent.indexOf('iphone') != -1): return "ios_iphone";
						case (userAgent.indexOf('ipod') != -1 || userAgent.indexOf('ipad') != -1): return "ios_other";
						case (userAgent.indexOf ( 'android' )  !=  -1 && userAgent.indexOf ( 'mobile' )  !=  -1): return "android_smartphone";
						case (userAgent.indexOf ( 'android' )  !=  -1 && userAgent.indexOf ( 'mobile' )  ==  -1): return "android_other";	// 'android' will be in userAgent but 'mobile' will not be in userAgent.
						default: return "other"; // i.e. this device is mobile/tablet but OS is not familiar
					}
				}
			})(window.navigator.userAgent.toLowerCase());
	browser = browser + "-" + od;
	/* getting browser-OD as index */
	var A = parseInt(<?=$schoolJsonData[$channelName]['usedAdmin']?>);
	var B = parseInt(<?=$schoolJsonData[$channelName]['allocatedAdmin']?>);
	if (typeof(Storage) !== "undefined")
	{
		if(localStorage.hasOwnProperty('loggedOn-'+channelName))	// checking that webstorage loggedOn has been already set or not
		{
			//alert(browser);
			var blackListedBrowserTime = <?php echo json_encode($schoolJsonData[$channelName]['blackListedBrowserTime']);?>;
			if(!blackListedBrowserTime.hasOwnProperty(browser))	// checking that blacklisted time for this browser does not exists?
			{
				//access
			}
			else if(blackListedBrowserTime[browser] < localStorage.getItem("loggedOn-"+channelName))	// checking that blackListedBrowserTime for this browser is less than webstorage loggedOn time or not
			{
				// access
			}
			else
			{
				// webstorage for loggedOn delete + reload page
				localStorage.removeItem("loggedOn-"+channelName);
				location.reload();
			}
		}
		else if(A < B)
		{
			// forwarding to agreement page for agreement and (setting webstorage of loggedOn on client machine + update spaChannelDBManipulation + access)
			window.location.href = "<?=$to;?>";
		}
		else
		{
			// no access to admin page.
			alert("<?=$languageJsonFile['admin_Backend_alert_cross_admin_count_msg1'];?>");
			window.location.href = "<?=$studentPageOfThisChannel;?>";
		}
	}
	/* checking that this client device is already logged in or eligible to log in or not */
</script>
<?php
	// error_reporting(0);
	//header('Content-type: application/json');
	if(!isset($_GET['channel']) && !isset($_POST['channel_name']))
	{
		echo "wrong URL";
		exit;
	}
	else
	{
		$vm = 0;
		if(isset($_GET['vm']))
			$vm = $_GET['vm'];
		
		$folderName = "";
		$folderPathArray = array();
		if(isset($_GET['folder']))
			$folderName = urldecode($_GET['folder']);
		if($folderName == "")
			$folderName = $channelName;
		else
			$folderPathArray = explode("/",$folderName);

		
		if(!file_exists("./contents/".$folderName))
		{
			if($vm)
			{
				if($defaultLanguageSelected)
				{
					header("Location: admin.php?channel=".$channelName."&vm=1");
				}
				else
				{
					header("Location: admin.php?channel=".$channelName."&vm=1"."&ln=".$ln);
				}
			}
			else
			{
				if($defaultLanguageSelected)
				{
					header("Location: admin.php?channel=".$channelName);
				}
				else
				{
					header("Location: admin.php?channel=".$channelName."&ln=".$ln);
				}
			}
		}
		$breadCrumbUrl = array();
		$till = count($folderPathArray);
		$url = ($vm == 0) ? (($defaultLanguageSelected)?('admin.php?channel='.$channelName."&folder="):('admin.php?channel='.$channelName."&ln=".$ln."&folder=")) : (($defaultLanguageSelected)?('admin.php?channel='.$channelName."&vm=1"."&folder="):('admin.php?channel='.$channelName."&vm=1"."&ln=".$ln."&folder="));
		for($i = 0 ; $i < $till ; $i++)
		{
			$url = $url.$folderPathArray[$i];
			$breadCrumbUrl[$folderPathArray[$i]] = $url; 
			if($i < $till)
				$url = $url.urlencode("/");
		}
		$fileMoveUrl = array();
		$url = "";
		for($i = 0 ; $i < $till ; $i++)
		{
			$url = $url.$folderPathArray[$i];
			$fileMoveUrl[$folderPathArray[$i]] = $url; 
			if($i+1 < $till)
			{
				$url = $url.("/");
			}
		}
	}

	/// this function is for playing file in web player. 
	if (isset($_GET['f'])) {											
		// echo '動画再生モード(' . $_GET['f'] . ')' . '<br>';
		if (!file_exists('./contents/'.$channelName.'/'. $_GET['f'])) {
			echo $languageJsonFile['admin_Backend_alert_NoContents'];
			exit;
		}
	} 

	$foldersTable = [];
	foreach (glob('contents/'.$folderName.'/'.'*') as $folder) {
		if (is_dir($folder) && pathinfo($folder, PATHINFO_BASENAME) != "wastebin") {
			$tmp = [];
			// $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
			$tmp['name'] = pathinfo($folder, PATHINFO_BASENAME);
			$tmp['path'] = realpath($folder);
			$tmp['displayName'] = $folderJsonData[$tmp['name']]['displayName'];
			$tmp['modifyDate'] = strtotime($folderJsonData[$tmp['name']]['modifyDate']);
			$foldersTable[] = $tmp;
		}
	}

	$sort = [];
	$foldersList = [];
	foreach ($foldersTable as $folder) {
		$sort[] = $folder['modifyDate'];
		$foldersList[] = $folder['displayName'];
	}
	array_multisort($sort, SORT_DESC, SORT_NUMERIC, $foldersTable);

	$contentsTable = [];
	foreach (glob('contents/'.$folderName . '/*') as $content) {
		if (is_file($content)) {
			$tmp = [];
			// $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
			$tmp['name'] = pathinfo($content, PATHINFO_BASENAME);
			$tmp['fileType'] = explode(".",$tmp['name'])[1];
			$tmp['path'] = realpath($content);
			$tmp['displayName'] = $fileJsonData[$tmp['name']]['displayName'];
			$tmp['modifyDate'] = strtotime($fileJsonData[$tmp['name']]['modifyDate']);
			if(isset($fileJsonData[$tmp['name']]['viewingPeriod']))
				$tmp['viewingPeriod'] = $fileJsonData[$tmp['name']]['viewingPeriod'];
			if(isset($fileJsonData[$tmp['name']]['password']))
				$tmp['password'] = $fileJsonData[$tmp['name']]['password'];
			if($fileJsonData[$tmp['name']]['active'] == 1)
				$contentsTable[] = $tmp;
		}
	}
	// all possible types of mp4 file type
	$fileGroup1 = array("mp4","MP4","Mp4","mP4");	// this won't allow the download button


	$sort = [];
	foreach ($contentsTable as $content) {
		$sort[] = $content['modifyDate'];
	}
	array_multisort($sort, SORT_DESC, SORT_NUMERIC, $contentsTable);

	function time_changeTo_string($datetime, $full = false) {
		global $languageJsonFile;
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => $languageJsonFile["admin_time_year"],
			'm' => $languageJsonFile["admin_time_month"],
			'w' => $languageJsonFile["admin_time_week"],
			'd' => $languageJsonFile["admin_time_day"],
			'h' => $languageJsonFile["admin_time_hours"],
			'i' => $languageJsonFile["admin_time_minute"],
			's' => $languageJsonFile["admin_time_second"],
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . '' . $v . ($diff->$k > 1 ? $languageJsonFile["admin_time_s"] : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . $languageJsonFile["admin_time_ago"] : $languageJsonFile["admin_time_justNow"];
	}

	function get_mb($fileSize) 
	{
		return sprintf("%4.1f MB", $fileSize/1048576);
	}

?>
<!DOCTYPE html>
<html lang="jp">
	<head>
		<?php 
			$path = './tbwp4/';
			$parts = 'bscss';
			require './tbwp4/php/package.php'; // Bootstrap CSSセット
		?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="TBmall">
		<meta name="author" content="TBmall">		
		<title>TBmall - Admin</title>
				
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/fav.svg">
		
		<!-- Stylesheets -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/vertical-responsive-menu.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-responsive.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.css">	
		<link rel="stylesheet" type="text/css" href="vendor/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="vendor/DataTables/Responsive-2.2.5/css/responsive.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
		<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
		
	</head>
	<body>
		<!-- First Nav Bar-->
		<nav id = "firstNav" class="navbar bg-white fixed-top ">
			<div class="container-fluid">
				<div class="row align-items-end">
					<div class="tbmall_admin_logo" id="logo">
						<a href="<?php echo ($vm == 0)?(($defaultLanguageSelected)?("admin.php?channel=".$channelName):("admin.php?channel=".$channelName."&ln=".$ln)):(($defaultLanguageSelected)?("admin.php?channel=".$channelName."&vm=1"):("admin.php?channel=".$channelName."&vm=1"."&ln=".$ln));?>" ><img src="images/logo.svg" alt="logo"></a>
					</div>
					<div class="navbar-brand channel_custom" >
						<?php echo $schoolJsonData[$channelName]['displayName'];?>
					</div>
				</div>
				<div class="row ml-auto mr-0">
					<ul class="nav navbar-nav flex-row float-right">
						<li id = "gridViewButton" <?php echo ($vm == 0)?"style='display:none;'":"";?> >
							<a href="<?php echo ($folderName == $channelName)?(($defaultLanguageSelected)?('admin.php?channel=' . $channelName):('admin.php?channel=' . $channelName."&ln=".$ln)):(($defaultLanguageSelected)?('admin.php?channel=' . $channelName . "&folder=".urlencode($folderName)):('admin.php?channel=' . $channelName . "&folder=".urlencode($folderName)."&ln=".$ln)); ?>" class="option_links"><i class="fas fa-th"></i></a>
						</li>
						<li id = "listViewButton" <?php echo ($vm == 1)?"style='display:none;'":"";?>>
							<a href="<?php echo ($folderName == $channelName)?(($defaultLanguageSelected)?('admin.php?channel=' . $channelName."&vm=1"):('admin.php?channel=' . $channelName."&vm=1"."&ln=".$ln)):(($defaultLanguageSelected)?('admin.php?channel=' . $channelName."&vm=1" . "&folder=".urlencode($folderName)):('admin.php?channel=' . $channelName."&vm=1" . "&folder=".urlencode($folderName)."&ln=".$ln)); ?>" class="option_links"><i class="fas fa-list-ul"></i></a>
						</li>
						<li>
							<form action="searchAdmin.php" method="GET" name="searchForm">
								<div class="search120">
									<div class="ui search">
										<div class="ui left icon input swdh10">
											<input value = "<?php echo $channelName;?>" type = "hidden" name = "channel">
											<input value = "<?php echo $folderName;?>" type = "hidden" name = "folder">
											<?php if($vm):?>
												<input value = "<?php echo $vm;?>" type = "hidden" name = "vm">
											<?php endif;?>
											<?php if(!$defaultLanguageSelected):?>
												<input value = "<?php echo $ln;?>" type = "hidden" name = "ln">
											<?php endif;?>
											<input class="prompt srch10" type="search"  name = "searchKey" placeholder="<?=$languageJsonFile['SearchAdmin_navbar_search'];?>" pattern="(\s)*(\S)+(.)*" title="<?=$languageJsonFile['admin_Backend_alert_SearchKey_Whitespace']?>" required>
											<i class='uil uil-search-alt icon icon1'></i>
											<button class="rvsrch_btn"><i class="uil uil-search"></i></button>
										</div>
									</div>
								</div>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Second Nav Bar-->
		<nav class="navbar bg-white secondNav" id ="secondNav">
			<div class="nav nav-tabs help_tabs tab_crse"  role="tablist">
				<?php
					$till = count($folderPathArray);
					if($till <= 1):
				?>
				<a class="nav-item nav-link"  href="<?php echo ($vm == 1)?(($defaultLanguageSelected)?('admin.php?channel='.$channelName."&vm=1"):('admin.php?channel='.$channelName."&vm=1"."&ln=".$ln)):(($defaultLanguageSelected)?('admin.php?channel='.$channelName):('admin.php?channel='.$channelName."&ln=".$ln));?>" ><i class="fas fa-home home_btn"></i> </a>
				<?php else:?>
					<?php for ($i=0 ; $i < $till ; $i++):?>
						<?php if($i == 0):?>
							<a class="nav-item nav-link"  href="<?php echo ($vm == 1)?(($defaultLanguageSelected)?('admin.php?channel='.$channelName."&vm=1"):('admin.php?channel='.$channelName."&vm=1"."&ln=".$ln)):(($defaultLanguageSelected)?('admin.php?channel='.$channelName):('admin.php?channel='.$channelName."&ln=".$ln));?>" ><i class="fas fa-home home_btn"></i> </a>
						<?php elseif($i == $till - 1):?>
							<i class="fas fa-chevron-right tab_align"></i><a class="nav-item nav-link active"　href="<?php echo $breadCrumbUrl[$folderPathArray[$i]];?>" ><?php echo $folderJsonData[$folderPathArray[$i]]['displayName'];?></a>
						<?php else:?>
							<i class="fas fa-chevron-right tab_align"></i><a class="nav-item nav-link"  href="<?php echo $breadCrumbUrl[$folderPathArray[$i]];?>" ><?php echo $folderJsonData[$folderPathArray[$i]]['displayName'];?></a>
						<?php endif;?>
					<?php endfor;?>
				<?php endif;?>									
			</div>	
		</nav>
		<nav class="vertical_nav" id="sidebar-height">
			<div class="left_section menu_left" id="js-menu" >
				<div class="left_section">
					<ul>
						<li class="menu--item" >
							<span class="menu--label ml-4"><?=$languageJsonFile['admin_sidebar_navication'];?></span>
							<div class="side_menu_custom">
								<button id="toggleMenu" class="toggle_menu">
									<i onclick="sideNavbarIcontoggle(this)" class="fas fa-arrow-right"></i>
								</button>
								<button onclick="window.location.href='#category'" class="category_btn_mbl">
									<i class="fas fa-folder"></i>
								</button>
								<button  onclick="window.location.href='#contents'" class="contents_btn_mbl">
									<i class="fas fa-file-video"></i>
								</button>
								<button id="collapse_min" class="collapse_min">
									<i onclick="sideNavbarIconcollapse(this)" class="fas fa-arrow-right"></i>
								</button>
								<button id="collapse_menu" class="collapse_menu">
									<i onclick="sideNavbarIconcollapse(this)" class="fas fa-arrow-left"></i>
								</button>
							</div>
						</li>
						<li class="menu--item">
							<div  class="">
								<i class="fas fa-folder fa-fw menu--icon category-color"></i>
								<span class="menu--label font-weight-bold"><?=$languageJsonFile['admin_sidebar_category'];?></span>
							</div>
						</li>
						<li class="menu--item">
							<a href="" class="menu--link"  data-toggle="modal" data-target="#newFolder-modal">
								<i class='fas fa-folder-plus fa-fw menu--icon'></i>
								<span class="menu--label"><?=$languageJsonFile['admin_sidebar_newCategory'];?></span>
							</a>
						</li>
					</ul>
				</div>
				<div class="left_section pt-2">
					<ul>
						<li class="">
							<div class="">
								<i class="fas fa-file-video fa-fw menu--icon contents-color"></i>
								<span class="menu--label font-weight-bold"><?=$languageJsonFile['admin_sidebar_contents'];?></span>
							</div>
						</li>
						<li class="menu--item">
							<a href="<?php echo ($vm == 0)?(($defaultLanguageSelected)?('recyclebin.php?channel=' . $channelName):('recyclebin.php?channel=' . $channelName."&ln=".$ln)):(($defaultLanguageSelected)?('recyclebin.php?channel=' . $channelName."&vm=1"):('recyclebin.php?channel=' . $channelName."&vm=1"."&ln=".$ln)) ;?>" class="menu--link">
								<i class='fas fa-trash-alt fa-fw menu--icon'></i>
								<span class="menu--label"><?=$languageJsonFile['admin_sidebar_trash'];?></span>
							</a>
						</li>
					</ul>
				</div>
				<div class="left_section pt-2">
					<ul>
						<li class="menu--item">
							<a href="<?php echo (($defaultLanguageSelected)?('channelDetails.php?channel=' . $channelName):('channelDetails.php?channel=' . $channelName."&ln=".$ln)); ?>" class="menu--link">
								<i class='fas fa-info-circle fa-fw menu--icon'></i>
								<span class="menu--label"><?=$languageJsonFile['admin_sidebar_ChannelDetails'];?></span>
							</a>
						</li>
						<li class="menu--item">
							<a href="<?php echo (($defaultLanguageSelected)?('systemRequirements.php?channel=' . $channelName):('systemRequirements.php?channel=' . $channelName."&ln=".$ln)); ?>" class="menu--link">
								<i class='fas fa-laptop-code fa-fw menu--icon '></i>
								<span class="menu--label"><?=$languageJsonFile['admin_sidebar_operationEnvironment'];?></span>
							</a>
						</li>
						<li class="menu--item">
							<a href="<?php echo (($defaultLanguageSelected)?('faq.php?channel=' . $channelName):('faq.php?channel=' . $channelName."&ln=".$ln));?>" class="menu--link">
								<i class='fas fa-question-circle fa-fw menu--icon' ></i>
								<span class="menu--label"><?=$languageJsonFile['admin_sidebar_faq'];?></span>
							</a>
						</li>
						<li class="menu--item">
							<a href="<?php echo (($defaultLanguageSelected)?('contactUs.php?channel=' . $channelName):('contactUs.php?channel=' . $channelName."&ln=".$ln)); ?>" class="menu--link">
								<i class='fas fa-envelope fa-fw menu--icon'></i>
								<span class="menu--label"><?=$languageJsonFile['admin_sidebar_contactUs'];?></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="wrapper">
			<!-- Body -->
			<div class="admin_foot" id="navHeight">
				<div class="container-fluid">			
					<div class="row">
						<div class="col-lg-12 custom_padding">
							<div class="file_upload_title">
								<i class="fas fa-upload mr-2 custom-color"></i><?=$languageJsonFile['admin_upload_contentsUpload'];?>
							</div>
							<div class="card_dash1">
								<form action="" method="POST" class="upload_form" enctype="multipart/form-data" name="fileUploadingForm" id = "fileUploadingForm">
									<div class="row">
										<div class="col-lg-4 col-md-6">
											<div class="input-group custom-top upload-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-file-video fa-fw"></i></i><em class="Upload-name"><?=$languageJsonFile['admin_upload_Upload'];?></em></span>
												</div>
												<div class="custom-file"> 
													<input type="file" name="upload_file" class="custom-file-input form-control" id="inputFileUpload" onchange="givenFileNameFetching(this,'inputFileUpload')" required>
													<label  class="custom-file-label" for="customFile" data-browse="<?=$languageJsonFile['admin_upload_con_browse'];?>"><?=$languageJsonFile['admin_upload_drag&drop'];?></label>
												</div>
												<div class="invalid-feedback"><?=$languageJsonFile['admin_upload_con_notChoosen'];?></div>
											</div>
										</div>
										<input type="text" id = "channel_name" name="channel_name" value='<?php echo $channelName;?>' hidden>
										<input type="text" id = "folderPath" name = "folderPath" value='<?php echo $folderName;?>' hidden>
										<div class="col-lg-5 col-md-6">
											<div class="input-group position-relative upload-group displayName-top">
												<div class="input-group-prepend ">
													<span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature fa-fw"></i><em class="Upload-name"><?=$languageJsonFile['admin_upload_contentsDisplayname'];?></em></span>
												</div>
												<input type="search" id="fileDisplayName" name = "displayName"  oninput = 'fileNameDuplicationChecking("<?php echo $folderName;?>","<?php echo $channelName;?>","uploadButton","fileDisplayNameErr","fileDisplayName");' class="form-control" required>	  
												<span class="form-clear d-none"><i class="fas fa-times"></i></span>
											</div>
											<label class="custom-danger mt-2 ml-4" id="fileDisplayNameErr" hidden>*<?=$languageJsonFile['admin_upload_contents'];?></label>
										</div>
										<div class="col-lg-3 col-md-12" id="category">
											<div class="form-group">
												<button type="submit" id = "uploadButton" class="btn btn-block login-btn custom-bottom"><i class="fas fa-cloud-upload-alt mr-2"></i><?=$languageJsonFile['admin_upload_upload'];?></button>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
										</div>
										<div class="col-lg-6">
											<div id = "progressDiv" class="form-group" style="display:none;">
												<div class="progressTxt" ></div><br>
												<div class="progress">
													<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
										</div>
										<div class="col-lg-6">
											<div class="form-group alert alert-dismissible" role="alert" id = "uploadSuccessAlert" style="display:none;">
												<p>Better check yourself, you're not looking too good.</p>
											</div>
										</div>
									</div>
								</form>	
							</div>					
						</div>
						<?php if(count($foldersTable)>0 || count($contentsTable)>0): ?>
							<div class="col-lg-12">
								<div class="divider-1"></div>
							</div>
						<?php endif;?>	
						<div class="col-xl-12 col-lg-12 custom_padding">
							<div class="section3125" id="categoryHide">
								<div class="category_title" >
									<i class="fas fa-folder mr-2 category_icon"></i><?=$languageJsonFile['admin_category_categoryList'];?>
								</div>
								<div class="category_badge ml-2 "><?=count($foldersTable);?></div>
								<?php if($vm == 0 && count($foldersTable) != 0):?>
									<a class="btn bg-category sort-btn" id = "categoryDate" data-order = "ASC" class="item" onclick='sortByDate("categoryDate",<?php echo json_encode($foldersTable);?>,"folder-")'><i class="fas fa-sort-amount-down custom-white"></i></a>
									<a class="btn bg-category sort-btn" id = "categoryAlphabet" data-order = "ASC" class="item" onclick='sortByAlphabet("categoryAlphabet",<?php echo json_encode($foldersTable);?>,"folder-")'><i class="fas fa-sort-alpha-down custom-white"></i></a>
								<?php endif;?>
								<div class="la5lo1">
									<?php if($vm == 0):?>
										<div class="row category-row category-cols custom-padding">
											<?php foreach ($foldersTable as $folder) : 
												$a = strtotime($folderJsonData[$folder['name']]['modifyDate']);
												$b = strtotime(date("Y-m-d H:i:s"));
												$recentOrNot = "";
												if(($b-$a) <= 40)
												{
													$recentOrNot = "stream_bg bg-folder";
												}
												else
												{
													$recentOrNot = "stream_bg";
												}
											?> 
												<div class="col-md-1" id = "folder-<?php echo($folder['name']);?>">
													<div class="stream_1">
														<a data-foldername = <?php echo $folder['name'];?> data-vm=<?php  echo $vm;?> href="<?php echo (($defaultLanguageSelected)?(("./admin.php?channel=".urlencode($channelName)."&folder=" . urlencode($folderName.'/'.$folder['name']))):(("./admin.php?channel=".urlencode($channelName)."&ln=".$ln."&folder=" . urlencode($folderName.'/'.$folder['name'])))); ?>" class="<?php echo $recentOrNot;?>">
															<h4 id = "folderCountInfo-<?php echo($folder['name']);?>"><?php echo ($folderJsonData[$folder['name']]['displayName']); ?></h4>
															<?php $datetime =  $folderJsonData[$folder['name']]['modifyDate']; ?>
															<span> <i class="fas fa-folder fa-lg" style="color:#F9AA57"></i> : <?php echo ($folderJsonData[$folder['name']]['folderCount']); ?>  &nbsp; &nbsp; <i class="fas fa-file-video fa-lg" style="color:#A50F2D"></i> : <?php echo ($folderJsonData[$folder['name']]['fileCount']);?></span><br>
															<p><?php echo time_changeTo_string($datetime); ?></p>
														</a>
														<div class="side_drops side_dropdown">
															<a href="javascript:void(0)" style="padding:2px 4px;"><i class="fas fa-ellipsis-h" style="vertical-align: -.100em;"></i></a>
															<div class="dropdown-contents">
																<?php
																	$protocol = "";
																	if (isset($_SERVER['HTTPS'])) {
																		$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
																	} else {
																		$protocol = 'http';
																	}
																	$categoryURL = $protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
																	$categoryURL = $categoryURL.(($defaultLanguageSelected)?(($vm == 0)?(("/tbcontents.php?channel=".urlencode($channelName)."&folder=" . urlencode($folderName.'/'.$folder['name']))):(("/tbcontents.php?channel=".urlencode($channelName)."&folder=" . urlencode($folderName.'/'.$folder['name'])."&vm=".$vm))):(($vm == 0)?(("/tbcontents.php?channel=".urlencode($channelName)."&ln=".$ln."&folder=" . urlencode($folderName.'/'.$folder['name']))):(("/tbcontents.php?channel=".urlencode($channelName)."&ln=".$ln."&folder=" . urlencode($folderName.'/'.$folder['name'])."&vm=".$vm))));
																?>
																<a  class="js-tooltip js-copy copy" data-toggle="tooltip" data-placement="top" data-copy="<?php echo $categoryURL; ?>" ><span><i class="fas fa-copy fa-fw gray mr-2"></i><?=$languageJsonFile['admin_category_copy'];?></span></a>
																<a  data-toggle="modal" data-target="#editFolderModal-<?php echo ($folder['name']);?>"><span><i class="fas fa-edit fa-fw gray mr-2"></i><?=$languageJsonFile['admin_category_rename'];?></span></a>
																<a class="delete_button" data-channel=<?php echo $channelName;?> data-delete=<?php echo $folder['name'];?> data-path=<?php echo $folderName;?>><span><i class='fas fa-trash-alt fa-fw mr-2 edit-delete'></i><?=$languageJsonFile['admin_category_delete'];?></span></a>														
															</div>																											
														</div>
													</div>
												</div>
											<?php endforeach ?>
										</div>
									<?php else:?>
										<table class="table table-striped compact thead-cat" id="listViewCategoryTable" style="width:100%;">
											<thead class="thead-s">
												<tr>
													<th></th>
													<th style="padding-left:30px;" scope="col"><?=$languageJsonFile['admin_category_list_categoryName'];?></th>
													<th class="text-center"　scope="col"><?=$languageJsonFile['admin_category_list_lastUpdateDate'];?></th>
													<th class="text-center" scope="col"><?=$languageJsonFile['admin_category_list_cat_count'];?></th>
													<th class="text-center" scope="col"><?=$languageJsonFile['admin_category_list_con_count'];?></th>
													<th class="text-center" scope="col"><?=$languageJsonFile['admin_category_list_con_edit'];?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($foldersTable as $folder) : 
													$a = strtotime($folderJsonData[$folder['name']]['modifyDate']);
													$b = strtotime(date("Y-m-d H:i:s"));
													$recentOrNot = "";
													if(($b-$a) <= 40)
													{
														$recentOrNot = "font-weight-bold";	
													}
													else
													{
														$recentOrNot = "";
													}
												?> 
													<tr class="<?php echo $recentOrNot;?>">
														<td class="expanderForCategoryTable"><img src="https://datatables.net/examples/resources/details_open.png"></img></td>
														<td style="padding-left:30px;" class="cell-ta nextFolderToView" data-foldername = <?php echo $folder['name'];?> data-channel=<?php echo $channelName;?> data-vm=<?php  echo $vm;?> data-folder=<?php echo urlencode($folderName.'/'.$folder['name']);?>><?php echo ($folderJsonData[$folder['name']]['displayName']); ?></td>
														<td class="text-center nextFolderToView" data-foldername = <?php echo $folder['name'];?> data-channel=<?php echo $channelName;?> data-vm=<?php  echo $vm;?> data-folder=<?php echo urlencode($folderName.'/'.$folder['name']);?>><?php echo ($folderJsonData[$folder['name']]['modifyDate']); ?></td>
														<td class="text-center nextFolderToView" data-foldername = <?php echo $folder['name'];?> data-channel=<?php echo $channelName;?> data-vm=<?php  echo $vm;?> data-folder=<?php echo urlencode($folderName.'/'.$folder['name']);?>><?php echo ($folderJsonData[$folder['name']]['folderCount']); ?></td>
														<td class="text-center nextFolderToView" data-foldername = <?php echo $folder['name'];?> data-channel=<?php echo $channelName;?> data-vm=<?php  echo $vm;?> data-folder=<?php echo urlencode($folderName.'/'.$folder['name']);?>><?php echo ($folderJsonData[$folder['name']]['fileCount']); ?></td>
														<td class="text-center ">
															<?php
																$protocol = "";
																if (isset($_SERVER['HTTPS'])) {
																	$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
																} else {
																	$protocol = 'http';
																}
																$categoryURL = $protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
																$categoryURL = $categoryURL.(($defaultLanguageSelected)?(($vm == 0)?(("/tbcontents.php?channel=".urlencode($channelName)."&folder=" . urlencode($folderName.'/'.$folder['name']))):(("/tbcontents.php?channel=".urlencode($channelName)."&folder=" . urlencode($folderName.'/'.$folder['name'])."&vm=".$vm))):(($vm == 0)?(("/tbcontents.php?channel=".urlencode($channelName)."&ln=".$ln."&folder=" . urlencode($folderName.'/'.$folder['name']))):(("/tbcontents.php?channel=".urlencode($channelName)."&ln=".$ln."&folder=" . urlencode($folderName.'/'.$folder['name'])."&vm=".$vm))));
															?>
															<a class="js-tooltip js-copy btn btn-sm btn-secondary tab-custom-btn" data-toggle="tooltip" data-placement="top" data-copy="<?php echo $categoryURL; ?>"><i class="fas fa-copy fa-fw"></i></a>
															<a href="" data-toggle="modal" data-target="#editFolderModal-<?php echo ($folder['name']);?>" class="ml-2 btn btn-sm btn-secondary tab-custom-btn"><i class="fas fa-edit fa-fw"></i></a>
															<a href="" data-channel=<?php echo $channelName;?> data-delete=<?php echo $folder['name'];?> data-path=<?php echo $folderName;?> class="ml-4 delete_button tab-custom-btn btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-fw"></i></a>
														</td>
													</tr>
												<?php endforeach; ?> 	
											</tbody>
										</table>
									<?php endif;?>
								</div>
							</div>
						</div>
						
						<?php if(count($foldersTable)>0 && count($contentsTable)>0): ?>
							<div class="col-lg-12" id="contents">
								<div class="divider-1"></div>
							</div>
						<?php endif;?>
						
						<div class="col-xl-12 col-lg-12 custom_padding">
							<div class="section3125" id="contentsHide">
								<div class="contents_title" >
									<i class="fas fa-file-video mr-2 contents_icon"></i><?=$languageJsonFile['admin_contents_contentsList'];?>
								</div>
								<div class="contents_badge ml-2"><?=count($contentsTable);?></div>
									<?php if($vm == 0 && count($contentsTable) != 0):?>
										<a class="btn bg-contents sort-btn" id = 'contentDate' data-order = "ASC" onclick='sortByDate("contentDate",<?php echo json_encode($contentsTable);?>,"video-")' ><i class="fas fa-sort-amount-down custom-white"></i></a>
										<a class="btn bg-contents sort-btn" id = 'contentAlphabet' data-order = "ASC" onclick='sortByAlphabet("contentAlphabet",<?php echo json_encode($contentsTable);?>,"video-")' ><i class="fas fa-sort-alpha-down custom-white"></i></a>
									<?php endif;?>
								<div class="_14d25">
									<?php if($vm == 0):?>
										<?php if (!isset($_GET['f'])) : ?>
											<div class="row contents-row custom-padding">
												<?php foreach ($contentsTable as $content) : ?>
													<div class="contents-cols" id = "video-<?php $id = explode(".",$content['name']); $contentId = ($id[0]); echo $contentId;?>">
														<div class="fcrse_1 mt-2">
															<?php
																$protocol = "";
																if (isset($_SERVER['HTTPS'])) {
																	$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
																} else {
																	$protocol = 'http';
																}
																if($defaultLanguageSelected)
																	$contentURL =  ($protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME'])."/tbcontents.php" .'?channel='.$channelName.'&folder=' . urlencode($folderName) . '&f=' . $content['name']) . '&pr=' . $contentId;
																else
																	$contentURL =  ($protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME'])."/tbcontents.php" .'?channel='.$channelName.'&folder=' . urlencode($folderName) .'&ln='.$ln. '&f=' . $content['name']) . '&pr=' . $contentId;
																
																$thumbnailImgPath = "./images/courses/img-1.jpg";
																if(file_exists("./tbwp4/thumbnail/".$content['name']."/thumbnailImg.jpg"))
																	$thumbnailImgPath = "./tbwp4/thumbnail/".$content['name']."/thumbnailImg.jpg";
																switch(true)
																{
																	case file_exists("./tbwp4/files/".$content['name']."/0000_0001.MP4"): $tbMp4 = "./tbwp4/files/".$content['name']."/0000_0001.MP4"; break;
																	case file_exists("./tbwp4/files/".$content['name']."/0000_0001.mp4"): $tbMp4 = "./tbwp4/files/".$content['name']."/0000_0001.mp4"; break;
																	default: $tbMp4 = false;
																}
															?> 
															<?php if( $content['fileType'] == "mp4" || $content['fileType'] == "MP4" || $tbMp4 !== false ):
																	// showing thumbnail for core mp4 file or for TBM/TBMT mp4 file?>
																	<?php if( $tbMp4 !== false ):
																			//this block is for TBM/TBMT mp4 file?>
																			<a href="" class="play_btn_overlay clink" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path="<?php echo $content['path'] ?>">
																				<video class="fcrse_img" src="<?php echo $tbMp4."#t=10";?>" height="100" preload="metadata" ></video>
																				<?php echo (isset($content['password']))?(($content['password'] === true)?'<div class="thumb_txt_btm-password"><i class="fas fa-lock"></i></div>':''):'';?>
																				<?php if(isset($content['viewingPeriod'])):
																						if($content['viewingPeriod']['exist'] === true):?>
																							<?php  $cDTs = strtotime(now); $sDTs = strtotime($content['viewingPeriod']['startDay']); $eDTs = strtotime($content['viewingPeriod']['endDay']);
																							switch(true)
																							{
																								case ($cDTs < $sDTs):		// current datetimestamp is less than the start date timestamp 
																									$displayPeriod = '<div class="thumb_txt_btm-red">'.$languageJsonFile["admin_contents_viewing_starts"].$content["viewingPeriod"]["startDay"].'</div>';
																									$viewingExpired = true;
																									break;
																								case ($cDTs >= $sDTs && $cDTs <= $eDTs):
																									$displayPeriod = '<div class="thumb_txt_btm-right">'.$languageJsonFile["admin_contents_viewing_period"].$content["viewingPeriod"]["endDay"].'</div>';
																									$viewingExpired = false;
																									break;
																								default:
																									$displayPeriod = '<div class="thumb_txt_btm-red">'.$languageJsonFile["admin_contents_viewing_period"].$content["viewingPeriod"]["endDay"].'</div>';
																									$viewingExpired = true;
																									break;
																							}
																							echo $displayPeriod;
																						else:
																							$viewingExpired = false;
																						endif;
																					else:
																						$viewingExpired = false;
																					endif;?>
																				<div class="play_btn1"><i class="uil uil-play"></i></div>
																			</a>
																	<?php else:
																			//this block is for core mp4 file?>
																			<a href="" class="play_btn_overlay clink" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path="<?php echo $content['path'] ?>">
																				<video class="fcrse_img" src="<?php echo './contents/'.$folderName . '/'.$content['name']."#t=10";?>" height="100" preload="metadata" ></video>
																				<div class="play_btn1"><i class="uil uil-play"></i></div>
																			</a>
																	<?php endif;?>
															<?php else:
																	//showing thumbnail for Othertypes of file?>
																	<a href="" class="clink fcrse_img" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path="<?php echo $content['path'] ?>">
																		<img src="<?=$thumbnailImgPath;?>" height="100" width="100" alt="">
																		<?php echo (isset($content['password']))?(($content['password'] === true)?'<div class="thumb_txt_btm-password"><i class="fas fa-lock"></i></div>':''):'';?>
																		<?php if(isset($content['viewingPeriod'])):
																				if($content['viewingPeriod']['exist'] === true):?>
																					<?php  $cDTs = strtotime(now); $sDTs = strtotime($content['viewingPeriod']['startDay']); $eDTs = strtotime($content['viewingPeriod']['endDay']);
																					switch(true)
																					{
																						case ($cDTs < $sDTs):		// current datetimestamp is less than the start date timestamp 
																							$displayPeriod = '<div class="thumb_txt_btm-red">'.$languageJsonFile["admin_contents_viewing_starts"].$content["viewingPeriod"]["startDay"].'</div>';
																							$viewingExpired = true;
																							break;
																						case ($cDTs >= $sDTs && $cDTs <= $eDTs):
																							$displayPeriod = '<div class="thumb_txt_btm-right">'.$languageJsonFile["admin_contents_viewing_period"].$content["viewingPeriod"]["endDay"].'</div>';
																							$viewingExpired = false;
																							break;
																						default:
																							// viewing period has been expired
																							$displayPeriod = '<div class="thumb_txt_btm-red">'.$languageJsonFile["admin_contents_viewing_period"].$content["viewingPeriod"]["endDay"].'</div>';
																							$viewingExpired = true;
																							break;
																					}
																					echo $displayPeriod;
																				else:
																					$viewingExpired = false;
																				endif;
																			else:
																				$viewingExpired = false;
																			endif;?>
																		<div class="course-overlay">
																			<span class="play_btn1"><i class="uil uil-play"></i></span>
																		</div>
																	</a>
															<?php endif;?>
															
															
															<div class="admin-content">
																<div class="eps_dots more_dropdown">
																	<a href="javascript:void(0)" style="padding:2px 4px;"><i class="fas fa-ellipsis-h" style="vertical-align: -.100em;"></i></a>
																	<div class="dropdown-content">
																		<div class="private_share_switch__btn">
																			<div class="btn-private-share">
																				<div class="custom-control custom-switch">
																					<input type="checkbox" class="custom-control-input" id="privacyShare-<?php $id = explode(".",$content['name']);echo($id[0]);?>">
																					<label class="custom-control-label" for="privacyShare-<?php echo($id[0]);?>"><?=$languageJsonFile['admin_contents_private_share'];?></label>
																				</div>
																			</div>
																		</div>
																		<a  id="contentRenameButton-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="modal" data-target="#contentRenameModal-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><span><i class='fas fa-edit mr-2 edit-rename'></i><?=$languageJsonFile['admin_contents_rename'];?></span></a>
																		<a  id="contentMoveButton-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="modal" data-target="#modalForMove-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><span><i class="fas fa-people-carry mr-2 edit-move"></i><?=$languageJsonFile['admin_contents_move'];?></span></a>
																		<a id = "contentFileChange-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="modal" data-target="#reuploadfile-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><span><i class='fas fa-cloud-upload-alt mr-2 edit-upload'></i><?=$languageJsonFile['admin_contents_reupload'];?></span></a>
																		<?php if($schoolJsonData[$channelName]['downloadAbleOrNot'] == "yes" && !in_array($content['fileType'],$fileGroup1) && (isset($content['password'])?!$content['password']:false) && (isset($viewingExpired)?!$viewingExpired:true)):?>
																			<a  class="fb" href="<?php echo "tbwp4/php/tbmallContentDownloader.php?fp=../contents/".$folderName."/".$content['name']."&sD=".$content['viewingPeriod']['startDay']."&eD=".$content['viewingPeriod']['endDay'];?>"><span><i class="fas fa-download mr-2 edit-download"></i><?=$languageJsonFile['admin_contents_download'];?></span></a>
																		<?php endif;?>
																		<a class="contents_delete_button" data-delete = "<?php echo $content['name'];?>" data-folder = "<?php echo $folderName;?>" data-channel = "<?php echo $channelName;?>" ><span><i class="fas fa-trash-alt mr-2 edit-delete"></i><?=$languageJsonFile['admin_contents_delete'];?></span></a>
																	</div>																											
																</div>
																<?php $datetime =  $fileJsonData[$content['name']]["modifyDate"] ?>
																<?php $filesize =  $fileJsonData[$content['name']]["dataSize"] ?>
																<div class="contents-views">
																	<span class="views"><i class="far fa-eye mr-1"></i><?php echo $fileJsonData[$content['name']]['playCount']; ?></span>&emsp;
																	<span class="views"><?php echo time_changeTo_string($datetime); ?></span>&emsp;
																	<span class="views"><?php echo get_mb($filesize);?></span>
																</div>
																<div class="contents-title"> <?php echo $fileJsonData[$content['name']]["displayName"] . "\n"?></div>
																<ul class="admin_social_links d-flex justify-content-center">
																	<li><a id = "contentShareCopy-<?php $id = explode(".",$content['name']);echo($id[0]);?>" class="js-tooltip js-copy copy" data-toggle="tooltip" data-placement="bottom" data-copy="<?php echo $contentURL; ?>" ><i class="fas fa-copy"></i></a></li>
																	<li><a id = "contentShareMail-<?php $id = explode(".",$content['name']);echo($id[0]);?>" class="mail" onclick="shareByEmail('<?php echo $contentURL; ?>')" ><i class="fas fa-envelope"></i></a></li>
																	<li><a id = "contentShareLine-<?php $id = explode(".",$content['name']);echo($id[0]);?>" class="line" onclick="shareByLine('<?php echo $contentURL; ?>')" ><i class="fab fa-line"></i></a></li>
																	<li><a id = "contentShareFb-<?php $id = explode(".",$content['name']);echo($id[0]);?>" class="fb" onclick="shareByFb('<?php echo $contentURL; ?>')" ><i class="fab fa-facebook-messenger"></i></a></li>
																</ul>
															</div>
														</div>													
													</div>
												<?php endforeach ?>
											</div>
										<?php else : ?>
											<!--File playing portion-->
											<input type="hidden" id="playback_flag" value="1">
											<input type="hidden" id="playback_filename" value="<?php echo $_GET['f']; ?>">
											<input type="hidden" id="playback_foldername" value="<?php echo $folderName; ?>">
											<input type="hidden" id="playback_channelname" value="<?php echo $channelName; ?>">
											<input type="hidden" id="playback_ln" value="<?php echo $ln; ?>">
											<div class="card" id="player_card">
												<h5 class="card-header bg-light">ThinkBoardコンテンツ - <?php echo $_GET['f']; ?></h5>
												<div class="card-body">
													<div id="player" class="screen"></div>
												</div>
												<div class="card-footer bg-light" style="text-align: center;">
													<button type="button" class="btn btn-secondary" onclick="history.back();"><?=$languageJsonFile['admin_Backend_alert_player_rtnbtn'];?></button>
												</div>
											</div>
										<?php endif; ?>
									<?php else:?>
										<?php if (!isset($_GET['f'])) : ?>
											<table class="table table-striped compact thead-con" id="listViewContentTable" style="width:100%;">
												<thead>
													<tr>
														<th></th>
														<th style="padding-left:30px;" scope="col"><?=$languageJsonFile['admin_contents_list_contentsName'];?></th>
														<th class="text-center"　scope="col"><?=$languageJsonFile['admin_contents_list_lastUpdateDate'];?></th>
														<th class="text-center" scope="col"><?=$languageJsonFile['admin_contents_list_play_count'];?></th>
														<th class="text-center" scope="col"><?=$languageJsonFile['admin_contents_list_viewing_period'];?></th>
														<th class="text-center" scope="col"><?=$languageJsonFile['admin_contents_list_password'];?></th>
														<th class="text-center" scope="col"><?=$languageJsonFile['admin_contents_private_share'];?></th>
														<th class="text-center" scope="col"><?=$languageJsonFile['admin_contents_list_con_edit'];?></th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($contentsTable as $content) : ?>
														<tr>
															<td class="expanderForContentTable bg-expander"><img src="https://datatables.net/examples/resources/details_open.png"></img></td>
															<td style="padding-left:30px;" class="cell-ta clink"  data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path=<?php echo $content['path'];?>  ><?php echo ($fileJsonData[$content['name']]['displayName']); ?></td>
															<td class="text-center clink" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path=<?php echo $content['path'];?>  ><?php echo ($fileJsonData[$content['name']]['modifyDate']); ?></td>
															<td class="text-center clink" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path=<?php echo $content['path'];?>  ><?php echo ($fileJsonData[$content['name']]['playCount']); ?></td>
															<td class="text-center clink" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path=<?php echo $content['path'];?>  >
																<?php if(isset($content['viewingPeriod'])):
																		if($content['viewingPeriod']['exist'] === true):?>
																			<?php  $cDTs = strtotime(now); $sDTs = strtotime($content['viewingPeriod']['startDay']); $eDTs = strtotime($content['viewingPeriod']['endDay']);
																					switch(true)
																					{
																						case ($cDTs < $sDTs):		// current datetimestamp is less than the start date timestamp 
																							$displayPeriod = '<span class="text-danger">'.$content["viewingPeriod"]["startDay"].'~'.$content["viewingPeriod"]["endDay"].'</span>';
																							$viewingExpired = true;
																							break;
																						case ($cDTs >= $sDTs && $cDTs <= $eDTs):
																							$displayPeriod = $content["viewingPeriod"]["endDay"];
																							$viewingExpired = false;
																							break;
																						default:
																							// viewing period has been expired
																							$displayPeriod = '<span class="text-danger">'.$content["viewingPeriod"]["endDay"].'</span>';
																							$viewingExpired = true;
																							break;
																					}
																					echo $displayPeriod;
																		else:
																			$viewingExpired = false;
																		endif;
																	else:
																		$viewingExpired = false;
																	endif;?>
															</td>
															<td class="text-center clink" data-channel = <?=$channelName;?> data-ln = <?=$ln;?> data-path=<?php echo $content['path'];?>  >
																<?php echo (isset($content['password']))?(($content['password'] === true)?$languageJsonFile['admin_contents_list_password_yes']:''):'';?>
															</td>
												
															<td class="text-center">
																<div class="custom-control custom-switch">
																	<input type="checkbox" class="custom-control-input" id="privacyShare-<?php $id = explode(".",$content['name']);echo($id[0]);?>">
																	<label class="custom-control-label" for="privacyShare-<?php echo($id[0]);?>"></label>
																</div>
															</td>
															<?php
																$protocol = "";
																if (isset($_SERVER['HTTPS'])) {
																	$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
																} else {
																	$protocol = 'http';
																}
																$id = explode(".",$content['name']);
																$contentId = ($id[0]);
																if($defaultLanguageSelected)
																	$contentURL =  ($protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME'])."/tbcontents.php" .'?channel='.$channelName.'&folder=' . urlencode($folderName) . '&f=' . $content['name']) . '&pr=' . $contentId;
																else
																	$contentURL =  ($protocol . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME'])."/tbcontents.php" .'?channel='.$channelName.'&folder=' . urlencode($folderName) .'&ln='.$ln. '&f=' . $content['name']) . '&pr=' . $contentId;
															?> 
															<td class="text-center">
																<a id = "contentShareCopy-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="tooltip" data-placement="top" data-copy="<?php echo $contentURL; ?>" class="js-tooltip js-copy btn btn-sm btn-secondary tab-custom-btn"><i class="fas fa-copy fa-fw"></i></a>
																<button type="button"  class="btn btn-sm btn-secondary tab-custom-btn ml-2 js-share-button"><i class="fas fa-share-square fa-fw"></i>
																	<div class="dg-share-button-popup">
																			<ul>
																				<li>
																					<a id = "contentShareMail-<?php $id = explode(".",$content['name']);echo($id[0]);?>" onclick="shareByEmail('<?php echo $contentURL; ?>')"><i class="fas fa-envelope fa-2x social-mail mr-2" ></i></a>
																				</li>
																				<li>
																					<a id = "contentShareLine-<?php $id = explode(".",$content['name']);echo($id[0]);?>" onclick="shareByLine('<?php echo $contentURL; ?>')"><i class="fab fa-line fa-2x social-line mr-2"></i></a>
																				</li>
																				<li>
																					<a id = "contentShareFb-<?php $id = explode(".",$content['name']);echo($id[0]);?>" onclick="shareByFb('<?php echo $contentURL; ?>')"><i class="fab fa-facebook-square fa-2x social-messanger" ></i></a>
																				</li>
																			</ul>
																		</div>
																</button>
																<button type="button"  class="btn btn-sm btn-secondary tab-custom-btn ml-2 js-edit-button"><i class="fas fa-edit fa-fw"></i>
																<div class="dg-edit-button-popup">
																	<ul>
																		<li class="js-social-share">
																			<a  id="contentRenameButton-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="modal" data-target="contentRenameModal-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><i class="fas fa-spell-check fa-2x edit-rename mr-2"></i></a>
																		</li>
																		<li class="js-social-share">
																			<a  id="contentMoveButton-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="modal" data-target="modalForMove-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><i class="fas fa-people-carry fa-2x edit-move mr-2"></i></a>
																		</li>
																		<li class="js-social-share">
																			<a id = "contentFileChange-<?php $id = explode(".",$content['name']);echo($id[0]);?>" data-toggle="modal" data-target="#reuploadfile-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><i class="fas fa-cloud-upload-alt fa-2x edit-upload"></i></a>
																		</li>
																	</ul>
																</div>
															</button>
															<?php if($schoolJsonData[$channelName]['downloadAbleOrNot'] == "yes" && !in_array($content['fileType'],$fileGroup1) && (isset($content['password'])?!$content['password']:false) && (isset($viewingExpired)?!$viewingExpired:true)):?>
																<a  class="btn btn-sm btn-secondary tab-custom-btn ml-2" href="<?php echo "tbwp4/php/tbmallContentDownloader.php?fp=../contents/".$folderName."/".$content['name']."&sD=".$content['viewingPeriod']['startDay']."&eD=".$content['viewingPeriod']['endDay'];?>"><i class="fas fa-download fa-fw"></i></a>
															<?php else:?>
																<a  class="btn btn-sm btn-secondary tab-custom-btn ml-2 download-hidden" ><i class="fas fa-download fa-fw"></i></a>
															<?php endif;?>
															<a class="contents_delete_button btn btn-sm btn-danger tab-custom-btn ml-4 mr-0" data-delete = "<?php echo $content['name'];?>" data-folder = "<?php echo $folderName;?>" data-channel = "<?php echo $channelName;?>"><i class="fas fa-trash-alt fa-fw"></i></a>
															</td>
														</tr>
													<?php endforeach ?>  
												</tbody>
											</table>
										<?php else : ?>
											<input type="hidden" id="playback_flag" value="1">
											<input type="hidden" id="playback_filename" value="<?php echo $_GET['f']; ?>">
											<input type="hidden" id="playback_foldername" value="<?php echo $folderName; ?>">
											<input type="hidden" id="playback_channelname" value="<?php echo $channelName; ?>">
											<input type="hidden" id="playback_ln" value="<?php echo $ln; ?>">
											<div class="card" id="player_card">
												<h5 class="card-header bg-light">ThinkBoardコンテンツ - <?php echo $_GET['f']; ?></h5>
												<div class="card-body">
													<div id="player" class="screen"></div>
												</div>
												<div class="card-footer bg-light" style="text-align: center;">
													<button type="button" class="btn btn-secondary" onclick="history.back();">戻る</button>
												</div>
											</div>
										<?php endif; ?>
									<?php endif;?>			
								</div>	
							</div>			
						</div>
					</div>
				</div>
			</div>

			<footer class="footer" id="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer_bottm">
								<div class="row">
									<div class="col-6">
										<ul class="fotb_left">
											<li>
												<p>Copyright (C)<strong> KJS</strong>. All Rights Reserved.</p>
											</li>
										</ul>
									</div>
									<div class="col-6">
										<div class="item_f3 float-right">
											<div class="lng_btn">
												<div class="ui language bottom right pointing dropdown floating" id="languages" data-content="Select Language">
													<a href="#"><i class='uil uil-globe lft'></i>Language<i class='uil uil-angle-down rgt'></i></a>
													<div class="menu">
														<div class="scrolling menu">
															<?php
																$mal = ("$_SERVER[REQUEST_URI]");
																$mal = explode("&",$mal);
																function removeLn($value,$key)
																{
																	global $mal;
																	if(strpos($value,"ln=") !== false)	// checking that this array elements contains the substring (ln=) or not. if exists then delete that element
																		unset($mal[$key]);
																}
																array_walk($mal,"removeLn");
																$mal = implode("&",$mal);
																$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$mal;
															?>
															<div class="item" data-percent="100" data-value="2" data-english="English" onclick='window.location.href= "<?=(($schoolJsonData[$channelName]["defaultLanguage"] == "2")?($actual_link):($actual_link."&ln=2"));?>"' >
																<span class="description" >English</span>
																English
															</div>
															<div class="item" data-percent="6" data-value="1" data-english="Japanese" onclick='window.location.href= "<?=(($schoolJsonData[$channelName]["defaultLanguage"] == "1")?($actual_link):($actual_link."&ln=1"));?>"'>
																<span class="description">日本語</span>
																Japanese
															</div>										
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<!-- Modal for creating new folder -->
			<div class="modal" id="newFolder-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="newFolder-modalLabel"><?=$languageJsonFile['admin_newcatModal_modaltitle'];?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label"><?=$languageJsonFile['admin_newcatModal_inputField'];?>:</label>
								<input id = "newFolderInput"  class="form-control" oninput='folderNameDuplicationChecking("<?php echo ($folderName);?>","newFolderInput","newFolderSubmit","folderDisplayNameErr")'>
								<label id = 'folderDisplayNameErr' hidden>*<?=$languageJsonFile['admin_newcatModal_alert'];?></label><br>
								<label id = 'folderDisplayNamePatternErr' hidden>*<?=$languageJsonFile['admin_Backend_alert_Rename_Whitespace'];?></label><br> 
								<!-- At least one non whitespace character is required.No whitespace on begining and end. -->
							</div>					
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$languageJsonFile['admin_newcatModal_close'];?></button>
							<button type="button" class="btn btn-primary" id = "newFolderSubmit" onclick='makingNewCategory("<?php echo $channelName?>",<?php echo json_encode($foldersList);?>,"<?php echo $folderName;?>")' disabled><?=$languageJsonFile['admin_newcatModal_add'];?></button>
						</div>
					</div>
				</div>
			</div>
			<!-- End modal for creating new folder -->
			
			<!-- Modal for edit folder name -->
			<?php foreach ($foldersTable as $folder) : ?> 
				<div class="modal" id="editFolderModal-<?php echo($folder['name']);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><?=$languageJsonFile['admin_editcatModal_modaltitle'];?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label"><?=$languageJsonFile['admin_editcatModal_inputField'];?></label>
										<input type="text" class="form-control" name='editedFolderName' id="editedFolderName-<?php echo $folder['name'];?>" value="<?php echo ($folderJsonData[$folder['name']]['displayName']); ?>" oninput='folderNameDuplicationChecking("<?php echo ($folderName);?>","editedFolderName-<?php echo $folder["name"];?>","editFolderSubmit-<?php echo $folder["name"];?>","folderDisplayNameEditErr-<?php echo $folder["name"];?>")'>
										<label id = 'folderDisplayNameEditErr-<?php echo $folder["name"];?>' hidden>*<?=$languageJsonFile['admin_editcatModal_alert'];?></label><br>
										<label id = 'folderDisplayNamePatternEditErr-<?php echo $folder["name"];?>' hidden>*<?=$languageJsonFile['admin_Backend_alert_Rename_Whitespace'];?></label><br> 
										<!-- At least one non whitespace character is required.No whitespace on begining and end. -->
									</div>
								</div>
								<input type="text" name="channel_name" value='<?php echo $channelName?>' hidden>
								<input type="text" name="uidOfFolder" value='<?php echo $folder['name']?>' hidden>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$languageJsonFile['admin_editcatModal_close'];?></button>
									<button type="submit" class="btn btn-primary" id = "editFolderSubmit-<?php echo $folder["name"];?>" onclick='folderEdit("<?php echo $channelName;?>","<?php echo $folder["name"];?>","<?php echo $folderName;?>")'><?=$languageJsonFile['admin_editcatModal_change'];?></button>
								</div>
							<!-- </form> -->
						</div>
					</div>
				</div>
			<?php endforeach;?>       

			<!-- End modal for edit folder name -->             
			<?php foreach ($contentsTable as $content) : ?>                            
				<!-- modal for File Renaming -->
				<div class="modal fade" id="contentRenameModal-<?php $id = explode(".",$content['name']);echo($id[0]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><?=$languageJsonFile['admin_editconModal_modaltitle'];?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="" method="POST" enctype="multipart/form-data" class="contentRenameForm justify-content-center" name = "contentRenameForm" id="contentRenameForm">
								<div class="modal-body">
										<div class="form-group">
										<label for="recipient-name" class="col-form-label"><?=$languageJsonFile['admin_editconModal_inputField'];?></label>
											<input type="text" class="form-control" id="editContentName-<?php echo $content['name'];?>" name = 'editContentName' oninput = 'fileNameDuplicationChecking("<?php echo $folderName;?>","<?php echo $channelName;?>","renameBtn-<?php echo $content["name"];?>","contentRenameErr-<?php echo $content["name"];?>","editContentName-<?php echo $content["name"];?>");'  value="<?php echo ($fileJsonData[$content['name']]['displayName']);?>" 
												required>
										</div>
										<input type="text" name="channel_name" value='<?php echo $channelName;?>' hidden>
										<input type="text" name="contentName" value='<?php echo $content['name'];?>' hidden>
										<input type="text" name="folderPath" value='<?php echo $folderName;?>' hidden>
										<label id="contentRenameErr-<?php echo $content['name'];?>" hidden><?=$languageJsonFile['admin_editconModal_alert'];?></label>
										<label id = 'fileDisplayNamePatternEditErr-<?php echo $content["name"];?>' hidden>*<?=$languageJsonFile['admin_Backend_alert_Rename_Whitespace'];?></label><br>
										<!-- At least one non whitespace character is required.No whitespace on begining and end. -->
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$languageJsonFile['admin_editconModal_close'];?></button>
									<button type="submit" id = 'renameBtn-<?php echo $content['name'];?>' class="btn btn-primary"><?=$languageJsonFile['admin_editconModal_change'];?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- modal for File Renaming  -->

				<!-- modal for File Reupload  -->
				<div class="modal fade" id="reuploadfile-<?php $id = explode(".",$content['name']);echo($id[0]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><?=$languageJsonFile['admin_reuploadconModal_modaltitle'];?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action = "" method = "POST" enctype="multipart/form-data" class="fileReuploadingForm justify-content-center"  name = "fileReuploadingForm" id = "fileReuploadingForm" >
								<div class="modal-body">
									<div class="form-group row">
										<div class="col-6">
											<label for="recipient-name" class="col-form-label font-weight-bold"><?=$languageJsonFile['admin_reuploadconModal_conName'];?> : </label>
										</div>
										<div class="col-6">	
											<p><?php echo ($fileJsonData[$content['name']]['displayName']); ?></p>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-6">
											<label for="recipient-name" class="col-form-label font-weight-bold"><?=$languageJsonFile['admin_reuploadconModal_catName'];?> :</label>
										</div>
										<div class="col-6">
											<p><?php echo ($fileJsonData[$content['name']]['parent'] != $channelName) ?  ($folderJsonData[$fileJsonData[$content['name']]['parent']]['displayName']): "Home"; ?></p>
										</div>
									</div>
									<input type="text" name="channel_name" value='<?php echo $channelName;?>' hidden>
									<input type="text" name="fileName" value='<?php echo $content['name'];?>' hidden>
									<input type="text" name="immidiateParent" value='<?php echo $fileJsonData[$content['name']]['parent'];?>' hidden>
									<input type="text" name="folderPath" value='<?php echo $folderName;?>' hidden>
									<div class="form-group">
										<div class="custom-file" name="editFileId">
											<input type="file" name="upload_file" class="custom-file-input" id="inputFile-<?php $id = explode(".",$content['name']);echo($id[0]);?>" onchange='fileTypeValidityChecking(this,"inputFile-<?php $id = explode(".",$content["name"]);echo($id[0]);?>")' required>
											<label class="custom-file-label" for="inputFile"><?=$languageJsonFile['admin_reuploadconModal_ChooseCon'];?></label>
										</div>
									</div>
									<div class="form-group">
										<div id = "<?php echo "progressDiv-".$content['name'];?>" class="form-group" style="display:none;">
											<div id="<?php echo "progressTxt-".$content['name'];?>" ></div><br>
											<div class="progress">
												<div id = "<?php echo "reuploadBar-".$content['name'];?>" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$languageJsonFile['admin_reuploadconModal_close'];?></button>
									<button type="submit" class="btn btn-primary"><?=$languageJsonFile['admin_reuploadconModal_change'];?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- modal for File Reupload -->

				<!-- modal for File Move -->
				<div class="modal fade" id="modalForMove-<?php $id = explode(".",$content['name']);echo($id[0]);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<!--Header-->
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel"><?=$languageJsonFile['admin_moveconModal_modaltitle'];?></h4>
							</div>
							<!--Body-->
							<div class="modal-body">
								<p class="modal-title" id="breadCrumbForFileChanging-<?php $id = explode(".",$content['name']);echo($id[0]);?>"><a class="mr-2" href="">
									<?php
										$till = count($folderPathArray);
										if($till <= 1):
									?>
											<a onclick = 'folderChangeForFileMoving("<?php echo $folderName;?>","<?php echo $channelName;?>","folderListForMoving-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","breadCrumbForFileChanging-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","<?php echo $content["name"];?>")' class="mr-2 ml-2"><i class="fas fa-home"></i></a>
									<?php
										else:
									?>
											<?php for ($i=0 ; $i < $till ; $i++):?>
												<?php if($i == 0):?>
													<a onclick = 'folderChangeForFileMoving("<?php echo $folderName;?>","<?php echo $channelName;?>","folderListForMoving-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","breadCrumbForFileChanging-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","<?php echo $content["name"];?>")' class="mr-2 ml-2"><i class="fas fa-home"></i></a> <i class="fas fa-angle-right ml-2"></i>
												<?php elseif($i == $till - 1):?>
													<?php echo $folderJsonData[$folderPathArray[$i]]['displayName'];?>
												<?php else:?>
													<a onclick = 'folderChangeForFileMoving("<?php echo $folderName;?>","<?php echo $fileMoveUrl[$folderPathArray[$i]];?>","folderListForMoving-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","breadCrumbForFileChanging-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","<?php echo $content["name"];?>")' class="mr-2 ml-2"><?php echo $folderJsonData[$folderPathArray[$i]]['displayName'];?></a> <i class="fas fa-angle-right ml-2"></i>
												<?php
													endif;
												?>
											<?php endfor;?>
									<?php
										endif;
									?>
								</p>
								<div class="card mt-4">
									<ul class="list-unstyled" id = "folderListForMoving-<?php $id = explode(".",$content['name']);echo($id[0]);?>">
										<?php
											foreach($foldersTable as $folderForMoving):
										?>
												
												<li>
													<a onclick = 'folderChangeForFileMoving("<?php echo $folderName;?>","<?php echo $folderName."/".$folderForMoving["name"];?>","folderListForMoving-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","breadCrumbForFileChanging-<?php $id = explode(".",$content["name"]);echo($id[0]);?>","<?php echo $content["name"];?>")'>
														<div class="card-header">
															<?php echo $folderForMoving['displayName']; ?>
														</div>	
													</a>
												</li>
												
										<?php endforeach;?>
										
									</ul>
								</div>
							</div>
							<!--Footer-->
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal"><?=$languageJsonFile['admin_moveconModal_close'];?></button>
								<button class="btn btn-primary" id = "contentMoveSubmission-<?php $id = explode(".",$content["name"]);echo($id[0]);?>" disabled><?=$languageJsonFile['admin_moveconModal_move'];?></button>
								<label id="contentMoveSubmissionDisableMsg-<?php $id = explode(".",$content["name"]);echo($id[0]);?>" hidden></label>
							</div>
						</div>
					</div>
				</div>
				<!--modal for File Move -->
			<?php endforeach;?>
		</div>
		<?php
			$parts = 'bsjs';
			require './tbwp4/php/package.php'; // Bootstrap JSセット
		?>
		<?php
			$parts = 'tbwp4';
			$trigger = 'trigger.js';
			require './tbwp4/php/package.php'; // TBWP4セット
		?>
		<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
		<script src="js/vertical-responsive-menu.js"></script>
		<script src="vendor/semantic/semantic.js"></script>
		<script src="js/custom.js"></script>
		<script src="vendor/DataTables/DataTables-1.10.21/js/jquery.dataTables.js"></script>
		<script src="vendor/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.js"></script>
		<script src="vendor/DataTables/Responsive-2.2.5/js/dataTables.responsive.js"></script>
		<script src="vendor/DataTables/Responsive-2.2.5/js/responsive.bootstrap4.min.js"></script>
		<script>
			function preserveToClipboard(str)
			{
				const el = document.createElement('textarea');
				el.value = str;
				document.body.appendChild(el);
				el.select();
				var b = document.execCommand('copy');
				document.body.removeChild(el);
			}
			function accessValidity(){
				if(!localStorage.hasOwnProperty("loggedOn-"+channelName))
				{
					// no access;
					// assuming that admin has already logged out by himself
					preserveToClipboard("<?=$adminURL;?>");
					alert("you have already deleted this browser for this channel and redirecting to student page of this channel. If you want to visit admin page again visit:- "+"<?=$adminURL;?>");
					window.location.href = "<?=$studentPageOfThisChannel;?>";
				}
				else
				{
					jQuery.ajax({							// checking after every 30 seconds that this browser is balckListed Or Not
						method : "POST",
						url : "spaChannelValidation.php",
						dataType : 'json',
						data : {
							"channel_name": "<?=$channelName;?>",
							"block": "0",
							"browserName": browser
						},
						success: function(response){
							console.log(response);
							if(response > localStorage.getItem("loggedOn-"+channelName))
							{
								// no access;
								// assuming that admin has already logged out by superAdmin
								alert("<?=$languageJsonFile['admin_Backend_alert_delete_admin_cache_30sec_alert'];?>");
								window.location.href = "<?=$studentPageOfThisChannel;?>";
							}
						},
						error: function(response){
							console.log("from error block");
						}
					});
				}
			};
			setInterval(accessValidity,30000);

			// by Nishioka san
			bsCustomFileInput.init();

			// mp4 file download message
			$('.downloadMsg').on('click', function() {
				alert("<?=$languageJsonFile['admin_con_download_Msg'];?>");
			}); 

			// navbar height management
			function navbarHeight(){
				var firstNavBarPaddingTop = $("#firstNav").css("height");
				secondNavBarPaddingTop = Number(firstNavBarPaddingTop.replace("px","")) - 6;
				$("#secondNav").css("top",secondNavBarPaddingTop.toString()+"px");
				var secondNavHeight = $("#secondNav").css("height");
				secondNavbarHeight = Number(secondNavHeight.replace("px",""));
				var navHeightValue = (secondNavbarHeight + secondNavBarPaddingTop + 20 );
				var sidebarheight = (secondNavbarHeight + secondNavBarPaddingTop -2 );
				$("#navHeight").css("padding-top",navHeightValue.toString() +"px");
				$("#sidebar-height").css("top",sidebarheight.toString()+"px");	
				if ($(window).width() <= 991.98)
				{	
					$("#sidebar-height").css("top",sidebarheight.toString()+"px");
				}
			}
				
			window.addEventListener("resize", navbarHeight);
			window.addEventListener("load", navbarHeight);
			navbarHeight();

			// NavbarIcon change when click
			function sideNavbarIconcollapse(x) {
				x.classList.toggle("fa-arrow-right");
				x.classList.toggle("fa-arrow-left");
			}
			function sideNavbarIconcollapse_min(y) {
				y.classList.toggle("fa-arrow-left");
				y.classList.toggle("fa-arrow-right");
			}
			function sideNavbarIcontoggle(z) {
				z.classList.toggle("fa-arrow-left");
				z.classList.toggle("fa-arrow-right");
			}

			/// validity checking for the functionality 'delete folder' and deleting if the flag is true
			$('.delete_button').on('click', function() {            
				if (window.confirm('<?=$languageJsonFile['admin_con_delete_Msg'];?>')) {
						jQuery.ajax
						({
							type: "POST",
							url: 'spaValidation.php',
							dataType: 'json',
							data: {
								"folderPath":   $(this).data('path'),
								"deleteFolder": $(this).data('delete'),
								"channel_name": $(this).data('channel'),
								"ln"		  : "<?=$ln;?>",
								"block":"3"
							},
							 success: function(response) {
								if(response.deleteFlag == true)
								{
									folderDelete(response.channelName,response.folderName,response.folderPath);
								}
								else
								{
									if (response.hasOwnProperty('msg')) 
									{
										alert(response.msg);
										location.reload();
									}
									else
										alert("<?=$languageJsonFile['admin_cat_delete_alert1'];?>\n<?=$languageJsonFile['admin_cat_delete_alert2'];?>");
								}
							},
							error: function(response) {
								alert("<?=$languageJsonFile['admin_Backend_alert_Delete'];?>"); //Sorry Can't Delete
							}
						});
				}
				return false;
			});

			// For mobile responsive view, validity checking for the functionality 'delete folder' and deleting if the flag is true
			$('#listViewCategoryTable').on('click',".delete_button",function(){
				if (window.confirm('<?=$languageJsonFile['admin_con_delete_Msg'];?>')) {
						jQuery.ajax
						({
							type: "POST",
							url: 'spaValidation.php',
							dataType: 'json',
							data: {
								"folderPath":   $(this).data('path'),
								"deleteFolder": $(this).data('delete'),
								"channel_name": $(this).data('channel'),
								"ln"		  : "<?=$ln;?>",
								"block":"3"
							},
							 success: function(response) {
								if(response.deleteFlag == true)
								{
									folderDelete(response.channelName,response.folderName,response.folderPath);
								}
								else
								{
									if (response.hasOwnProperty('msg')) 
									{
										alert(response.msg);
										location.reload();
									}
									else
										alert("<?=$languageJsonFile['admin_cat_delete_alert1'];?>\n<?=$languageJsonFile['admin_cat_delete_alert2'];?>");
								}
							},
							error: function(response) {
								alert("<?=$languageJsonFile['admin_Backend_alert_Delete'];?>"); //Sorry Can't Delete
							}
						});
				}
				return false;
			});

			/// contents deletion
			$('.contents_delete_button').on('click', function() {
				if (window.confirm('<?=$languageJsonFile['admin_con_delete_Msg'];?>')) {
					jQuery.ajax
					({
						type: "POST",
						url: 'spaDBManipulation.php',
						dataType: 'json',
						data: {
							"folderPath":   $(this).data('folder'),
							"deleteFile": $(this).data('delete'),
							"channel_name": $(this).data('channel'),
							"ln"		  : "<?=$ln;?>",
							"block":"11"
						},
						success: function(response) {
							alert(response.msg);
							location.reload();
						},
						error: function(response) {
							alert("<?=$languageJsonFile['admin_Backend_alert_Delete'];?>"); //Sorry Can't Delete
						}
					});
				}
				return false;
			});

			// for responsive mobile view, contents deletion
			$('#listViewContentTable').on('click','.contents_delete_button',function(){
				if (window.confirm('<?=$languageJsonFile['admin_con_delete_Msg'];?>')) {
					jQuery.ajax
					({
						type: "POST",
						url: 'spaDBManipulation.php',
						dataType: 'json',
						data: {
							"folderPath":   $(this).data('folder'),
							"deleteFile": $(this).data('delete'),
							"channel_name": $(this).data('channel'),
							"ln"		  : "<?=$ln;?>",
							"block":"11"
						},
						success: function(response) {
							alert(response.msg);
							location.reload();
						},
						error: function(response) {
							alert("<?=$languageJsonFile['admin_Backend_alert_Delete'];?>"); //Sorry Can't Delete
						}
					});
				}
				return false;
			});

			// in list view, redirecting to next page by clicking any where of the row. (This is implementing here) and also checking in list iew and grid view, the folder is already deleted by someone else or not
			$(document).ready(function(){
				$('.nextFolderToView').click(function(e) {
					jQuery.ajax({
						method: "POST",
						url: 'spaValidation.php',
						dataType: 'json',
						data: {
							"folderName": $(this).data("foldername"),
							"channel_name": '<?php echo $channelName;?>',
							"ln"		  : "<?=$ln;?>",
							"block":"6"
						},

						success: function(response) {
							console.log(response);
							if(response.msg == "exists")
							{
								console.log($(e.target).data('vm'));
								console.log(e);
								console.log(this);
								if($(e.target).data('vm') == 1)
								{
									<?php if($defaultLanguageSelected):?>
										location.href = "./admin.php?channel=" + $(e.target).data('channel')+"&vm=1"+"&folder=" + $(e.target).data('folder');
									<?php else:?>
										location.href = "./admin.php?channel=" + $(e.target).data('channel')+"&vm=1"+"&ln="+"<?php echo $ln;?>"+"&folder=" + $(e.target).data('folder');
									<?php endif;?>
								}
								else
									return true;
							}
							else
							{
								e.preventDefault();
								alert("<?=$languageJsonFile['admin_Backend_alert_FolderExists'];?>"); // your requested category is not exists. Please reload the page
								location.reload();
							}
						},
						error: function() {
							console.log("from error block");
						}
					});
				});
			});

			// sorting folders by modification date in ascending order and descending order (toggle at a time)
			function sortByDate(clickedOn,contentsTable,targetElement)
			{
				var order = document.getElementById(clickedOn);
				order = order.getAttribute("data-order");
				if(order == "ASC")
				{
					document.getElementById(clickedOn).removeAttribute("data-order");
					document.getElementById(clickedOn).setAttribute("data-order","DESC"); // this order is setting for the next sorting
					var icon = document.createElement("I");
					icon.setAttribute("class","fas fa-sort-amount-up custom-white");
					icon.setAttribute("id","sortingIconDate");
					/* changing the button color according to it's type (whether category or content) */
					var btnColor = "bg-contents-light";
					if(clickedOn == "categoryDate")
						var btnColor = "bg-category-light";
					else if(clickedOn == "contentDate")
						btnColor = "bg-contents-light";
					/* changing the button color according to it's type (whether category or content) */

					document.getElementById(clickedOn).setAttribute("class","btn "+btnColor+" sort-btn");
					while(document.getElementById(clickedOn).hasChildNodes())
					{
						var list = document.getElementById(clickedOn);
						document.getElementById(clickedOn).removeChild(list.childNodes[0]); // removing all child attributes of anchor tag
					}
					//adding attributes for the next sorting
					document.getElementById(clickedOn).appendChild(icon); // adding icon for next sorting
					console.log(contentsTable);
					// sorting in ascending order
					contentsTable.sort(function(a,b){return a.modifyDate - b.modifyDate});
					console.log(contentsTable);
					for(var i = 0 ; i < contentsTable.length ; i++)
					{
						var divId = contentsTable[i].name.split(".")[0];
						document.getElementById(targetElement+divId).style.order = i+1;
					}

				}
				else if(order == "DESC")
				{
					document.getElementById(clickedOn).removeAttribute("data-order");
					document.getElementById(clickedOn).setAttribute("data-order","ASC"); // this order is setting for the next sorting
					var icon = document.createElement("I");
					icon.setAttribute("class","fas fa-sort-amount-down custom-white");
					icon.setAttribute("id","sortingIconDate");

					/* changing the button color according to it's type (whether category or content) */
					var btnColor = "bg-contents";
					if(clickedOn == "categoryDate")
						var btnColor = "bg-category";
					else if(clickedOn == "contentDate")
						btnColor = "bg-contents";
					/* changing the button color according to it's type (whether category or content) */
					document.getElementById(clickedOn).setAttribute("class","btn "+btnColor+" sort-btn");

					while(document.getElementById(clickedOn).hasChildNodes())
					{
						var list = document.getElementById(clickedOn);
						document.getElementById(clickedOn).removeChild(list.childNodes[0]); // removing all child attributes of anchor tag
					}
					//adding attributes for the next sorting
					document.getElementById(clickedOn).appendChild(icon); // adding icon for next sorting

					// sorting in descending order
					console.log(contentsTable);
					contentsTable.sort(function(a,b){return b.modifyDate - a.modifyDate});
					console.log(contentsTable);
					for(var i = 0 ; i < contentsTable.length ; i++)
					{
						var divId = contentsTable[i].name.split(".")[0];
						document.getElementById(targetElement+divId).style.order = i+1;
					}
				}

			}

			// sorting folders alphabetically in ascending order and descending order (toggle at a time)
			function sortByAlphabet(clickedOn,contentsTable,targetElement)
			{
				var order = document.getElementById(clickedOn);
				order = order.getAttribute("data-order");
				if(order == "ASC")
				{
					document.getElementById(clickedOn).removeAttribute("data-order");
					document.getElementById(clickedOn).setAttribute("data-order","DESC"); // this order is setting for the next sorting
					var icon = document.createElement("I");
					icon.setAttribute("class","fas fa-sort-alpha-down-alt custom-white");
					icon.setAttribute("id","sortingIconAlphabet");
					/* changing the button color according to it's type (whether category or content) */
					var btnColor = "bg-contents-light";
					if(clickedOn == "categoryAlphabet")
						var btnColor = "bg-category-light";
					else if(clickedOn == "contentAlphabet")
						btnColor = "bg-contents-light";
					/* changing the button color according to it's type (whether category or content) */
					document.getElementById(clickedOn).setAttribute("class","btn "+btnColor+" sort-btn");
					while(document.getElementById(clickedOn).hasChildNodes())
					{
						var list = document.getElementById(clickedOn);
						document.getElementById(clickedOn).removeChild(list.childNodes[0]); // removing all child attributes of anchor tag
					}
					//adding attributes for the next sorting
					document.getElementById(clickedOn).appendChild(icon); // adding icon for next sorting

					// sorting in ascending order
					contentsTable.sort(function(a,b)
					{
					var aS = a.displayName;
					var bS = b.displayName;
					return aS.localeCompare(bS);
					});
					console.log(contentsTable);
					for(var i = 0 ; i < contentsTable.length ; i++)
					{
						var divId = contentsTable[i].name.split(".")[0];
						document.getElementById(targetElement+divId).style.order = i+1;
					}
				}
				else if(order == "DESC")
				{
					document.getElementById(clickedOn).removeAttribute("data-order");
					document.getElementById(clickedOn).setAttribute("data-order","ASC"); // this order is setting for the next sorting
					var icon = document.createElement("I");
					icon.setAttribute("class","fas fa-sort-alpha-down custom-white");
					icon.setAttribute("id","sortingIconAlphabet");
					/* changing the button color according to it's type (whether category or content) */
					var btnColor = "bg-contents";
					if(clickedOn == "categoryAlphabet")
						var btnColor = "bg-category";
					else if(clickedOn == "contentAlphabet")
						btnColor = "bg-contents";
					/* changing the button color according to it's type (whether category or content) */

					document.getElementById(clickedOn).setAttribute("class","btn "+btnColor+" sort-btn");
					while(document.getElementById(clickedOn).hasChildNodes())
					{
						var list = document.getElementById(clickedOn);
						document.getElementById(clickedOn).removeChild(list.childNodes[0]); // removing all child attributes of anchor tag
					}
					//adding attributes for the next sorting
					document.getElementById(clickedOn).appendChild(icon); // adding icon for next sorting
					// sorting in descending order
					contentsTable.sort(function(a,b)
					{
					var aS = a.displayName;
					var bS = b.displayName;
					return -1 * aS.localeCompare(bS);
					});
					console.log(contentsTable);
					for(var i = 0 ; i < contentsTable.length ; i++)
					{
						var divId = contentsTable[i].name.split(".")[0];
						document.getElementById(targetElement+divId).style.order = i+1;
					}
				}

			}

			// Automatic printing the uploaded filename into the filename input of file uploading form and also checking that uploaded filetype is valid or not.
			function givenFileNameFetching(input,containingElement)
			{
				var givenFileName = input.files[0]['name'].split(".");
				var givenFileType = givenFileName[givenFileName.length-1];
				givenFileName.pop();

				var previousName = document.getElementById("fileDisplayName").value;
				console.log(typeof previousName);
				console.log(previousName);
				if(fileTypeValidityChecking(input,containingElement) == true)
				{
					if(previousName === "")
					{
						document.getElementById("fileDisplayName").value = givenFileName.join(".");
						fileNameDuplicationChecking("<?php echo $folderName;?>","<?php echo $channelName;?>","uploadButton","fileDisplayNameErr","fileDisplayName");
					}
				}
				else
				{
					document.getElementById("fileDisplayName").value = "";
				}
			}
			function fileTypeValidityChecking(input,containingElement)
			{
				var givenFileName = input.files[0]['name'].split(".");
				var givenFileType = givenFileName[givenFileName.length-1].toUpperCase();
				var allowedFileType = <?= json_encode($schoolJsonData[$channelName]['permittedFileTypes']);?>;
				allowedFileType = allowedFileType.map(function(x){ return x.toUpperCase(); });
				console.log(allowedFileType);
				console.log(givenFileType);
				if (!allowedFileType.includes(givenFileType)) { 
					alert('Invalid file type'); 
					document.getElementById(containingElement).value = "";
					return false; 
				}
				return true;
			}
			// during fileuploading checking the given filename(in the form) of that given folder: is the filename duplicate of existing filename or not.(Front End File Name Duplication checking)
			function fileNameDuplicationChecking(folderPath,channelName,disableBtn,errDisplayId,targetInputField)
			{
					jQuery.ajax({
						method: "POST",
						url: 'spaValidation.php',
						dataType: 'json',
						data: {
							"folderPath": folderPath,
							"channel_name": channelName,
							"ln"		  : "<?=$ln;?>",
							"block":"2"
						},

						success: function(response) {
							var exist = (response.fileList.includes(document.getElementById(targetInputField).value));
							console.log(exist);
							if(exist)
							{
								// disable button and give error message
								document.getElementById(disableBtn).disabled = true;
								document.getElementById(errDisplayId).hidden = false;
							}
							else
							{
								// enable button and hide error message
								document.getElementById(disableBtn).disabled = false;
								document.getElementById(errDisplayId).hidden = true;
							}
						},
						error: function() {
							console.log("from error block");
						}
					});
			}

			// during the creation of new folder(category) checking the foldername already exists(on this channel) or not. (Front End folder name duplication checking)
			function folderNameDuplicationChecking(folderPath,inputId,submitId,displayNameErrId)
			{
					// fetching folder list of this folderPath
					jQuery.ajax({
						method: "POST",
						url: 'spaValidation.php',
						dataType: 'json',
						data: {
							"folderPath": folderPath,
							"channel_name": '<?php echo $channelName;?>',
							"ln"          : "<?=$ln;?>",
							"block":"4"
						},

						success: function(response) {
							var givenFolderName = document.getElementById(inputId).value;
							var regPattern = /^\S(.*\S)*$/;
							var exist = response.foldersList.includes(givenFolderName);
							if(exist)
							{
								// disable button and give error message
								document.getElementById(submitId).disabled = true;
								//show duplicate foldername err msg
								document.getElementById(displayNameErrId).hidden = false;
							}
							else
							{
								// enable button and hide error message
								document.getElementById(submitId).disabled = false;
								document.getElementById(displayNameErrId).hidden = true;
							}
						},
						error: function() {
							console.log("from error block during folderNameDuplicationChecking");
						}
					});
			}
			// gives messege to admin in which category his uploaded file has been uploaded
			function showAlert(msg_body)
			{
				var AlertMsg = $('div[role="alert"]');
				$(AlertMsg).find('p').html(msg_body);
				$(AlertMsg).removeAttr('class');
				$(AlertMsg).addClass('alert alert-' + 'success');
				$(AlertMsg).show();
			}

			// file uploading and file creating on server block
			$('#fileUploadingForm' ).submit(
				function( e ) {
					e.preventDefault();
					const fi = document.getElementById('inputFileUpload');
					const uploadedFileSize = fi.files.item(0).size/1024/1024; 
					
					if(uploadedFileSize <= 256)
					{
						var formData = new FormData( this );
						formData.append("block","1");
						formData.append("ln","<?=$ln;?>");

						var givenNewFileName = formData.get("displayName").trim(); 	// getting the new file name for renaming
						if (givenNewFileName === "" || givenNewFileName == null) // checking that the given file name is either blank or only spaces (matches the valid pattern or not)
						{
							//show pattern error msg
							alert("<?=$languageJsonFile['admin_Backend_alert_FileUpload_nameValidation'];?>") ; //No non whitespace character is there, so can't upload this file.At least one non whitespace character is required in the content Name. 
						} else
						{
							// assigning the trimmed new file name value into formData which is sending to backend
							formData.delete("displayName");
							formData.append("displayName",givenNewFileName);

							document.getElementById("uploadButton").disabled = true;
							document.getElementById("progressDiv").style.display = "inline";
							$(".progress-bar").css("width", "0%");
							$(".progressTxt").html('0%');
							$.ajax( {
								xhr: function() {
										var xhr = new window.XMLHttpRequest();
										xhr.upload.addEventListener("progress", function(evt) {
										if (evt.lengthComputable) {
										var percentComplete = ((evt.loaded / evt.total) * 100);
										$(".progressTxt").html(Math.floor(percentComplete)+'%');
										$(".progress-bar").css("width", percentComplete+"%");
										}
									}, false);
									return xhr;
								},
								url: 'spaDBManipulation.php',
								type: 'POST',
								dataType: 'json',
								data: formData,
								processData: false,
								contentType: false,
								success: function(result){
									document.getElementById("uploadButton").disabled = false;
									console.log("result = "+result);
									if(result.hasOwnProperty('prblm'))
									{
										setTimeout(function(){alert(result.msg);}, 1000);
									}
									else
									{
										setTimeout(function(){alert(result.msg);}, 1000);
									}
									setTimeout(function(){location.reload();}, 1000);
								},
								error: function(result)
								{
									console.log("error in file uploading with response =>");
									console.log(result);
								}
							} );
						}
					}
					else
					{
						alert("<?=$languageJsonFile['admin_Backend_alert_uploadSize'];?>");//You cannot upload a file whose size is greater than 256 MB
						e.preventDefault();
						location.reload();
					}
				} 
			);
			
			// file renaming (content edition) using ajax . But first checking that the requested file, in this folder exists or not.
			$('.contentRenameForm').submit(
				function( e ) 
				{
					e.preventDefault();
					var xp = 2;
					var formData = new FormData( this );
					formData.append("block","8");
					formData.append("ln","<?=$ln;?>");
					var givenNewFileName = formData.get("editContentName").trim(); 	// getting the new file name for renaming
					var uniqueContentName = formData.get("contentName");	// the physical file name in it's parent folder
					if (givenNewFileName === "" || givenNewFileName == null) // checking that the given file name is either blank or only spaces (matches the valid pattern or not)
					{
						//show pattern error msg
						document.getElementById("fileDisplayNamePatternEditErr-"+uniqueContentName).hidden = false; 
					} else
					{
						// hiding pattern error msg
						document.getElementById("fileDisplayNamePatternEditErr-"+uniqueContentName).hidden = true;

						// assigning the trimmed new file name value into formData which is sending to backend
						formData.delete("editContentName");
						formData.append("editContentName",givenNewFileName);

						jQuery.ajax({
							method: "POST",
							url: 'spaValidation.php',
							dataType: 'json',
							data: formData,
							processData: false,
							contentType: false,
							success: function(response) {
								if(response.msg == "exists")
								{
									formData.delete("block");
									formData.append("block","7");
									$.ajax( {
										url: 'spaDBManipulation.php',
										type: 'POST',
										data: formData,
										processData: false,
										contentType: false,
										success: function(response){
											console.log(response);
											alert(response);
											location.reload();
										}
									} );
								}
								else if(response.msg == "notExists")
								{
									alert("<?=$languageJsonFile['admin_Backend_alert_ContentExist_rename'];?>"); //This contents does not exist in this category, that's why renaming this contents is not possible. Please reload this page.
									location.reload();
								}
							},
							error: function() {
								console.log("from error block during content renaming and checking the file exists or not.");
							}
						});
					}
				} 
			);

			// file changing(reuploading file without changing it's name) using ajax . But first checking that the requested file, in this folder exists or not.
			$('.fileReuploadingForm').submit(
				function( e ) {
					e.preventDefault();
					var reUploadingForm = this;
					var formData = new FormData( this );
					formData.append("block",5);
					formData.append("ln","<?=$ln;?>");
					$(reUploadingForm).find('button[type=submit]').prop('disabled', true);
					var fileName = formData.get('fileName');

					$.ajax( {
						url: 'spaValidation.php',
						type: 'POST',
						data: formData,
						dataType: 'json',
						processData: false,
						contentType: false,
						success: function(response){
							if(response.msg == "exists")
							{
								document.getElementById("progressDiv-"+fileName).style.display = "inline";
								document.getElementById("reuploadBar-"+fileName).style.width = '0%';
								document.getElementById("progressTxt-"+fileName).innerHTML = "0%";
								formData.delete("block");
								formData.append("block",8);
								$.ajax( {
									xhr: function() {
										var xhr = new window.XMLHttpRequest();
										xhr.upload.addEventListener("progress", function(evt) 
										{
											if (evt.lengthComputable) 
											{
												var percentComplete = ((evt.loaded / evt.total) * 100);
												document.getElementById("reuploadBar-"+fileName).style.width =percentComplete+"%";
												document.getElementById("progressTxt-"+fileName).innerHTML = Math.floor(percentComplete)+"%";
											}
										}, false);
										return xhr;
									},
									url: 'spaDBManipulation.php',
									type: 'POST',
									data: formData,
									processData: false,
									contentType: false,
									success: function(result){
										$(reUploadingForm).find('button[type=submit]').prop('disabled', false);
										console.log(result);
										setTimeout(function(){alert(result);}, 1000);
										setTimeout(function(){location.reload();}, 1000);
									},
									error: function(result)
									{
										$(reUploadingForm).find('button[type=submit]').prop('disabled', false);
										alert("error in manipulation backend");
										location.reload();
									}
								} );
							}
							else if(response.msg == "not exists")
							{
								alert("<?=$languageJsonFile['admin_Backend_alert_ContentExist_reupload'];?>"); // this file does not exist in this folder, that's why reuploading this file is not possible. Please reload this page to be synced with other admin.
								location.reload();
							}
						},
						error: function(result)
						{
							$(reUploadingForm).find('button[type=submit]').prop('disabled', false);
							alert("error in validation backend");
							location.reload();
						}
				} );
				return false;
				} 
			);

			// folder deletion using spa after checking the validity of folder deletion(i.e. the folder is empty or not)
			function folderDelete(channelName,folderName,folderPath)
			{
					jQuery.ajax
					({
						type: "POST",
						url: 'spaDBManipulation.php',
						dataType: 'json',
						data: {
							"deleteFolder": folderName,
							"channel_name": channelName,
							"folderPath": folderPath,
							"ln"		: "<?=$ln;?>",
							"block":"2"
						},
						success: function(response) {
							if(response.msg == "success")
							{
								alert("<?=$languageJsonFile['admin_con_delete_Msg1'];?>");
								location.reload();
							}
							else
								alert("error");
						},
						error: function(response) {
							console.log("from error block");
						}
					});
			}

			// creating New Category(folder) using spa
			function makingNewCategory(channel,foldersList,folderPath) {
				var folder = document.getElementById('newFolderInput').value.trim();

				if (folder === "" || folder == null) // checking that the given folder name is either blank or only spaces (matches the valid pattern or not)
				{
					//show pattern error msg
					document.getElementById("folderDisplayNamePatternErr").hidden = false; 
				} else {
					// hiding pattern error msg
					document.getElementById("folderDisplayNamePatternErr").hidden = true;

					var exist = foldersList.includes(folder);
					if(!exist)
					{
						jQuery.ajax
						({
							type: "POST",
							url: 'spaDBManipulation.php',
							dataType: 'json',
							data: {
								"createFolder": folder,
								"channel_name": channel,
								"folderPath":   folderPath,
								"ln"		:	"<?=$ln;?>",
								"block":"3"
							},

							success: function(response) {
								alert(response.msg);
								location.reload();
							},
							error: function() {
								location.reload();
								alert("Error from Backend");
							}
						});
					}
					else
						alert("<?=$languageJsonFile['admin_Backend_alert_Categoryname_exists'];?>"); // Category Name already exisits. Please give differnet Category name.

				}
			}

			// Folder renaming using spa
			function folderEdit(channelName,folderId,folderPath)
			{
				var newDisplayName = document.getElementById('editedFolderName-'+folderId).value.trim();
				if(newDisplayName == "")	// checking that the given folder name is either blank or only spaces (matches the valid pattern or not)
				{
					//show pattern error msg
					document.getElementById("folderDisplayNamePatternEditErr-"+folderId).hidden = false;
				} 
				else
				{
					// hiding pattern error msg
					document.getElementById("folderDisplayNamePatternEditErr-"+folderId).hidden = true;
					jQuery.ajax
					({
						type: "POST",
						url: 'spaDBManipulation.php',
						dataType: 'json',
						data: {
							"folderId": folderId,
							"newDisplayName": newDisplayName,
							"folderPath": folderPath,
							"channel_name": channelName,
							"ln"		:	"<?=$ln;?>",
							"block":"4"
						},
						success: function(response) {
							alert(response.msg);
							location.reload();
						},
						error: function() {
							location.reload();
							alert("<?=$languageJsonFile['admin_Backend_alert_Categoryname_created'];?>"); //folder created successfully
						}
					});
				}
			}
		</script>
		<script>
			$(document).ready(function() {
				var lengthOfFolderTable = <?= count($foldersTable)?>;
				var lengthOfFileTable = <?= count($contentsTable)?>;
				if(lengthOfFileTable == 0)
				{
					// hiding file section
					document.getElementById('contentsHide').hidden = true;
				}
				if(lengthOfFolderTable == 0 )
				{
					// hiding folder section
					document.getElementById('categoryHide').hidden = true;
				}
			} );
			var contetntTableInitialize = null;
			var categoryTableInitialize = null;
			var targetContentColumn = null;
			var targetCategoryColumn = null;
			function tableReinitialize()
			{
				contetntTableInitialize.destroy();
				categoryTableInitialize.destroy();
				var width = $(window).width();
				switch(true)
				{
					case (width < 768): // it's a mobile (portrait and landscape)
						//visible cat col => [0,1] //invisible cat col => [ 2,3,4,5 ]
						//visible con col => [0,1] //invisible con col => [ 2,3,4,5,6,7]
						targetCategoryColumn = [ 2,3,4,5 ];
						catColumns= [
							{ orderable: false, width: "42px" },
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						targetContentColumn = [ 2,3,4,5,6,7];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						break;
					case (width >= 768 && width <= 991): // it's an iPad
						//visible cat col => [0,1,2] //invisible cat col => [ 3,4,5 ]
						//visible con col => [0,1,2] //invisible con col => [ 3,4,5,6,7]
						targetCategoryColumn = [ 3,4,5 ];
						catColumns= [
							{ orderable: false, width: "42px" },
							null,
							null,
							{visible:false},
							{visible:false},
							{visible:false}
						];
						targetContentColumn = [ 3,4,5,6,7];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						break;
					case (width >= 992 && width <= 1199): // ipad pro, big tab
						//visible cat col => [0,1,2,3,4] //invisible cat col => [5]
						//visible con col => [0,1,2,3] //invisible con col => [ 4,5,6,7 ]
						targetCategoryColumn = [ 5 ];
						catColumns= [
							{ orderable: false, width: "42px" },
							null,
							null,
							null,
							null,
							{visible:false}
						];
						targetContentColumn = [ 4,5,6,7 ];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							null,
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						break;
					case (width >= 1200 && width <= 1350): // small desktop
						//visible cat col => [1,2,3,4,5] //invisible cat col => [0]
						//visible con col => [0,1,2,3,4,5,6] //invisible con col => [ 7 ]
						targetCategoryColumn = [ 0 ];
						catColumns= [
							{ visible: false },
							null,
							null,
							null,
							null,
							{orderable:false}
						];
						targetContentColumn = [ 7 ];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							null,
							null,
							null,
							{orderable: false},
							{orderable:false},
							{visible:false}
						];
						break;
					default: // desktop
						//visible cat col => [1,2,3,4,5] //invisible cat col => [0]
						//visible con col => [1,2,3,4,5,6,7] //invisible con col => [0]
						targetCategoryColumn = [ 0 ];
						catColumns= [
							{visible:false},
							null,
							null,
							null,
							null,
							{orderable:false}
						];
						targetContentColumn = [ 0 ];
						conColumns = [
							{visible:false},
							null,
							null,
							null,
							null,
							{orderable:false},
							{orderable:false},
							{orderable:false}
						];
						break;
				}
				categoryTableInitialize = $('#listViewCategoryTable').DataTable( {
						autoWidth: false,
						searching: false,
						paging: false,
						bInfo : false,
						order: [],				// datatable by default sort the table based on the first column. To disable that one I am giving nothing for the default sorting.
						columns: catColumns
					} );
				contetntTableInitialize = $('#listViewContentTable').DataTable( {
						autoWidth: false,
						searching: false,
						paging: false,
						bInfo : false,
						order: [],				// datatable by default sort the table based on the first column. To disable that one I am giving nothing for the default sorting.
						columns: conColumns
				} );
			}
			function tableInitialize()
			{
				var width = $(window).width();
				switch(true)
				{
					case (width < 768): // it's a mobile (portrait and landscape)
						//visible cat col => [0,1] //invisible cat col => [ 2,3,4,5 ]
						//visible con col => [0,1] //invisible con col => [ 2,3,4,5,6,7]
						targetCategoryColumn = [ 2,3,4,5 ];
						catColumns= [
							{ orderable: false, width: "42px" },
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						targetContentColumn = [ 2,3,4,5,6,7];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						break;
					case (width >= 768 && width <= 991): // it's an iPad
						//visible cat col => [0,1,2] //invisible cat col => [ 3,4,5 ]
						//visible con col => [0,1,2] //invisible con col => [ 3,4,5,6,7]
						targetCategoryColumn = [ 3,4,5 ];
						catColumns= [
							{ orderable: false, width: "42px" },
							null,
							null,
							{visible:false},
							{visible:false},
							{visible:false}
						];
						targetContentColumn = [ 3,4,5,6,7];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						break;
					case (width >= 992 && width <= 1199): // ipad pro, big tab
						//visible cat col => [0,1,2,3,4] //invisible cat col => [5]
						//visible con col => [0,1,2,3] //invisible con col => [ 4,5,6,7 ]
						targetCategoryColumn = [ 5 ];
						catColumns= [
							{ orderable: false, width: "42px" },
							null,
							null,
							null,
							null,
							{visible:false}
						];
						targetContentColumn = [ 4,5,6,7 ];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							null,
							null,
							{visible:false},
							{visible:false},
							{visible:false},
							{visible:false}
						];
						break;
					case (width >= 1200 && width <= 1350): // small desktop
						//visible cat col => [1,2,3,4,5] //invisible cat col => [0]
						//visible con col => [0,1,2,3,4,5,6] //invisible con col => [ 7 ]
						targetCategoryColumn = [ 0 ];
						catColumns= [
							{ visible: false },
							null,
							null,
							null,
							null,
							{orderable:false}
						];
						targetContentColumn = [ 7 ];
						conColumns = [
							{ orderable: false, width: "42px" },
							null,
							null,
							null,
							null,
							{orderable: false},
							{orderable:false},
							{visible:false}
						];
						break;
					default: // desktop
						//visible cat col => [1,2,3,4,5] //invisible cat col => [0]
						//visible con col => [1,2,3,4,5,6,7] //invisible con col => [0]
						targetCategoryColumn = [ 0 ];
						catColumns= [
							{visible:false},
							null,
							null,
							null,
							null,
							{orderable:false}
						];
						targetContentColumn = [ 0 ];
						conColumns = [
							{visible:false},
							null,
							null,
							null,
							null,
							{orderable:false},
							{orderable:false},
							{orderable:false}
						];
						break;
				}
				categoryTableInitialize = $('#listViewCategoryTable').DataTable( {
						autoWidth: false,
						searching: false,
						paging: false,
						bInfo : false,
						order: [],				// datatable by default sort the table based on the first column. To disable that one I am giving nothing for the default sorting.
						columns: catColumns
					} );
				contetntTableInitialize = $('#listViewContentTable').DataTable( {
						autoWidth: false,
						searching: false,
						paging: false,
						bInfo : false,
						order: [],				// datatable by default sort the table based on the first column. To disable that one I am giving nothing for the default sorting.
						columns: conColumns
						} );
			}

			$(document).ready(function() {
				tableInitialize();
				window.addEventListener("resize",tableReinitialize);
				
				// formatting the data of the child rows of contentTable for mobile devices only
				function formatForChildRowOfContents(d) {
					var columnNameMapping = [	"",																	//0
												"",																	//1
												"<?=$languageJsonFile['admin_contents_list_lastUpdateDate'];?>",	//2
												"<?=$languageJsonFile['admin_contents_list_play_count'];?>",		//3
												"<?=$languageJsonFile['admin_contents_list_viewing_period'];?>",		//4
												"<?=$languageJsonFile['admin_contents_list_password'];?>",		//5
												"<?=$languageJsonFile['admin_contents_private_share'];?>",			//6
												""																	//7
											];
					var returnString = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
					for(var i = 0 ; i < targetContentColumn.length ; i++)		// showing those content column which was invisible initailly
					{
						if(targetContentColumn[i] == 7)
						{
							returnString += '<tr>'+
												'<td colspan="2">'+d[7]+'</td>'+
											'</tr>';
						}
						else
						{
							returnString +=  '<tr>'+
												'<td>'+columnNameMapping[targetContentColumn[i]]+':</td>'+
												'<td>'+d[targetContentColumn[i]]+'</td>'+
											'</tr>';
						}
					}
					return returnString;
				}

				// formatting the data of the child rows of categoryTable for mobile devices only
				function formatForChildRowOfCategory(d) {
					var columnNameMapping = [	"",																	//0
												"",																	//1
												"<?=$languageJsonFile['admin_category_list_lastUpdateDate'];?>",	//2
												"<?=$languageJsonFile['admin_category_list_cat_count'];?>",			//3
												"<?=$languageJsonFile['admin_category_list_con_count'];?>",			//4
												""																	//5
											];
					var returnString = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
					for(var i = 0 ; i < targetCategoryColumn.length ; i++)			// showing those category column which was invisible initailly
					{
						if(targetCategoryColumn[i] == 5)
						{
							returnString += '<tr>'+
												'<td colspan="2">'+d[5]+'</td>'+
											'</tr>';
						}
						else
						{
							returnString +=  '<tr>'+
												'<td>'+columnNameMapping[targetCategoryColumn[i]]+':</td>'+
												'<td>'+d[targetCategoryColumn[i]]+'</td>'+
											'</tr>';
						}
					}
					return returnString;
				}

				// for contents table on mobile platform
				$('#listViewContentTable tbody').on('click', 'td.expanderForContentTable', function () {		// opening and closing the child rows of contentTable for mobile devices only
					var table = $('#listViewContentTable').DataTable();
					var tr = $(this).parents('tr');
					var row = table.row( tr );
			
					if ( row.child.isShown() ) {
						// This row is already open - close 
						$(this)[0].innerHTML = '<img src="https://datatables.net/examples/resources/details_open.png"></img>';	// changing to + icon
						row.child.hide();
						tr.removeClass('shown');
					}
					else {
						// Open this row
						$(this)[0].innerHTML = '<img src="https://datatables.net/examples/resources/details_close.png"></img>';	// changing to - icon
						row.child( formatForChildRowOfContents(row.data()) ).show();
						tr.addClass('shown');
					}
				} );

				// for category table on mobile platform
				$('#listViewCategoryTable tbody').on('click', 'td.expanderForCategoryTable', function () {		// opening and closing the child rows of categoryTable for mobile devices only
					var table = $('#listViewCategoryTable').DataTable();
					var tr = $(this).parents('tr');
					var row = table.row( tr );
			
					if ( row.child.isShown() ) {
						// This row is already open - close 
						$(this)[0].innerHTML = '<img src="https://datatables.net/examples/resources/details_open.png"></img>';	// changing to + icon
						row.child.hide();
						tr.removeClass('shown');
					}
					else {
						// Open this row
						$(this)[0].innerHTML = '<img src="https://datatables.net/examples/resources/details_close.png"></img>';	// changing to - icon
						row.child( formatForChildRowOfCategory(row.data()) ).show();
						tr.addClass('shown');
					}
				} );
			} );

			function ch(thi){
				$('.checkBox').prop('checked',false);
				thi.prop('checked',true);   
			}

			$(document).ready(function(){
				<?php foreach ($contentsTable as $content) : ?>		
					//For mobile responsive view (for list View only I have to write the statement in a twisted manner) setting the content renaming modals for every contents
					$('body').on("click","#contentRenameButton-<?php $id = explode(".",$content['name']);echo($id[0]);?>",function(){
						$("#contentRenameModal-<?php $id = explode(".",$content['name']);echo($id[0]);?>").modal("toggle");
					});
					
					//For mobile responsive view (for list View only I have to write the statement in a twisted manner) setting the content reuploading modals for every contents
					$('body').on("click","#contentFileChange-<?php $id = explode(".",$content['name']);echo($id[0]);?>",function(){
						$("#reuploadfile-<?php $id = explode(".",$content['name']);echo($id[0]);?>").modal("toggle");
					});
					
					//For mobile responsive view (for list View only I have to write the statement in a twisted manner) setting the content moving modals for every contents
					$('body').on("click","#contentMoveButton-<?php $id = explode(".",$content['name']);echo($id[0]);?>",function(){
						$("#modalForMove-<?php $id = explode(".",$content['name']);echo($id[0]);?>").modal("toggle");
					});

					// For mobile responsive view (for list View only I have to write the statement in a twisted manner) setting public private content sharing for all contents
					$('body').on("change","#privacyShare-<?php $id = explode(".",$content['name']);echo($id[0]);?>",function(){ 
						if(this.checked == false)	// i.e. want to share it publically
						{
							//adding the privacy tag to shared URL
							//alert('keep the footer of '+"<?=$content['displayName'];?>");
							var dataCopy = document.getElementById("contentShareCopy-<?php $id = explode(".",$content['name']);$contentId = ($id[0]); echo $contentId;?>").getAttribute("data-copy");
							var shareMail = document.getElementById("contentShareMail-<?php $id = explode(".",$content['name']);echo($id[0]);?>").getAttribute("onclick");
							var shareLine = document.getElementById("contentShareLine-<?php $id = explode(".",$content['name']);echo($id[0]);?>").getAttribute("onclick");
							var shareFb = document.getElementById("contentShareFb-<?php $id = explode(".",$content['name']);echo($id[0]);?>").getAttribute("onclick");
							// adding privacy for copy to clip board
							var splitedDataCopy = dataCopy.split("&");
							splitedDataCopy.push("pr="+"<?=$contentId;?>");
							splitedDataCopy = splitedDataCopy.join("&");
							var dataCopyAttrChangingId = "body #contentShareCopy-<?php $id = explode(".",$content['name']);echo($id[0]);?>";
							$(dataCopyAttrChangingId).attr("data-copy",splitedDataCopy);
							// creating the common shareable social link
							var splitedShareMail = shareMail.split("&");
							splitedShareMail[0] = splitedShareMail[0].substr(14);
							splitedShareMail[splitedShareMail.length-1] = splitedShareMail[splitedShareMail.length-1].replace("')","");
							//adding privacy to socialLink
							splitedShareMail.push("pr="+"<?=$contentId;?>");
							var socialLink = splitedShareMail.join("&");
							// adding the socialLink on different social media
							$("body #contentShareMail-<?php $id = explode(".",$content['name']);echo($id[0]);?>").attr("onclick","shareByEmail('" + socialLink + "')");
							$("body #contentShareLine-<?php $id = explode(".",$content['name']);echo($id[0]);?>").attr("onclick","shareByLine('" + socialLink + "')");
							$("body #contentShareFb-<?php $id = explode(".",$content['name']);echo($id[0]);?>").attr("onclick","shareByFb('" + socialLink + "')");
							//alert(dataCopy);
						}
						else
						{
							// i.e. want to share it privately
							//removing the privacy tag to shared URL
							//alert('gayeb the footer of '+"<?=$content['displayName'];?>");
							var dataCopy = document.getElementById("contentShareCopy-<?php $id = explode(".",$content['name']);$contentId = ($id[0]); echo $contentId;?>").getAttribute("data-copy");
							var shareMail = document.getElementById("contentShareMail-<?php $id = explode(".",$content['name']);echo($id[0]);?>").getAttribute("onclick");
							var shareLine = document.getElementById("contentShareLine-<?php $id = explode(".",$content['name']);echo($id[0]);?>").getAttribute("onclick");
							var shareFb = document.getElementById("contentShareFb-<?php $id = explode(".",$content['name']);echo($id[0]);?>").getAttribute("onclick");
							// removing privacy for copy to clip board
							var splitedDataCopy = dataCopy.replace("&pr="+"<?=$contentId;?>","");
							var dataCopyAttrChangingId = "body #contentShareCopy-<?php $id = explode(".",$content['name']);echo($id[0]);?>";
							$(dataCopyAttrChangingId).attr("data-copy",splitedDataCopy);
							// creating the common shareable social link
							var splitedShareMail = shareMail.substr(14);
							splitedShareMail = splitedShareMail.replace("')","");
							//removing privacy to socialLink
							var socialLink = splitedShareMail.replace("&pr="+"<?=$contentId;?>","");
							// adding the socialLink on different social media
							$("body #contentShareMail-<?php $id = explode(".",$content['name']);echo($id[0]);?>").attr("onclick","shareByEmail('" + socialLink + "')");
							$("body #contentShareLine-<?php $id = explode(".",$content['name']);echo($id[0]);?>").attr("onclick","shareByLine('" + socialLink + "')");
							$("body #contentShareFb-<?php $id = explode(".",$content['name']);echo($id[0]);?>").attr("onclick","shareByFb('" + socialLink + "')");
						}
					});
				<?php endforeach ?>
			});

			// dropbox view folder tree viewing has been implemented here
			function folderChangeForFileMoving(thisContentsParentPath,folderPath,modalIdForFolderList,modalIdForBreadcrumb,contentName)
			{
				//alert(folderPath);
				// checking the selected file exists or not (for concurrent multiple access of multiple admins)
				jQuery.ajax
					({
						type: "POST",
						url: 'spaValidation.php',
						dataType: 'json',
						data: {
							"contentName": contentName,
							"folderPath": thisContentsParentPath,
							"channel_name": "<?php echo $channelName;?>",
							"ln"		:	"<?=$ln;?>",
							"block":"8"
						},
						success: function(response) {
							if(response.msg == "exists")
							{
								//next, if selected content exists
								jQuery.ajax
								({
									// checking the selected folder (from breadcrumb or folderList) exists or not
									type: "POST",
									url: 'spaValidation.php',
									dataType: 'json',
									data: {
										"contentName": contentName,
										"folderPath": folderPath,
										"channel_name": "<?php echo $channelName;?>",
										"ln"		: "<?=$ln;?>",
										"block":"9"
									},
									success: function(response) {
										if(response.msg == "exists")
										{
											//next, if selected folder from modal's [breadcrumb or folderlist] exist
											jQuery.ajax
											({
												type: "POST",
												url: 'spaDBManipulation.php',
												dataType: 'json',
												data: {
													"channel_name":"<?php echo $channelName;?>",
													"folderPath": folderPath,
													"modalIdForFolderList": modalIdForFolderList,
													"modalIdForBreadcrumb":modalIdForBreadcrumb,
													"contentName": contentName,
													"ln"		:	"<?=$ln;?>",
													"block":"9"
												},
												success: function(response) {
													console.log(response);
													// cleaning previous breadcrumb
													const myParagraph = document.getElementById(response.modalIdForBreadcrumb);
													while (myParagraph.firstChild) {
														myParagraph.removeChild(myParagraph.lastChild);
													}
													// cleaning previous folderList
													const myList = document.getElementById(response.modalIdForFolderList);
													var len = document.getElementById(response.modalIdForFolderList).childElementCount;
													for (var i = 0; i < len ; i++) {
														myList.removeChild(myList.lastElementChild);
													}
													// creating new breadcrumb
													var targetDirectoryPathForMoving = "";
													var keys = Object.keys(response.breadCrumb);
													for(var i = 0 ; i < keys.length ; i++)
													{
														console.log(response.breadCrumb[keys[i]]);
														if(i == 0)
														{
															var italic = document.createElement("I");
															var att = document.createAttribute("class");
															att.value = "fas fa-home"; 
															italic.setAttributeNode(att); 
															var a = document.createElement("A"); 
															a.appendChild(italic); 
															var onclickAtt = "folderChangeForFileMoving('"+thisContentsParentPath+"','<?php echo $channelName;?>','"+response.modalIdForFolderList+"','"+response.modalIdForBreadcrumb+"','"+response.contentName+"')";
															a.setAttribute("onclick",onclickAtt);
															document.getElementById(response.modalIdForBreadcrumb).appendChild(a); 
															if(i+1 < keys.length )
															{
																var text = document.createTextNode("->");
																document.getElementById(response.modalIdForBreadcrumb).appendChild(text); 
															}
															
														}
														else
														{
															var a = document.createElement("A"); 
															if(i+1 < keys.length )
															{
																var onclickAtt = "folderChangeForFileMoving('"+thisContentsParentPath+"','"+response.breadCrumb[keys[i]][0]+"','"+response.modalIdForFolderList+"','"+response.modalIdForBreadcrumb+"','"+response.contentName+"')";
																a.setAttribute("onclick",onclickAtt);
															}
															a.innerText = response.breadCrumb[keys[i]][1];
															document.getElementById(response.modalIdForBreadcrumb).appendChild(a); 
															if(i+1 < keys.length )
															{
																var text = document.createTextNode("->");
																document.getElementById(response.modalIdForBreadcrumb).appendChild(text); 
																
															}
														}
														if(i == keys.length-1)
														{
															targetDirectoryPathForMoving = response.breadCrumb[keys[i]][0];
														}
														
													}

													// creating new folderList
													var len = response.folder.length;
													for(var i = 0 ; i < len ; i++)
													{
														// outer tag
														var node = document.createElement("LI");
														// inner tag
														var childNode = document.createElement("A");
														var onclickAtt = "folderChangeForFileMoving('"+thisContentsParentPath+"','"+response.folder[i]['folderPath']+"','"+response.modalIdForFolderList+"','"+response.modalIdForBreadcrumb+"','"+response.contentName+"')";
														childNode.setAttribute("onclick",onclickAtt);
														// inner most tag
														var grandChildNode = document.createElement("DIV");
														grandChildNode.setAttribute("class","card-header");
														var textnode = document.createTextNode(response.folder[i]['displayName']);
														grandChildNode.appendChild(textnode);
														childNode.appendChild(grandChildNode);
														node.appendChild(childNode);
														document.getElementById(response.modalIdForFolderList).appendChild(node);
													}

													// enabling/disabling the click ability of submission button and creating it's onclick attribute
													var submitBtnId = response.contentName.split(".")[0];
													submitBtnId = "contentMoveSubmission-"+submitBtnId;
													document.getElementById(submitBtnId).disabled = response.btnDisable;
													if(response.btnDisable)
													{
														document.getElementById("contentMoveSubmissionDisableMsg-"+response.contentName.split(".")[0]).innerHTML = response.btnDisableMsg;
														document.getElementById("contentMoveSubmissionDisableMsg-"+response.contentName.split(".")[0]).hidden = false;
													}
													else
													{
														document.getElementById("contentMoveSubmissionDisableMsg-"+response.contentName.split(".")[0]).hidden = true;
													}
													var submitOnClickAtt = "submissionForFileMoving('"+targetDirectoryPathForMoving+"','"+response.contentName+"','"+response.fromDirectoryPath+"')";
													var submitBtn = document.getElementById(submitBtnId);
													submitBtn.setAttribute("onclick",submitOnClickAtt);
													//alert(response.fromDirectoryPath);
													//alert(targetDirectoryPathForMoving);
												},
												error: function(response) {
													alert("from error inner_block. Check your backend.");
													location.reload();
												}
											});
										}
										else if(response.msg == "notExists")
										{
											alert("<?=$languageJsonFile['admin_Backend_alert_Category_exists'];?>"); // The selected category doesn't exist now (May be other admin has deleted this folder.  Please reload this page.)
											location.reload();
										}
									},
									error: function() {
										//location.reload();
										alert("from error block. Check your backend.");
									}
								});
								
							}
							else if(response.msg == "notExists")
							{
								alert("<?=$languageJsonFile['admin_Backend_alert_Contents_move'];?>"); // This content does not exist now. moving this content is impossible now. Please reload this page .)
								location.reload();
							}
						},
						error: function() {
							alert("from error block. Check your backend.");
							//location.reload();
						}
					});    
			}

			/* Plugin to integrate in your js. By djibe, MIT license */
			function bootstrapClearButton() {
				$('.position-relative :input').on('keydown focus', function() {
					if ($(this).val().length > 0) {
					$(this).nextAll('.form-clear').removeClass('d-none');
					}
				}).on('keydown keyup blur', function() {
					if ($(this).val().length === 0) {
					$(this).nextAll('.form-clear').addClass('d-none');
					}
				});
				$('.form-clear').on('click', function() {
					$(this).addClass('d-none').prevAll(':input').val('');
				});
			}

			// Init the script on the pages you need
			bootstrapClearButton();

			//file moving(moving file without changing it's name) using ajax. But first checking that requested file is in this folder exists or not.
			function submissionForFileMoving(targetDirectoryPath,contentName,fromDirectoryPath)
			{
				//alert("I am in submissionForFileMoving.<br>My values are<br>"+targetDirectoryPath+"<br>"+contentName+"<br>"+fromDirectoryPath);
				// checking that during the click on move button, checking that fromDirectory , targetDirectory and content exists or not. Also checking duplicate file exists or not in targetDirectory.
				jQuery.ajax
				({
					type: "POST",
					url: 'spaValidation.php',
					dataType: 'json',
					data: {
						"contentName": contentName,
						"fromDirectoryPath": fromDirectoryPath,
						"targetDirectoryPath":targetDirectoryPath,
						"channel_name": "<?php echo $channelName;?>",
						"ln"		:	"<?=$ln;?>",
						"block":"10"
					},
					success: function(response) {
						if(response.msg == "exists")
						{
							jQuery.ajax
							({
								type: "POST",
								url: 'spaDBManipulation.php',
								dataType: 'json',
								data: {
									"targetDirectoryPath": targetDirectoryPath,
									"contentName": contentName,
									"fromDirectoryPath": fromDirectoryPath,
									"channel_name": "<?php echo $channelName;?>",
									"ln"		:	"<?=$ln;?>",
									"block":"10"
								},
								success: function(response) {
									alert(response.msg);
									location.reload();
								},
								error: function() {
									//location.reload();
									alert("from error block. Check your backend.");
								}
							});
						}
						else if(response.msg == "notExists")
						{
							alert(response.errorMsg);
							location.reload();
						}
					},
					error: function() {
						//location.reload();
						alert("from error block. Check your backend.");
					}
				});
			}
		</script>
	</body>
</html>