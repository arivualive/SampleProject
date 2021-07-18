<?php
    session_start();
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
    //loading infromations of all Trash files
	$data_results = file_get_contents('jsonFiles/recycleBin.json');
	$recycleJsonData = json_decode($data_results,true);
	//loading infromations of all schools
	$data_results = file_get_contents('jsonFiles/school.json');
    $schoolJsonData = json_decode($data_results,true);
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
        case "1": /// file creation cmd block
            
            if (isset($_FILES['upload_file'])) {
                if($schoolJsonData[$channelName]['remainingSpace']>=$_FILES['upload_file']['size'])
                {
                    if (is_uploaded_file($_FILES['upload_file']['tmp_name'])) 
                    {
                        if (isset($_POST['folderPath']) && $_POST['folderPath'] != "") 
                        {
                            
                            if(file_exists('./contents/'.$_POST['folderPath']))   // checking that whether the given target directory exist or not (for concurrent admin access)
                            {
                                $alreadyExists = false;
                                foreach (glob('contents/'.$_POST['folderPath'].'/*') as $existingFile) {
                                    if (is_file($existingFile)) {
                                        if($fileJsonData[pathinfo($existingFile, PATHINFO_BASENAME)]['displayName'] === $_POST['displayName'])
                                            $alreadyExists = true;// checking that same fileName(requested for upload) in the given directory exists or not
                                    }
                                }
                                if(!$alreadyExists)
                                {
                                    // uploading the file to target directory
                                    $fileName = explode(".",$_FILES['upload_file']['name']);
                                    $fileType = $fileName[count($fileName)-1];
                                    $fileUId = uniqid(true).'.'.$fileType;
                                    $targetFilePath = './contents/'.$_POST['folderPath'] . '/' . $fileUId;
                                    if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $targetFilePath))
                                    {
                                        // File Creation Cmd
                                        chmod($targetFilePath, 0777);
                                        // making the thumbnail image for the content by creating the cache of it
                                        if(strtoupper($fileType) != "MP4")
                                        {
                                            require_once( __DIR__ . '/tbwp4/divider/divider_test.php');
                                            $dividingResult = Divide($fileUId,$_POST['folderPath']);

                                            //giving permission to the cache folder=>made in deployment date
                                            if(file_exists('./tbwp4/files/' . $fileUId))
                                            {
                                                chmod('./tbwp4/files/' . $fileUId,0777);
                                            }
                                            // checking the png thumbnail for tbm file type has been created or not
                                            if(strtoupper($fileType) == "TBM" || strtoupper($fileType) == "TBMT")
                                            {
                                                if(file_exists('./tbwp4/files/' . $fileUId))
                                                {
                                                    // giving the permission to the cache folder
                                                    chmod('./tbwp4/files/' . $fileUId,0777);

                                                    // checking the first block is mp4 or not
                                                    if(!file_exists('./tbwp4/files/' . $fileUId."/0000_0001.mp4"))
                                                    {
                                                        // if the first block is not mp4 then it must be an image of any type (jpg,png,gif)
                                                        switch(true)
                                                        {
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.png"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.png"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.PNG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.PNG"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPG"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpg"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpeg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpeg"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPEG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPEG"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.gif"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.gif"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.GIF"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.GIF"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.bmp"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.bmp"; break;
                                                            case file_exists("./tbwp4/files/".$fileUId."/0000_0001.BMP"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.BMP"; break;
                                                            default: $inImg = ""; break;
                                                        }
                                                        if($inImg != "")
                                                        {
                                                            if(mkdir('./tbwp4/thumbnail/' . $fileUId,0777)) // creating a folder(name is the fileID) for thumbnail image inside thumbnail folder
                                                            {
                                                                if(chmod('./tbwp4/thumbnail/' . $fileUId,0777)) // giving permission to that folder
                                                                {
                                                                    $outImg = './tbwp4/thumbnail/' . $fileUId."/thumbnailImg.jpg";
                                                                    $source = $inImg;
                                                                    $info = getimagesize($source);
                                                                    if ($info['mime'] == 'image/jpeg') 
                                                                        $image = imagecreatefromjpeg($source);
                                                                    elseif ($info['mime'] == 'image/gif') 
                                                                        $image = imagecreatefromgif($source);
                                                                    elseif ($info['mime'] == 'image/png') 
                                                                        $image = imagecreatefrompng($source);
                                                                    elseif ($info['mime'] == 'image/bmp')
                                                                        $image = imagecreatefrombmp($source);
                                                                    $outWidth = 320;
                                                                    $outHeight = 180;
                                                                    $sourceWidth = $info[0];
                                                                    $sourceHeight = $info[1];
                                                                    //Trying to maintain aspect ratio => width : height = 16 : 9 (for image)
                                                                    $ratioOfSource = $sourceWidth / $sourceHeight;  // getting the ratio of input image (width:height)
                                                                    $outWidth = $outHeight * $ratioOfSource;
                                                                    $image = imagescale($image,$outWidth,$outHeight);    // resizing the image into the dimension of 320*180
                                                                    $bool = imagejpeg($image,$outImg,25);   // compressing the file size by decreasing quality to 70 and saving to destination path
                                                                    $bool = imagedestroy($image);
                                                                }
                                                            }
                                                            
                                                        }
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                // this is for 8 types of thinkboard file("TBO","TBON","TBO-L","TBO-LN","TBO-M","TBO-MN","TBC","TBT",)
                                                // TBO series name pattern => 0001_100
                                                // TBM,TBMT,TBC,TBT series name pattern => 0000_0001
                                                // image file type is 3 (jpg,png,gif [bmp will be converted to jpg.])
                                                switch(true)
                                                {
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.jpg"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.jpg"; break; // for TBO series
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.JPG"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.JPG"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.jpeg"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.jpeg"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.JPEG"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.JPEG"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.png"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.png"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.PNG"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.PNG"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.gif"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.gif"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.GIF"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.GIF"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.bmp"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.bmp"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0001_100.BMP"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.BMP"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.png"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.png"; break; // for TBT
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.PNG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.PNG"; break;	// for TBT
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPG"; break;	// for TBC
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpg"; break; // for TBC
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpeg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpeg"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPEG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPEG"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.gif"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.gif"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.GIF"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.GIF"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.bmp"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.bmp"; break;
                                                    case file_exists("./tbwp4/files/".$fileUId."/0000_0001.BMP"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.BMP"; break;
                                                    default: $inImg = ""; break;
                                                }
                                                if($inImg != "")
                                                {
                                                    if(mkdir('./tbwp4/thumbnail/' . $fileUId,0777))   // creating a folder(name is the fileID) for thumbnail image inside thumbnail folder
                                                    {
                                                        if(chmod('./tbwp4/thumbnail/' . $fileUId,0777)) // giving permission to that folder
                                                        {
                                                            $outImg = './tbwp4/thumbnail/' . $fileUId."/thumbnailImg.jpg";
                                                            $source = $inImg;
                                                            $info = getimagesize($source);
                                                            if ($info['mime'] == 'image/jpeg') 
                                                                $image = imagecreatefromjpeg($source);
                                                            elseif ($info['mime'] == 'image/gif') 
                                                                $image = imagecreatefromgif($source);
                                                            elseif ($info['mime'] == 'image/png') 
                                                                $image = imagecreatefrompng($source);
                                                            elseif ($info['mime'] == 'image/bmp')
                                                                $image = imagecreatefrombmp($source);
                                                            $outWidth = 320;
                                                            $outHeight = 180;
                                                            $sourceWidth = $info[0];
                                                            $sourceHeight = $info[1];
                                                            //Trying to maintain aspect ratio => width : height = 16 : 9 (for image)
                                                            $ratioOfSource = $sourceWidth / $sourceHeight;  // getting the ratio of input image (width:height)
                                                            $outWidth = $outHeight * $ratioOfSource;
                                                            $image = imagescale($image,$outWidth,$outHeight);    // resizing the image into the dimension of 320*180
                                                            $bool = imagejpeg($image,$outImg,25);   // compressing the file size by decreasing quality to 70 and saving to destination path
                                                            $bool = imagedestroy($image);
                                                        }
                                                    }
                                                    
                                                }
                                            }
                                        }

                                        // creating the viewing period details and password details for all types of files and all combination of files
                                        switch(true)
                                        {
                                            case !isset($dividingResult):                                   // if file is mp4 then $dividingResult will not exist. this case is for that reason
                                                $dividingResult['viewingPeriod']['exist'] = false;
                                                $dividingResult['viewingPeriod']['startDay'] = "";
                                                $dividingResult['viewingPeriod']['endDay'] = "";
                                                $dividingResult['password'] = false;
                                                break;
                                            case $dividingResult['viewing_period']['exist']:                // This case is for other file types if viewingPeriod exists. exist must be true here.
                                                $dividingResult['viewingPeriod']['exist'] = $dividingResult['viewing_period']['exist'];
                                                $dividingResult['viewingPeriod']['startDay'] = date("Y/m/d",strtotime($dividingResult['viewing_period']['start_day']));
                                                $dividingResult['viewingPeriod']['endDay'] = date("Y/m/d",strtotime($dividingResult['viewing_period']['end_day']));
                                                break;
                                            default:                                                        // This case is for other file types if viewingPeriod does not exist.exist must be false here.
                                                $dividingResult['viewingPeriod']['exist'] = $dividingResult['viewing_period']['exist'];
                                                $dividingResult['viewingPeriod']['startDay'] = "";
                                                $dividingResult['viewingPeriod']['endDay'] = "";
                                        }

                                        $folderPathArray = explode("/",$_POST['folderPath']);
                                        // File creation json calling
                                        fileCreate($fileUId,$_POST['displayName'],$folderPathArray[count($folderPathArray)-1],$fileType,$_FILES['upload_file']['size'],$dividingResult['viewingPeriod'],$dividingResult['password']); // the file size is keeping in bytes in json
                                        if(isset($folderJsonData[$folderPathArray[count($folderPathArray)-1]]['displayName']))
                                            $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_otherCat1'].$folderJsonData[$folderPathArray[count($folderPathArray)-1]]['displayName'].$languageJsonFile['spaDBManipulation_Upload_alert_otherCat2']; //i.e.Successfully uploaded the file to Category
                                        else
                                            $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_home']; // i.e.successfully uploaded the file to [Home]
                                        $tmp = explode(".",$fileUId);
                                        $response['updatedOne'] = $tmp[0];
                                        if(isset($folderJsonData[$folderPathArray[count($folderPathArray)-1]]['displayName']))
                                            $_SESSION['fileUploaded'] = $folderJsonData[$folderPathArray[count($folderPathArray)-1]]['displayName'];
                                        else
                                            $_SESSION['fileUploaded'] = $languageJsonFile['spaDBManipulation_Upload_alert_home_name']; // i.e.Home
                                        echo json_encode($response);
                                    } 
                                    else 
                                    {
                                        // i.e. File upload failed
                                        $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_failed']; // i.e. File upload failed
                                        $response['prblm'] = 1;
                                        echo json_encode($response);
                                    }
                                }
                                else
                                {
                                    $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_SameName']; // i.e.This Content Name already exists on this category. Please give another name 
                                    $response['prblm'] = 1;
                                    echo json_encode($response);
                                }

                            }
                            else
                            {
                                // This category has been deleted already
                                $response['msg'] = "This category does not exist now.Uploading contents is not possible.This Category may be deleted by some other admin.Reloading the page to be syncronized with latest updates";
                                $response['prblm'] = 1;
                                echo json_encode($response);
                            }
                            
                        } 
                        else
                        {
                            $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_targetDir']; //i.e. Couldn't upload File because Target directory is not chosen.Please select the target directory. 
                            $response['prblm'] = 1;
                            echo json_encode($response);
                        }
                    } 
                    else 
                    {
                        $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_specified']; // i.e. Contents not specified
                        $response['prblm'] = 1;
                        echo json_encode($response);
                    }
                }
                else
                {
                    $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_storageSpace'];
                    // i.e. Your channel has not enough space to upload this file. Please buy some more space or delete something.
                    $response['prblm'] = 1;
                    echo json_encode($response);
                } 
            } 
            else 
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_notFound'];// i.e.upload file didn't found 
                $response['prblm'] = 1;
                echo json_encode($response);
            }
            break;
        case "5": //file deletion forever cmd block (from trash folder)
            require_once './tbwp4/php/remove_directory.php';
            $deletedFile = $recycleJsonData[$channelName][$_POST['deleteFile']]['displayName'];

            // delete file from wastebin cmd block
            if(unlink('./contents/'. $channelName . '/wastebin/' . $_POST['deleteFile']))
            {
                // permanently fileDeletion json logic
                fileDelete($_POST['deleteFile'],$channelName);

                if(is_dir('./tbwp4/files/' . $_POST['deleteFile']))
                    RemoveDirectory('./tbwp4/files/' . $_POST['deleteFile']);           // deleting the cache of the given file
                if(is_dir('./tbwp4/thumbnail/' . $_POST['deleteFile']))
                    RemoveDirectory('./tbwp4/thumbnail/' . $_POST['deleteFile']);           // deleting the thumbnail of the given file
            }
            $response['msg'] = $languageJsonFile['spaDBManipulation_delete_alert_permanant1'].$deletedFile.$languageJsonFile['spaDBManipulation_delete_alert_permanant2'];// i.e. Permanently deleted the file
            echo json_encode($response);
            break;
        case "11": // (file moving to wastebin block) and creating trash file data (cmd block)
            if($fileJsonData[$_POST['deleteFile']]['active'] == 1)
            {
                $from = "./contents/".$_POST['folderPath']."/".$_POST['deleteFile'];
                $to = "./contents/".$channelName."/wastebin/".$_POST['deleteFile'];
                if(rename($from,$to))
                {
                    $response = trashFileCreate($_POST['deleteFile'],$channelName,$_POST['folderPath']);
                    echo json_encode($response);
                }
                else
                {
                    $response['msg'] = $languageJsonFile['spaDBManipulation_delete_alert_notDeleted']; // i.e. This file was not deleted
                    echo json_encode($response);
                }
            }
            else
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_delete_alert_alreadyDeleted']; // i.e. This file has been already deleted
                echo json_encode($response);
            }
            break;
        case "12": // file restoring cmd block
            $from = "./contents/".$channelName."/wastebin/".$_POST['deleteFile'];
            $to = "./contents/".$_POST['folderPath']."/".$_POST['deleteFile'];
            if(file_exists($from) && file_exists("./contents/".$_POST['folderPath']))
            {
                /*Backend validation for fileName duplication  */
                $alreadyExists = false;
                $displayName = $_POST['fileDisplayName'];
                foreach (glob('./contents/'.$_POST['folderPath'].'/*') as $existingFile)    // backend file name duplication checking during file renaming 
                {
                    if (is_file($existingFile)) 
                    {
                        $currentDisplayName = pathinfo($existingFile, PATHINFO_BASENAME);
                        if($fileJsonData[$currentDisplayName]['displayName'] == $displayName)
                        {
                            $alreadyExists = true;
                        }
                    }
                }
                if(!$alreadyExists) // if there is no fileName duplication then will enter in this branch
                {
                    if(rename($from,$to))
                    {
                        $response = fileRestore($_POST['deleteFile'],$channelName,$_POST['folderPath'],$_POST['immidiateParent'],$_POST['fileDisplayName']);
                        echo json_encode($response);
                    }
                    else
                    {
                        $response['msg'] = $languageJsonFile['spaDBManipulation_Restore_alert']; // i.e. Already restored or permanently deleted by other admin
                        echo json_encode($response);
                    }
                }
                else
                {
                    $response['msg'] = $languageJsonFile['spaDBManipulation_Upload_alert_SameName']; // i.e.This Content Name already exists on this category. Please give another name 
                    echo json_encode($response);
                }

                
            }
            else
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_Restore_alert']; // i.e. Already restored or permanently deleted by other admin
                echo json_encode($response);
            }
            break;
        case "7": // file renaming json logic
            if($fileJsonData[$_POST['contentName']]['active'] == 1)
            {
                $alreadyExists = false;
                $displayName = $_POST["editContentName"];
                foreach (glob('./contents/'.$_POST['folderPath'].'/*') as $existingFile)    // backend file name duplication checking during file renaming 
                {
                    if (is_file($existingFile)) 
                    {
                        $currentDisplayName = pathinfo($existingFile, PATHINFO_BASENAME);
                        if($fileJsonData[$currentDisplayName]['displayName'] == $displayName)
                        {
                            $alreadyExists = true;
                        }
                    }
                }
                if(!$alreadyExists) // if there is no fileName duplication then will enter in this branch
                {
                    $fileJsonData[$_POST['contentName']]['displayName'] = $_POST['editContentName'];
                    $fileJsonData[$_POST['contentName']]['modifyDate'] = date("Y-m-d H:i:s");
                    $jsonUpdatedData = json_encode($fileJsonData);
                    file_put_contents('jsonFiles/file.json', $jsonUpdatedData);
                    $response = $languageJsonFile['spaDBManipulation_FileRename_alert_success1'].$_POST['editContentName'].$languageJsonFile['spaDBManipulation_FileRename_alert_success2']; // i.e. 
                    echo ($response);
                }
                else
                {
                    $response = "Sorry can't rename this content by this name because this content name already exists in this category. So try with other name";
                    echo ($response);
                }
               
            }
            else
            {
                $response = $languageJsonFile['spaDBManipulation_FileRename_alert']; // i.e. This file is aleady deleted
                echo ($response);
            }
            break;
        case "8": // file reuploading cmd block
            if($fileJsonData[$_POST['fileName']]['active'] == 1)
            {
                if(file_exists('./contents/'.$_POST['folderPath'])) // checking that whether the given target directory exist or not (for concurrent admin access)
                {
                    if(unlink('contents/'.$_POST['folderPath'] . '/' . $_POST['fileName'])) // deleting the previous file
                    {
                        // deleting the cache of the previous file(if exists)
                        if(file_exists('tbwp4/files/'.$_POST['fileName']))
                        {
                            require_once('./tbwp4/php/remove_directory.php');
                            RemoveDirectory('./tbwp4/files/'.$_POST['fileName']);   
                        }
                        // deleting the thumbnail image and it's parent folder of previous file(if exists)
                        if(file_exists('./tbwp4/thumbnail/'.$_POST['fileName']))
                        {
                            require_once('./tbwp4/php/remove_directory.php');
                            RemoveDirectory('./tbwp4/thumbnail/'.$_POST['fileName']);
                        }

                        // creating current file
                        $fileName = explode(".",$_FILES['upload_file']['name']);
                        $previousName = explode(".",$_POST['fileName']);
                        $fileType = $fileName[count($fileName)-1];
                        $fileUId = $previousName[0].'.'.$fileType;
                        $targetFilePath = './contents/'.$_POST['folderPath'] . '/' . $fileUId;
                        if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $targetFilePath)) 
                        {
                            chmod($targetFilePath, 0777);
                            // making the new cache for the new file (if the new file is not mp4 type)
                            if(strtoupper($fileType) != "MP4")
                            {
                                require_once( __DIR__ . '/tbwp4/divider/divider_test.php');
                                $dividingResult = Divide($fileUId,$_POST['folderPath']);

                                //giving permission to the cache folder=>made in deployment date
                                if(file_exists('./tbwp4/files/' . $fileUId))
                                {
                                    chmod('./tbwp4/files/' . $fileUId,0777);
                                }
                                
                                // checking the png thumbnail for tbm file type has been created or not
                                if(strtoupper($fileType) == "TBM" || strtoupper($fileType) == "TBMT")
                                {
                                    if(file_exists('./tbwp4/files/' . $fileUId))
                                    {
                                        // giving the permission to the cache folder
                                        chmod('./tbwp4/files/' . $fileUId,0777);

                                        // checking the first block of TBM and TBMT is mp4 or not
                                        if(!file_exists('./tbwp4/files/' . $fileUId."/0000_0001.mp4"))
                                        {
                                            // if the first block is not mp4 then it must be an image of any type (jpg,png,gif)
                                            switch(true)
                                            {
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.png"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.png"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.PNG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.PNG"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPG"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpg"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpeg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpeg"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPEG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPEG"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.gif"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.gif"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.GIF"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.GIF"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.bmp"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.bmp"; break;
                                                case file_exists("./tbwp4/files/".$fileUId."/0000_0001.BMP"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.BMP"; break;
                                                default: $inImg = ""; break;
                                            }
                                            if($inImg != "")
                                            {
                                                // it is sure that previous file,cache,thumbnail(both folder and image) has been deleted 
                                                if(mkdir('./tbwp4/thumbnail/' . $fileUId,0777)) // creating a folder(name is the fileID) for thumbnail image inside thumbnail folder
                                                {
                                                    if(chmod('./tbwp4/thumbnail/' . $fileUId,0777)) // giving permission to that folder
                                                    {
                                                        $outImg = './tbwp4/thumbnail/' . $fileUId."/thumbnailImg.jpg";
                                                        $source = $inImg;
                                                        $info = getimagesize($source);
                                                        if ($info['mime'] == 'image/jpeg') 
                                                            $image = imagecreatefromjpeg($source);
                                                        elseif ($info['mime'] == 'image/gif') 
                                                            $image = imagecreatefromgif($source);
                                                        elseif ($info['mime'] == 'image/png') 
                                                            $image = imagecreatefrompng($source);
                                                        elseif ($info['mime'] == 'image/bmp')
                                                            $image = imagecreatefrombmp($source);
                                                        $outWidth = 320;
                                                        $outHeight = 180;
                                                        $sourceWidth = $info[0];
                                                        $sourceHeight = $info[1];
                                                        //Trying to maintain aspect ratio => width : height = 16 : 9 (for image)
                                                        $ratioOfSource = $sourceWidth / $sourceHeight;  // getting the ratio of input image (width:height)
                                                        $outWidth = $outHeight * $ratioOfSource;
                                                        $image = imagescale($image,$outWidth,$outHeight);    // resizing the image into the dimension of 320*180
                                                        $bool = imagejpeg($image,$outImg,25);   // compressing the file size by decreasing quality to 70 and saving to destination path
                                                        $bool = imagedestroy($image);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    // this is for 8 types of thinkboard file("TBO","TBON","TBO-L","TBO-LN","TBO-M","TBO-MN","TBC","TBT",)
                                    // TBO series name pattern => 0001_100
                                    // TBM,TBMT,TBC,TBT series name pattern => 0000_0001
                                    // image file type is 3 (jpg,png,gif [bmp will be converted to jpg.])
                                    switch(true)
                                    {
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.jpg"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.jpg"; break; // for TBO series
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.JPG"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.JPG"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.jpeg"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.jpeg"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.JPEG"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.JPEG"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.png"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.png"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.PNG"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.PNG"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.gif"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.gif"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.GIF"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.GIF"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.bmp"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.bmp"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0001_100.BMP"): $inImg = "./tbwp4/files/".$fileUId."/0001_100.BMP"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.png"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.png"; break; // for TBT
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.PNG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.PNG"; break;	// for TBT
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPG"; break;	// for TBC
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpg"; break; // for TBC
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.jpeg"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.jpeg"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.JPEG"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.JPEG"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.gif"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.gif"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.GIF"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.GIF"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.bmp"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.bmp"; break;
                                        case file_exists("./tbwp4/files/".$fileUId."/0000_0001.BMP"): $inImg = "./tbwp4/files/".$fileUId."/0000_0001.BMP"; break;
                                        default: $inImg = ""; break;
                                    }
                                    if($inImg != "")
                                    {
                                        // it is sure that previous file,cache,thumbnail(both folder and image) has been deleted
                                        if(mkdir('./tbwp4/thumbnail/' . $fileUId,0777)) // creating a folder(name is the fileID) for thumbnail image inside thumbnail folder
                                        {
                                            if(chmod('./tbwp4/thumbnail/' . $fileUId,0777)) // giving permission to that folder
                                            {
                                                $outImg = './tbwp4/thumbnail/' . $fileUId."/thumbnailImg.jpg";
                                                $source = $inImg;
                                                $info = getimagesize($source);
                                                if ($info['mime'] == 'image/jpeg') 
                                                    $image = imagecreatefromjpeg($source);
                                                elseif ($info['mime'] == 'image/gif') 
                                                    $image = imagecreatefromgif($source);
                                                elseif ($info['mime'] == 'image/png') 
                                                    $image = imagecreatefrompng($source);
                                                elseif ($info['mime'] == 'image/bmp')
                                                    $image = imagecreatefrombmp($source);
                                                $outWidth = 320;
                                                $outHeight = 180;
                                                $sourceWidth = $info[0];
                                                $sourceHeight = $info[1];
                                                //Trying to maintain aspect ratio => width : height = 16 : 9 (for image)
                                                $ratioOfSource = $sourceWidth / $sourceHeight;  // getting the ratio of input image (width:height)
                                                $outWidth = $outHeight * $ratioOfSource;
                                                $image = imagescale($image,$outWidth,$outHeight);    // resizing the image into the dimension of 320*180
                                                $bool = imagejpeg($image,$outImg,25);   // compressing the file size by decreasing quality to 70 and saving to destination path
                                                $bool = imagedestroy($image);
                                            }
                                        }
                                        
                                    }
                                }
                            }

                            // creating the viewing period details and password details for all types of files and all combination of reuploaded files
                            switch(true)
                            {
                                case !isset($dividingResult):                                   // if file is mp4 then $dividingResult will not exist. this case is for that reason
                                    $dividingResult['viewingPeriod']['exist'] = false;
                                    $dividingResult['viewingPeriod']['startDay'] = "";
                                    $dividingResult['viewingPeriod']['endDay'] = "";
                                    $dividingResult['password'] = false;
                                    break;
                                case $dividingResult['viewing_period']['exist']:                // This case is for other file types if viewingPeriod exists. exist must be true here.
                                    $dividingResult['viewingPeriod']['exist'] = $dividingResult['viewing_period']['exist'];
                                    $dividingResult['viewingPeriod']['startDay'] = date("Y/m/d",strtotime($dividingResult['viewing_period']['start_day']));
                                    $dividingResult['viewingPeriod']['endDay'] = date("Y/m/d",strtotime($dividingResult['viewing_period']['end_day']));
                                    break;
                                default:                                                        // This case is for other file types if viewingPeriod does not exist.exist must be false here.
                                    $dividingResult['viewingPeriod']['exist'] = $dividingResult['viewing_period']['exist'];
                                    $dividingResult['viewingPeriod']['startDay'] = "";
                                    $dividingResult['viewingPeriod']['endDay'] = "";
                            }

                            //reuploading json logic

                            //previous file's size space is deleting from school.json & new file's size space is adding to school.json
                            $previousSize = $GLOBALS['fileJsonData'][$_POST['fileName']]['dataSize'];
                            $newSize = $_FILES['upload_file']['size']; // the file size is storing in bytes in json

                            // earasing previous size
                            $GLOBALS['schoolJsonData'][$channelName]['remainingSpace'] += $previousSize;
                            $GLOBALS['schoolJsonData'][$channelName]['usedSpace'] -= $previousSize;

                            //adding the new size
                            $GLOBALS['schoolJsonData'][$channelName]['remainingSpace'] -= $newSize;
                            $GLOBALS['schoolJsonData'][$channelName]['usedSpace'] += $newSize;
                            $jsonUpdatedData = json_encode($GLOBALS['schoolJsonData']);
                            file_put_contents('jsonFiles/school.json', $jsonUpdatedData);

                            // modify date update and new file size update on file.json of this file
                            if($fileType != $previousName[1])
                            {
                                // mismatch of datatype (if dataType is changed then index of file.json for this file is changing then other info is updating.)
                                $GLOBALS['fileJsonData'][$fileUId] = $GLOBALS['fileJsonData'][$_POST['fileName']];
                                unset($GLOBALS['fileJsonData'][$_POST['fileName']]);
                                $GLOBALS['fileJsonData'][$fileUId]['dataType'] = $fileType;
                            }
                            $GLOBALS['fileJsonData'][$fileUId]['modifyDate'] = date("Y-m-d H:i:s");
                            $GLOBALS['fileJsonData'][$fileUId]['dataSize'] = $newSize;
                            // changing the viewing period of reuploaded file
                            $GLOBALS['fileJsonData'][$fileUId]['viewingPeriod'] = $dividingResult['viewingPeriod'];
                            // changing the password of reuploaded file
                            $GLOBALS['fileJsonData'][$fileUId]['password'] = $dividingResult['password'];
                            $jsonUpdatedData = json_encode($GLOBALS['fileJsonData']);
                            file_put_contents('jsonFiles/file.json', $jsonUpdatedData);
                        }
                        $response = $languageJsonFile['spaDBManipulation_FileReupload_alert_success1'].$fileJsonData[$fileUId]['displayName'].$languageJsonFile['spaDBManipulation_FileReupload_alert_success2']; // i.e. 
                        echo ($response);
                    }
                    else
                    {
                        $response = $languageJsonFile['spaDBManipulation_FileReupload_alert_failed']; // i.e. Failed reuploading
                        echo ($response);
                    }
                }
                else
                {
                    $response = "This category does not exist now.Reuploading this content is not possible.This Category may be deleted by some other admin.Reloading the page to be syncronized with latest updates";
                    echo $response;
                }
                
            }
            else
            {
                $response = $languageJsonFile['spaDBManipulation_FileReupload_alert_alreadyDeleted']; // i.e. This file is aleady deleted
                echo ($response);
            }
            
            break;
        case "2": /// folder deletion cmd block
            require_once('./tbwp4/php/remove_directory.php');
            if(is_dir('contents/'.$_POST['folderPath'].'/'. $_POST['deleteFolder']))
            {
                // folder deletion cmd
                RemoveDirectory('contents/'.$_POST['folderPath'].'/'. $_POST['deleteFolder']);
                $parent = explode("/",$_POST['folderPath']);
                // folder deletion json calling
                folderDelete($_POST['deleteFolder'],$parent[count($parent)-1]);
                $response['msg'] = 'success';
                echo json_encode($response);
            }
            break;
        case "3": // folder creation cmd block
            $folderUId = uniqid(true);
            $displayName = $_POST["createFolder"];
            if(file_exists('./contents/'.$_POST['folderPath'])) // checking the target path for creating folder exists or not.
            {
                // creating the requested folder in the requested path
                $alreadyExists = false;
                foreach (glob('./contents/'.$_POST['folderPath'].'/*') as $existingDirectory) 
                {
                    if (is_dir($existingDirectory) && pathinfo($existingDirectory, PATHINFO_BASENAME) != "wastebin") 
                    {
                        $currentDisplayName = pathinfo($existingDirectory, PATHINFO_BASENAME);
                        if($folderJsonData[$currentDisplayName]['displayName'] == $displayName)
                        {
                            $alreadyExists = true;
                        }
                    }
                }
                if(!$alreadyExists)
                {
                    if(mkdir('./contents/'.$_POST['folderPath'].'/' . $folderUId, 0777,true))
                    {
                        chmod( './contents/'.$_POST['folderPath'].'/' . $folderUId, 0777 );
                        $parent = explode("/",$_POST['folderPath']);
                        folderCreate($folderUId,$displayName,$parent[count($parent)-1]);
                    }
                    $response['msg'] = $displayName.$languageJsonFile['spaDBManipulation_FolderCreate_alert_success']; // i.e. Category created successfully
                }
                else
                {
                    $response['msg'] =  $languageJsonFile['spaDBManipulation_FolderCreate_alert_Foldername_alreadyExits'];  // i.e. Sorry! couldn't create the Category because this given category name already exists in this Parent Category. Please give another name.
                }
            }
            else
            {
                // the requested path does not exist now.
                $response['msg'] =  $languageJsonFile['spaDBManipulation_FolderCreate_parent_category_notExists_notUploading']; // i.e. Your Parent Category does not exist now. So creating category in it is not possible
            }
            echo json_encode($response);
            break;
        case "4": // folder renaming cmd block
            if(file_exists("./contents/".$_POST['folderPath']."/".$_POST['folderId'])) // checking the folder exists or not which has been requested for renaming.
            {
                $alreadyExists = false;
                foreach (glob('./contents/'.$_POST['folderPath'].'/*') as $existingDirectory) 
                {
                    if (is_dir($existingDirectory) && pathinfo($existingDirectory, PATHINFO_BASENAME) != "wastebin") 
                    {
                        $currentDisplayName = pathinfo($existingDirectory, PATHINFO_BASENAME);
                        if($folderJsonData[$currentDisplayName]['displayName'] == $_POST['newDisplayName'])
                        {
                            $alreadyExists = true;
                        }
                    }
                }
                if(!$alreadyExists)
                {
                    $newDisplayName = $_POST['newDisplayName'];
                    $folderId = $_POST['folderId'];
                    folderUpdate($newDisplayName,$folderId);
                    $response['msg'] = $languageJsonFile['spaDBManipulation_FolderRename_alert_success'];  // i.e. Succesfully Renamed
                }
                else
                {
                    $response['msg'] = $languageJsonFile['spaDBManipulation_FolderRename_alert_Foldername_alreadyExits'];  // i.e. Your given new display name already exists. That's why didn't rename. Please give another Name 
                }
                
            }
            else
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_FolderRename_alert_Folder_notExits'];  // i.e.this folder does not exist here, that's why renaming this folder is not possible. Please reload this page to be synced with other admin. 
            }
            echo json_encode($response);
            break;
        case "6": // json logic for playCount for file
            if($fileJsonData[$_POST['fileName']]['active'] == 1)
            {
                $fileJsonData[$_POST['fileName']]['playCount']++;
                $jsonUpdateData = json_encode($fileJsonData);
                file_put_contents('jsonFiles/file.json', $jsonUpdateData);
                $response['msg'] = $languageJsonFile['spaDBManipulation_FileCount_alert_success'];  // i.e. successfully incremented the playCount
                echo json_encode($response);
            }
            else
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_FileCount_alert_FileDeleted'];  // i.e. This contents is already deleted.
                echo json_encode($response);
            }
            break;
        case "9": // folder list fetching for the [modal view change] for file moving from one folder to another [on admin, searchAdmin and recyclebin page]
            $foldersTable = [];
            foreach (glob('contents/'.$_POST['folderPath'].'/'.'*') as $folder)
            {
                if (is_dir($folder) && pathinfo($folder, PATHINFO_BASENAME) != "wastebin") 
                {
                    $tmp = [];
                    // $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
                    $tmp['name'] = pathinfo($folder, PATHINFO_BASENAME);
                    $tmp['path'] = realpath($folder);
                    $tmp['displayName'] = $folderJsonData[$tmp['name']]['displayName'];
                    $tmp['modifyDate'] = strtotime($folderJsonData[$tmp['name']]['modifyDate']);
                    $tmp['folderPath'] = $_POST['folderPath']."/".$tmp['name'];
                    $foldersTable['folder'][] = $tmp;
                }
                elseif(is_file($folder))
                {
                    if($fileJsonData[pathinfo($folder, PATHINFO_BASENAME)]['displayName'] === $fileJsonData[$_POST['contentName']]['displayName'])
                    {
                        $foldersTable['btnDisableMsg'] = $languageJsonFile['spaDBManipulation_FileMove_disableBtn_alert']; // i.e. You can't move this contents to this category because inside this category a file exists with the same contents name.To move this contents into this category, first rename this contents.
                        $foldersTable['btnDisable'] = true;
                    }
                    if(!isset($foldersTable['fileNameList']))
                    {
                        $foldersTable['fileNameList'] = array();
                        $foldersTable['fileNameList'][] = $fileJsonData[pathinfo($folder, PATHINFO_BASENAME)]['displayName'];
                    }
                    else
                        $foldersTable['fileNameList'][] = $fileJsonData[pathinfo($folder, PATHINFO_BASENAME)]['displayName'];
                }
            }
            if(!isset($foldersTable['folder']))
                $foldersTable['folder'] = array();
            if($_POST['folderPath'] == "")
                $_POST['folderPath'] = $channelName;
            else
                $folderPathArray = explode("/",$_POST['folderPath']);
            $breadCrumbUrl = array();
            $till = count($folderPathArray);
            $url = "";
            for($i = 0 ; $i < $till ; $i++)
            {
                $url = $url.$folderPathArray[$i];
                $breadCrumbUrl[$folderPathArray[$i]][] = $url; 
                $breadCrumbUrl[$folderPathArray[$i]][] = ($folderPathArray[$i] == $channelName)?"":$folderJsonData[$folderPathArray[$i]]['displayName'];
                $breadCrumbUrl[$folderPathArray[$i]][] = ($folderPathArray[$i] == $channelName)?$channelName:$folderPathArray[$i];
                if($i+1 < $till)
                {
                    $url = $url.("/");
                }
                else
                {
                    if($fileJsonData[$_POST['contentName']]['parent']==$folderPathArray[$i] && $fileJsonData[$_POST['contentName']]['active'] == 1) // cheking this folder is content's parent folder or not (checking only for those files whose are not deleted yet i.e. are not in wastebin folder.)
                    {
                        $foldersTable['btnDisable'] = true;
                        $foldersTable['btnDisableMsg'] = $languageJsonFile['spaDBManipulation_FileMove_disableBtn_alert2']; // i.e. This contents is already in this category.No need to move.
                        
                    }
                    else
                    { 
                        if(!isset($foldersTable['btnDisable']))
                            $foldersTable['btnDisable'] = false;
                    }
                }
            }
            // creating from directory path
            if(!isset($_POST['orderFrom']))
            {
                // if it is from admin or searchAdmin page
                $fromDirectoryPath = [];
                $parent = $fileJsonData[$_POST['contentName']]['parent'];
                while($parent != $channelName)
                {
                    $fromDirectoryPath[] = $parent;
                    $parent = $folderJsonData[$parent]['parent'];
                }
                $fromDirectoryPath[] = $parent;
                $fromDirectoryPath = array_reverse($fromDirectoryPath);
                if(count($fromDirectoryPath)>1)
                    $fromDirectory = implode("/",$fromDirectoryPath);
                else
                    $fromDirectory = $fromDirectoryPath[0];
            }
            else
            {
                // if it is from recyclebin page
                $fromDirectory = $channelName."/wastebin";
            }
            
            
            $foldersTable['breadCrumb'] = $breadCrumbUrl;
            $foldersTable['modalIdForFolderList'] = $_POST['modalIdForFolderList'];
            $foldersTable['modalIdForBreadcrumb'] = $_POST['modalIdForBreadcrumb'];
            $foldersTable['contentName'] = $_POST['contentName'];
            $foldersTable['fromDirectoryPath'] = $fromDirectory;
            echo json_encode($foldersTable);
            break;
        case "10": // file moving from one folder to another folder cmd block (on admin and searchAdmin Page)

            // Moving file from currently situated Directory to requested Directory
            if($fileJsonData[$_POST['contentName']]['active'] == 1 && file_exists('./contents/'.$_POST['fromDirectoryPath'].'/'.$_POST['contentName']))
            {
                $sourceFile = './contents/'.$_POST['fromDirectoryPath'].'/'.$_POST['contentName'];
                $destinationFile = './contents/'.$_POST['targetDirectoryPath'].'/'.$_POST['contentName'];
                $response['msg'] = "didn't move";
                if(rename($sourceFile,$destinationFile))	
                {
                    // file moving from one folder to another folder json block
                    if(fileMoveFromOneToAnother($_POST['contentName'],$_POST['fromDirectoryPath'],$_POST['targetDirectoryPath']))
                        $response['msg'] = $languageJsonFile['spaDBManipulation_FileMove_success_alert'];  // i.e. successfully moved from one folder to another
                    else
                        $response['msg'] = $languageJsonFile['spaDBManipulation_FileMove_success_alert2'];  // i.e. json updating problem
                }
                echo json_encode($response);
            }
            else
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_FileMove_success_alert3'];  // i.e. This file is already deleted
                echo json_encode($response);
            }
            break;
        case "13": // file moving from wastebin to another folder cmd block (on recyclebin.php Page)

            // Moving file from wastebin to requested Directory
            if(file_exists('./contents/'.$_POST['fromDirectoryPath'].'/'.$_POST['contentName']))
            {
                $sourceFile = './contents/'.$_POST['fromDirectoryPath'].'/'.$_POST['contentName'];
                $destinationFile = './contents/'.$_POST['targetDirectoryPath'].'/'.$_POST['contentName'];
                $response['msg'] = "didn't move";  // i.e. 
                if(rename($sourceFile,$destinationFile))	
                {
                    // file moving from wastebin to target folder json block
                    if(fileMoveFromWastebinToAnother($_POST['contentName'],$_POST['fromDirectoryPath'],$_POST['targetDirectoryPath']))
                        $response['msg'] = $languageJsonFile['spaDBManipulation_FileMove_success_alert']; // i.e. successfully moved from one folder to another
                    else
                        $response['msg'] = $languageJsonFile['spaDBManipulation_FileMove_success_alert2']; // i.e. json updating problem
                }
                echo json_encode($response);
            }
            else
            {
                $response['msg'] = $languageJsonFile['spaDBManipulation_FileMove_success_alert3']; // i.e. This contents is already deleted
                echo json_encode($response);
            }
            break;
    }
    
    // fileCreation json logic
    function fileCreate($fileUId,$displayName,$immidiateParent,$dataType,$dataSize,$viewingPeriod,$password)
    {
        // new object creation for file.json
        $createTime = date("Y-m-d H:i:s");
        $insert = array($fileUId=>array(
            "creationDate"=> $createTime,
            "modifyDate"=> $createTime,
            "parent" => $immidiateParent,
            "dataType" => $dataType,
            "dataSize" => $dataSize,    // dataSize is in Bytes
            "viewingPeriod" =>$viewingPeriod,
            "password" => $password,
            "playCount" => 0,
            "displayName" => $displayName,
            "active" =>1
        ));
            //append additional json to json file
        if(is_array($GLOBALS['fileJsonData']))
            $GLOBALS['fileJsonData'] = $GLOBALS['fileJsonData'] + $insert ;
        else
            $GLOBALS['fileJsonData'] = $insert;
        $jsonAppendData = json_encode($GLOBALS['fileJsonData']);
        file_put_contents('jsonFiles/file.json', $jsonAppendData);
    
        // current school(channel) object edition for school.json
        $GLOBALS['schoolJsonData'][$GLOBALS['channelName']]["fileCount"]++;
        $GLOBALS['schoolJsonData'][$GLOBALS['channelName']]['usedSpace'] += $dataSize;
        $GLOBALS['schoolJsonData'][$GLOBALS['channelName']]['remainingSpace'] -= $dataSize;
        $jsonUpdatedData = json_encode($GLOBALS['schoolJsonData']);
        file_put_contents('jsonFiles/school.json', $jsonUpdatedData);
    
        // current folder(category) object edition for folder.json
        if(isset($GLOBALS['folderJsonData'][$immidiateParent]))
        {
            $GLOBALS['folderJsonData'][$immidiateParent]["fileCount"]++;
            $GLOBALS['folderJsonData'][$immidiateParent]["modifyDate"] = $createTime;
        }
        
        // updating all super parent's modifyDate
        $parent = "";
        if(isset($GLOBALS['folderJsonData'][$immidiateParent]['parent']))
            $parent = $GLOBALS['folderJsonData'][$immidiateParent]['parent'];
        while($parent != "" && $parent != $GLOBALS['channelName'])
        {
            $GLOBALS['folderJsonData'][$parent]["modifyDate"] = $createTime;
            if(isset($GLOBALS['folderJsonData'][$parent]['parent']))
                $parent = $GLOBALS['folderJsonData'][$parent]['parent'];
            else
                $parent = "";
        }
        
        $jsonUpdatedData = json_encode($GLOBALS['folderJsonData']);
        file_put_contents('jsonFiles/folder.json', $jsonUpdatedData);
    }

    // permanently fileDeletion json logic
    function fileDelete($fileToDelete,$channelName)
    {
        // adding this file's size to remaining space & decreasing this file's size from usedSpace of it's channel
        $GLOBALS['schoolJsonData'][$channelName]['remainingSpace'] += $GLOBALS['fileJsonData'][$fileToDelete]['dataSize'];
        $GLOBALS['schoolJsonData'][$channelName]['usedSpace'] -= $GLOBALS['fileJsonData'][$fileToDelete]['dataSize'];
        $jsonUpdatedData = json_encode($GLOBALS['schoolJsonData']);
        file_put_contents('jsonFiles/school.json', $jsonUpdatedData);

        // delete object from file.json
        if(isset($GLOBALS['fileJsonData'][$fileToDelete]))
        {
            unset($GLOBALS['fileJsonData'][$fileToDelete]);
            $jsonDeleteData = json_encode($GLOBALS['fileJsonData']);
            file_put_contents('jsonFiles/file.json', $jsonDeleteData);
        }
        

        //delete object from recycleBin.json
        if(isset($GLOBALS['recycleJsonData'][$channelName][$fileToDelete]))
        {
            unset($GLOBALS['recycleJsonData'][$channelName][$fileToDelete]);
            $jsonDeleteData = json_encode($GLOBALS['recycleJsonData']);
            file_put_contents('jsonFiles/recycleBin.json', $jsonDeleteData);
        }

    }


    // file moving from one folder to another json logic
    function fileMoveFromOneToAnother($contentName,$previousDirectoryPath,$newDirectoryPath)
    {
        $modifiedTime = date("Y-m-d H:i:s");
        $previousParent = explode("/",$previousDirectoryPath);
        $previousParent = $previousParent[count($previousParent) - 1];

        $newParent = explode("/",$newDirectoryPath);
        $newParent = $newParent[count($newParent)-1];

        //changing the folder info (decrementing file count on previous folder and incrementing on current folder)
        if($previousParent != $GLOBALS['channelName'])
        {
            $GLOBALS['folderJsonData'][$previousParent]['fileCount']--;
            $GLOBALS['folderJsonData'][$previousParent]['modifyDate'] = $modifiedTime;
        }
        if($newParent != $GLOBALS['channelName'])
        {
            $GLOBALS['folderJsonData'][$newParent]['fileCount']++;
            $GLOBALS['folderJsonData'][$newParent]['modifyDate'] = $modifiedTime;
        }
        $jsonUpdatedData = json_encode($GLOBALS['folderJsonData']);
        file_put_contents('jsonFiles/folder.json', $jsonUpdatedData);

        // changing the file Info
        $GLOBALS['fileJsonData'][$contentName]['modifyDate'] = $modifiedTime;
        $GLOBALS['fileJsonData'][$contentName]['parent'] = $newParent;
        $jsonUpdatedData = json_encode($GLOBALS['fileJsonData']);
        file_put_contents('jsonFiles/file.json', $jsonUpdatedData);
        return true;
    }

    // file moving from wastebin to another json logicI(one kind of restoring)
    function fileMoveFromWastebinToAnother($contentName,$previousDirectoryPath,$newDirectoryPath)
    {
        global $fileJsonData,$recycleJsonData,$schoolJsonData,$folderJsonData,$channelName;
        $modifiedTime = date("Y-m-d H:i:s");
        $previousParent = explode("/",$previousDirectoryPath);
        $previousParent = $previousParent[count($previousParent) - 1];

        $newParent = explode("/",$newDirectoryPath);
        $newParent = $newParent[count($newParent)-1];

        // restoring the target file and updating file.json
        if(isset($GLOBALS['fileJsonData'][$contentName]))
        {
            $GLOBALS['fileJsonData'][$contentName]['active'] = 1;
            $GLOBALS['fileJsonData'][$contentName]['modifyDate'] = $modifiedTime;
            $GLOBALS['fileJsonData'][$contentName]['parent'] = $newParent;
            $jsonUpdatedData = json_encode($GLOBALS['fileJsonData']);
            file_put_contents('jsonFiles/file.json', $jsonUpdatedData);
        }

        // erasing the restore file data from recycleJsonData
        if(isset($recycleJsonData[$GLOBALS['channelName']][$contentName]))
        {
            unset($recycleJsonData[$GLOBALS['channelName']][$contentName]);
            $jsonDeleteData = json_encode($GLOBALS['recycleJsonData']);
            file_put_contents('jsonFiles/recycleBin.json', $jsonDeleteData);
        }

        //changing the fileCount of parent folder (incrementing file count on current folder)
        if($newParent != $GLOBALS['channelName'])
        {
            $GLOBALS['folderJsonData'][$newParent]['fileCount']++;
            $GLOBALS['folderJsonData'][$newParent]['modifyDate'] = $modifiedTime;
        }
        $jsonUpdatedData = json_encode($GLOBALS['folderJsonData']);
        file_put_contents('jsonFiles/folder.json', $jsonUpdatedData);


        // changing the fileCount of school Info
        if(isset($schoolJsonData[$channelName]))
        {
            $GLOBALS['schoolJsonData'][$GLOBALS['channelName']]['modifyDate'] = $modifiedTime;
            $GLOBALS['schoolJsonData'][$GLOBALS['channelName']]['fileCount']++; 
            $jsonUpdatedData = json_encode($GLOBALS['schoolJsonData']);
            file_put_contents('jsonFiles/school.json', $jsonUpdatedData);
        }
        return true;
    }

    // file restoring json logic
    function fileRestore($deleteFile,$channelName,$folderPath,$immidiateParent,$fileDisplayName)
    {
        global $fileJsonData,$recycleJsonData,$schoolJsonData,$folderJsonData,$languageJsonFile;
        $time = date("Y-m-d H:i:s");
        $response['msg'] = "Didn't restore";

        // restoring the target file and updating file.json
        if(isset($fileJsonData[$deleteFile]))
        {
            $fileJsonData[$deleteFile]['active'] = 1;
            $fileJsonData[$deleteFile]['displayName'] = $fileDisplayName;
            $fileJsonData[$deleteFile]['modifyDate'] = $time;
            $jsonUpdatedData = json_encode($fileJsonData);
            file_put_contents('jsonFiles/file.json', $jsonUpdatedData);
        }

        // erasing the restore file data from recycleJsonData
        if(isset($recycleJsonData[$channelName][$deleteFile]))
        {
            unset($recycleJsonData[$channelName][$deleteFile]);
            $jsonDeleteData = json_encode($GLOBALS['recycleJsonData']);
            file_put_contents('jsonFiles/recycleBin.json', $jsonDeleteData);
        }

        // updating fileCount info on school.json and folder.json
        if($immidiateParent == $channelName)
        {
            // incrementing filecount of school.json
            $schoolJsonData[$channelName]['fileCount']++;
            $schoolJsonData[$channelName]['modifyDate'] = $time;
            $jsonUpdatedData = json_encode($schoolJsonData);
            file_put_contents('jsonFiles/school.json', $jsonUpdatedData);
            $response['msg'] = $languageJsonFile['spaDBManipulation_FileRestore_success']; // i.e. successfully restored
        }
        else
        {
            // incrementing filecount of school.json
            $schoolJsonData[$channelName]['fileCount']++;
            $schoolJsonData[$channelName]['modifyDate'] = $time;
            $jsonUpdatedData = json_encode($schoolJsonData);
            file_put_contents('jsonFiles/school.json', $jsonUpdatedData);

            // incrementing filecount of folder.json
            $folderJsonData[$immidiateParent]['fileCount']++;
            $folderJsonData[$immidiateParent]['modifyDate'] = $time;
            $jsonUpdatedData = json_encode($folderJsonData);
            file_put_contents('jsonFiles/folder.json', $jsonUpdatedData);
            $response['msg'] = $languageJsonFile['spaDBManipulation_FileRestore_success']; // i.e. successfully restored
        }
        return $response;
    }

    // Trash file creation json logic
    function trashFileCreate($deleteFile,$channelName,$folderPath)
    {
        global $fileJsonData,$recycleJsonData,$schoolJsonData,$folderJsonData,$languageJsonFile;
        if(isset($fileJsonData[$deleteFile]))
        {
            // file hiding from file.json (active property will be 0)
            $fileJsonData[$deleteFile]['active'] = 0;
            $fileJsonData[$deleteFile]['modifyDate'] = date("Y-m-d H:i:s");
            $jsonUpdatedData = json_encode($fileJsonData);
            file_put_contents('jsonFiles/file.json', $jsonUpdatedData);

            // current school(channel) object edition for school.json
            $schoolJsonData[$channelName]["fileCount"]--;
            $jsonUpdatedData = json_encode($schoolJsonData);
            file_put_contents('jsonFiles/school.json', $jsonUpdatedData);	

            // creating new block on recycleBin.json
            $insertData = array();
            $insertData['folderPath'] = $folderPath;
            $tmp = explode("/",$folderPath);
            $len = count($tmp);
            $insertData['folderPathDisplayName'] = "";
            for($i = 0 ; $i < $len ; $i++ )
            {
                if($i != 0)
                    $insertData['folderPathDisplayName'] = $insertData['folderPathDisplayName'].$folderJsonData[$tmp[$i]]['displayName'];
                else
                    $insertData['folderPathDisplayName'] = $insertData['folderPathDisplayName'].$schoolJsonData[$tmp[$i]]['displayName'];
                if($i == $len - 1)
                {
                    $insertData['immidiateParent'] = $tmp[$i];
                    $insertData['immidiateParentDisplayName'] = ($i != 0)? $folderJsonData[$tmp[$i]]['displayName']:$schoolJsonData[$tmp[$i]]['displayName'];
                }
                else
                    $insertData['folderPathDisplayName'] = $insertData['folderPathDisplayName'].'/';
            }
            $insertData['displayName'] = $fileJsonData[$deleteFile]['displayName'];
            $insertData['playCount'] = $fileJsonData[$deleteFile]['playCount'];
            $insertData['size'] = $fileJsonData[$deleteFile]['dataSize'];
            $time = date("Y-m-d H:i:s");
            $insertData['createDate'] = $time;
            $insertData['modifyDate'] = $time;
            if(isset($recycleJsonData[$channelName]))
            {
                $recycleJsonData[$channelName][$deleteFile] = $insertData;
            }
            else
            {
                //$recycleJsonData = array();
                $recycleJsonData[$channelName][$deleteFile] = $insertData;
            }
            $jsonAppendData = json_encode($recycleJsonData,JSON_UNESCAPED_SLASHES);
            file_put_contents('jsonFiles/recycleBin.json', $jsonAppendData);

            // current folder(category) object edition for folder.json
            if(isset($folderJsonData[$insertData['immidiateParent']]["fileCount"])) /// if immidiate parent is not the root folder then change it. If it is root folder then no change.
            {
                $folderJsonData[$insertData['immidiateParent']]["fileCount"]--;
                $jsonUpdatedData = json_encode($folderJsonData);
                file_put_contents('jsonFiles/folder.json', $jsonUpdatedData);
            }

            $response['msg'] =  $languageJsonFile['spaDBManipulation_FileDeletion_success_alert'].$fileJsonData[$deleteFile]['displayName']. $languageJsonFile['spaDBManipulation_FileDeletion_success_alert2']; // i.e. successfully deleted the file
        }
        else
            $response['msg'] =  $languageJsonFile['spaDBManipulation_FileDeletion_success_alert3']; // i.e. This File was deleted before.
        return $response;
    }

    // folder deletion json logic
    function folderDelete($targetFolderUid,$parentDirectory)
    {
        // Deleting the target object from folder.json
        unset($GLOBALS['folderJsonData'][$targetFolderUid]);
        // updating parentDirectory info
        if(isset($GLOBALS['folderJsonData'][$parentDirectory]))
        {
            $GLOBALS['folderJsonData'][$parentDirectory]['folderCount']--;
            $GLOBALS['folderJsonData'][$parentDirectory]['modifyDate'] = date("Y-m-d H:i:s");
        }
        $folderDeleteData = json_encode($GLOBALS['folderJsonData']);
        file_put_contents('jsonFiles/folder.json', $folderDeleteData);

        // current school(channel) object edition for school.json
        $GLOBALS['schoolJsonData'][$GLOBALS['channelName']]["folderCount"]--;
        $jsonUpdatedData = json_encode($GLOBALS['schoolJsonData']);
        file_put_contents('jsonFiles/school.json', $jsonUpdatedData);
    }

    //folder creation json logic
    function folderCreate($folderUId,$displayName,$parentDirectory)
    {
        // initializing the global variables
        global $channelName,$folderJsonData,$schoolJsonData;
        // new object creation for folder.json
        $createTime = date("Y-m-d H:i:s");
        $insert = array($folderUId=>array(
            "creationDate"=>$createTime,
            "modifyDate"=> $createTime,
            "fileCount" => 0,
            "folderCount"=>0,
            "parent" => $parentDirectory,
            "displayName" => $displayName
        ));

        // edit parentDirectory folderCount             /*May be one of the mysterious bug. Have to check parent category is root or not. if it is root then have to update in schoolJSON file otherwise folder.json file */
        if(isset($folderJsonData[$parentDirectory]))
        {
            $folderJsonData[$parentDirectory]['folderCount']++;
            $folderJsonData[$parentDirectory]['modifyDate'] = $createTime;
        }

        //append created object to folder.json
        if(is_array($folderJsonData))
            $folderJsonData = $folderJsonData + $insert ;
        else
            $folderJsonData = $insert;
        $jsonAppendData = json_encode($folderJsonData);
        file_put_contents('jsonFiles/folder.json', $jsonAppendData);

        // current school(channel) object edition for school.json
        $schoolJsonData[$channelName]["folderCount"]++;
        $jsonUpdatedData = json_encode($schoolJsonData);
        file_put_contents('jsonFiles/school.json', $jsonUpdatedData);
    }

    //folder updating json logic
    function folderUpdate($editedFolderName,$uidOfFolderName)
    {
        $newModificationDate = date("Y-m-d H:i:s");

        // updating given folder info (child info)
        $GLOBALS['folderJsonData'][$uidOfFolderName]['displayName'] = $editedFolderName;
        $GLOBALS['folderJsonData'][$uidOfFolderName]['modifyDate'] = $newModificationDate;

        // updating parent folder info (parent info)
        if(isset($GLOBALS['folderJsonData'][$uidOfFolderName]['parent']))
        {
            $GLOBALS['folderJsonData'][$GLOBALS['folderJsonData'][$uidOfFolderName]['parent']]['modifyDate'] = $newModificationDate;
        }

        $jsonUpdatedData = json_encode($GLOBALS['folderJsonData']);
        file_put_contents('jsonFiles/folder.json', $jsonUpdatedData);
    }

    
?>