<?php

	$channelName = "";
	if(isset($_POST['channel_name']))
		$channelName = $_POST['channel_name'];

	
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
    //loading infromations of all Trash files
	$data_results = file_get_contents('jsonFiles/recycleBin.json');
	$recycleJsonData = json_decode($data_results,true);



switch($_POST['block'])
{
	case "0":	//giving the latest blackListedBrowserTime value of given browser for a specific channel. it is giving after every 10 seconds for accessValidity checking of admin
		if(isset($schoolJsonData[$_POST['channel_name']]['blackListedBrowserTime'][$_POST['browserName']]))
		{
			echo $schoolJsonData[$_POST['channel_name']]['blackListedBrowserTime'][$_POST['browserName']];
		}
		else
			echo 0;
		break;
    case "1": // checking the target channel(going to edit) for disabling exists or not
        if(isset($schoolJsonData[$channelName]['active']))
		{
			$response['msg'] = "exists";
		}
        else
            $response['msg'] = "notExists";
        echo json_encode($response);
		break;
	case "2": // checking the target channel(going to edit) for enabling exists or not
		if(isset($schoolJsonData[$channelName]['active']))
		{
			if($schoolJsonData[$channelName]['active'] == 0)
				$response['msg'] = "exists";
			else
				$response['msg'] = "notExists";
		}
		else
			$response['msg'] = "notExists";
		echo json_encode($response);
		break;
	case "3": // sending the channel display name list
		$channelDisplayNameList = [];
		foreach (glob('contents/*') as $channel) 
		{
			if (is_dir($channel)) {
				$tmp = [];
				// $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
				$tmp['name'] = pathinfo($channel, PATHINFO_BASENAME);
				if(isset($schoolJsonData[$tmp['name']]['displayName']))
				{
					$channelDisplayNameList[] = $schoolJsonData[$tmp['name']]['displayName'];
				}
				
			}
		}
		$response = array();
		$response["channelDisplayNameList"] = $channelDisplayNameList;
		echo(json_encode($response));
		break;
}

?>
