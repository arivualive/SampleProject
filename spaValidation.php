<?php

    // echo(json_encode(""));
    // exit();
	$channelName = "";
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

    if(isset($_POST['ln']))
	{
		$ln = $_POST['ln'];
		if(intval($ln) < 1 || intval($ln) > 2)
			$ln = $schoolJsonData[$channelName]['defaultLanguage'];
	}
	else
	{
		if($channelName == "")
            $ln = "2";
        else
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

switch($_POST['block'])
{
    case "1": // checking and sending the flag about the restore button click ability (for recycleBin.php)
        if(file_exists("./contents/".$_POST['folderPath']) && isset($recycleJsonData[$channelName][$_POST['fileName']])) // if it parent's folder exists and if this file exists on reccle json file
        {
            $response['msg'] = "clickable";
        }
        else
        {
            $response['msg'] = "notClickable";
            if(isset($recycleJsonData[$channelName][$_POST['fileName']]) || !file_exists("./contents/".$_POST['folderPath']))
            {
                $response['alertMsg'] = $languageJsonFile['spaValidation_FileRestore_alert1']; // i.e. This content's parent category is not there. So it is not possible to restore this contents. Move this contents to another category.
            }
            else
                $response['alertMsg'] = $languageJsonFile['spaValidation_FileRestore_alert2']; // i.e. This content has been already restored by some other admin
        }
        echo json_encode($response);
        break;
    case "7": // checking and sending the flag about delete button click ability (for recycleBin.php)
        if(isset($recycleJsonData[$channelName][$_POST['fileName']]))
        {
            $response['msg'] = "clickable";
        }
        else
            $response['msg'] = "not clickable";
        echo json_encode($response);
        break;
    case "2": // sending the contents list of the foldername
        $folderPath = "";
        $folderPath = $_POST['folderPath'];
        $contentsTable = [];
        $contetnsDisplayNameList = [];
        foreach (glob('contents/'.$folderPath . '/*') as $content) 
        {
            if (is_file($content)) {
                $tmp = [];
                // $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
                $tmp['name'] = pathinfo($content, PATHINFO_BASENAME);
                if($fileJsonData[$tmp['name']]['active'] == 1)
                {
                    $tmp['path'] = realpath($content);
                    $tmp['displayName'] = $fileJsonData[$tmp['name']]['displayName'];
                    $tmp['modifyDate'] = strtotime($fileJsonData[$tmp['name']]['modifyDate']);
                    $contetnsDisplayNameList[] = $tmp['displayName'];

                    $contentsTable[] = $tmp;
                }
                
            }
        }
        $response = array();
        $response["fileList"] = $contetnsDisplayNameList;
        echo(json_encode($response));
        break;
    case "3": // checking validity for folder deletion (it exists or not and also checking that whether it contains file or folders)
        $folderName = $_POST['deleteFolder'];
        $deleteFlag = true;
        $response['channelName'] = $_POST['channel_name'];
        $response['folderName'] = $folderName;
        $response['folderPath'] = $_POST['folderPath'];
        if(isset($GLOBALS['folderJsonData'][$folderName]))
        {
            if($GLOBALS['folderJsonData'][$folderName]['fileCount'] > 0 || $GLOBALS['folderJsonData'][$folderName]['folderCount'] > 0)
            {
                $response['delteFlag'] = false;
                echo(json_encode($response));
                exit();
            }
            else
            {
                $response['deleteFlag'] = true;
                echo(json_encode($response));
                exit();
            }
        }
        else
        {
            $response['delteFlag'] = false;
            $response['msg'] = $languageJsonFile['spaValidation_FolderDeletion_alert']; // i.e. This category has been already deleted
            echo(json_encode($response));
            exit();
        }
        
        break;
    case "4": // sending the folders list of the foldername
        $folderPath = "";
        $folderPath = $_POST['folderPath'];
        $foldersTable = [];
        $foldersDisplayNameList = [];
        foreach (glob('contents/'.$folderPath . '/*') as $folder) 
        {
            if (is_dir($folder)) {
                $tmp = [];
                // $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
                $tmp['name'] = pathinfo($folder, PATHINFO_BASENAME);
                if(isset($folderJsonData[$tmp['name']]['displayName']))
                {
                    $tmp['path'] = realpath($folder);
                    $tmp['displayName'] = $folderJsonData[$tmp['name']]['displayName'];
                    $tmp['modifyDate'] = strtotime($folderJsonData[$tmp['name']]['modifyDate']);
                    $foldersDisplayNameList[] = $tmp['displayName'];

                    $foldersTable[] = $tmp;
                }
                
            }
        }
        $response = array();
        $response["foldersList"] = $foldersDisplayNameList;
        echo(json_encode($response));
        break;
    case "5": // during file reuploading on admin page (if concurrent access by multiple admin), checking this fileName exists or not 
        $response = array();
        if(file_exists("./contents/".$_POST['folderPath']."/".$_POST['fileName']))
        {
            $response['msg'] = "exists";
        }
        else
            $response['msg'] = "not exists";
        echo(json_encode($response));
        break;
    case "6": // checking the requested next folder exists or not
        if(isset($folderJsonData[$_POST['folderName']]['displayName']))
        {
            $response['msg'] = "exists";
        }
        else
            $response['msg'] = "not exists";
        echo json_encode($response);
        break;
    case "8": // during file renaming,moving on admin page (if concurrent access by multiple admin), Checking the file on that folder exists or not
        if(file_exists("./contents/".$_POST['folderPath']."/".$_POST['contentName']))
        {
            $response['msg'] = "exists";
        }
        else
            $response['msg'] = "notExists";
        echo json_encode($response);
        break;
    case "9": // during file moving on admin page, checking that selected modal's breadcrumb's part and folderList's selected folder exists or not (if concurrent access by multiple admin)
        if(file_exists("./contents/".$_POST['folderPath']))
        {
            $response['msg'] = "exists"; // selected folder (from bradcrumb or folderList exists)
        }
        else
            $response['msg'] = "notExists"; //selected folder (from bradcrumb or folderList does not exist)
        echo json_encode($response);
        break;
    case "10": // during file moving on admin page, during clicking on submit button to move the file ,checking that [contetnt , from path , to path exists] or not
        if(file_exists("./contents/".$_POST['fromDirectoryPath']."/".$_POST['contentName'])) // checking the file selected for move exists or not
        {
            if(file_exists("./contents/".$_POST['fromDirectoryPath'])) // checking the parent directory path of the selected file exists or not
            {
                if(file_exists("./contents/".$_POST['targetDirectoryPath'])) // checking the target directory path to move the selected file exists or not.
                {
                    foreach (glob('contents/'.$_POST['targetDirectoryPath'].'/'.'*') as $folder)
                    {
                        if(is_file($folder))
                        {
                            if($fileJsonData[pathinfo($folder, PATHINFO_BASENAME)]['displayName'] === $fileJsonData[$_POST['contentName']]['displayName'])   // checking inside the target directory same file name exists or not
                            {
                                $response['msg'] = "notExists";
                                $response['errorMsg'] = $languageJsonFile['spaValidation_FileMove_alert']; // i.e. You can't move these contents to this category because inside this category a content exists with the same contents name. To move this content into this category, first, rename this content.
                            }
                        }
                    }
                    if(!isset($response))
                        $response['msg'] = "exists";
                }
                else
                {
                    $response['msg'] = "notExists";
                    $response['errorMsg'] = $languageJsonFile['spaValidation_FileMove_alert2']; // i.e. This target directory for moving this content is not available now (may be deleted by other admin). Reloading the page to be synchronized with latest updates
                }
            }
            else
            {
                $response['msg'] = "notExists";
                $response['errorMsg'] = $languageJsonFile['spaValidation_FileMove_alert3']; // i.e. This parent category of this content is not available now (maybe deleted by other admin). Reloading the page to be synchronized with the latest updates.
            }
        }
        else
        {
            $response['msg'] = "notExists";
            $response['errorMsg'] = $languageJsonFile['spaValidation_FileMove_alert4']; // i.e. 
        }
        echo json_encode($response);
        break;
    case "11": // during file moving on recyclebin.php (if concurrent access by multiple admin), checking the file on the wastebin of that channel exists or not
        if(file_exists("./contents/".$channelName."/wastebin/".$_POST['contentName']))
        {
            $response['msg'] = "exists";
        }
        else
            $response['msg'] = "notExists";
        echo json_encode($response);
        break;
}

?>
