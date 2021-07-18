<?php
    $adminBrowserDetailsForEachType = ["publicIp"=>array(),"count"=>0];
    $adminBrowserDetails = [];
    $browsersList = ["edge","newEdge","chrome","ie","firefox","safari","other"];
    $odList = ["ios_ipod","ios_iphone","ios_ipad","android_smartphone","android_tablet","mac_pc","windows_pc","linux_pc","other"];
    for($i = 0;$i < 7;$i++)
    {
        for($j = 0 ; $j < 9 ; $j++)
        {
            $key = $browsersList[$i]."-".$odList[$j];
            $adminBrowserDetails[$key] = $adminBrowserDetailsForEachType;
        }
    }

    //var_dump($adminBrowserDetails);
    $before = "A1 5,B.c'C｡Dは2ｧ";
    echo "before => ".$before."<br>";
    $after = mb_convert_kana($before, "RNASKH");
    echo "after => ".$after."<br>";
    $after = mb_strtolower($before);
    echo "after => ".$after."<br>";
    echo $_SERVER['HTTP_HOST']."<br>";
    echo $_SERVER['REQUEST_URI']."<br>";
    //loading infromations of all folders
    echo php_uname('s')."<br>";
    if(php_uname('s') == 'Linux') 
    { 	
        $os = php_uname('s');
    } // Linux
    elseif(substr_count(php_uname('s'),"Windows"))
    { 
        $os = "Windows";
    }
    else
    {
        $os = "Mac";
    }
    echo $os."<br>";
	$data_results = file_get_contents('jsonFiles/folder.json');
	$folderJsonData = json_decode($data_results,true);
	//loading infromations of all files
	$data_results = file_get_contents('jsonFiles/file.json');
    $fileJsonData = json_decode($data_results,true);
    
    //loading infromations of trash files
	$data_results = file_get_contents('jsonFiles/recycleBin.json');
    $recycleJsonData = json_decode($data_results,true);
    
	//loading infromations of all schools
	$data_results = file_get_contents('jsonFiles/school.json');
    $schoolJsonData = json_decode($data_results,true);
    $_SESSION['result'] = -1;
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $_SESSION['result'] =  $_POST['x']*1024;
    }
   $mal = ("$_SERVER[REQUEST_URI]");
   $mal = explode("&",$mal);
   var_dump($mal);
   function removeLn($value,$key)
    {
        global $mal;
        if(strpos($value,"ln=") !== false)
            unset($mal[$key]);
    }
    array_walk($mal,"removeLn");
   var_dump($mal);
   $mal = implode("&",$mal);
   echo $mal."<br>";
   $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
   if(isset($_SERVER['HTTP_CLIENT_IP']))
   {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
   }
   elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
   {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   else 
   {
        $ip = $_SERVER['REMOTE_ADDR'];
   }
   echo $ip."<br/>";
   $privateIP = getHostByName($_SERVER['REMOTE_ADDR']); 
    
    // Displaying the address  
    echo $privateIP."<br/>"; 
   $a = 2;
?>
<html>
    <head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    </head>
    <body>
        <a href="https://www.google.com" class = "a"  data-at = "1">mairala</a>
        <a href="https://www.google.com" class = "a"  data-at = "2">mairala</a>
        <a href="https://www.google.com" class = "a"  data-at = "3">mairala</a>
        <form action="xp.php" method="POST">
            <input type = "text" name="x">x
            <input type = "text" readonly name="result" value = <?=$_SESSION['result'];?>>fileSize
            <input type="submit">calculate
        </form>
        <a href="#"><?php $x = 7; $y=2; echo ($x/$y);?></a>
        <table>  
            <tr  data-toggle="toggle">  
                <td >  
                    <p id="Technology" >  
                        <b>  
                            <span class="plusminusTechnology">+</span>    
                            <span lang="EN-IN">Technology </span>  
                        </b>  
                    </p>  
                </td>  
                <td ></td>  
                <td ></td>  
                <td></td>
            </tr>  
            <tbody class="hideTr">  
                <tr >  
                    <td ></td>  
                    <td >  
                        picture 
                    </td>  
                    <td>   	  
                        <span lang="EN-IN">4</span>  
                    </td>  
                    <td > 	                         
                    </td>  
                </tr>  
            </tbody>  
        </table>  

        <table>
            <tr>
                <th>browser</th>
                <th>OD</th>
                <th>ip</th>
                <th>count</th>
                <th>clear</th>
            </tr>
            <?php $i = 0;
                foreach($adminBrowserDetails as $browser=>$details):
                    $browser = explode("-",$browser);
                    $OD = $browser[1];
                    $browser = $browser[0];
                    $rowspan = ($i % 9 == 0)?'rowspan="9"':'';
                    $i++;?>
                    <?php if($rowspan != ""):?>
                        <tr >
                            <td <?=$rowspan;?> class="header">
                                <?=$browser;?>
                            </td>
                            <td><?=$OD;?></td>
                            <td>
                                <?php 
                                    foreach($details['publicIp'] as $key => $value):
                                        if($key+1 != count($details['publicIp'])):
                                            echo $value."<br>";
                                        else:
                                            echo $value;
                                        endif;
                                    endforeach;
                                ?>
                            </td>
                            <td><?=$details['count']?></td>
                            <td><button type = "button" class="browserReset" id="<?php echo $browser."-".$OD;?>">リセット</button></td>
                        </tr>
                    <?php else:?>
                        <tr>
                            <td><?=$OD;?></td>
                            <td>
                                <?php 
                                    foreach($details['publicIp'] as $key => $value):
                                        if($key+1 != count($details['publicIp'])):
                                            echo $value."<br>";
                                        else:
                                            echo $value;
                                        endif;
                                    endforeach;
                                ?>
                            </td>
                            <td><?=$details['count']?></td>
                            <td><button type = "button" class="browserReset" id="<?php echo $browser."-".$OD;?>">リセット</button></td>
                        </tr>
                    <?php endif;?>
                <?php endforeach;?>
        </table>
        
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    
    function f()
    {
        alert("hoise?");
    }
    $(document).ready(function() {
        $('.a').click(function(e) {
            console.log(this);
            console.log($(this).data('at'));
            console.log(e); 
            console.log($(e.target).data('at'));
            if($(e.target).data('at') == "1")
                e.preventDefault(); 
        });
    });
    /*$(document).ready(function () {  
	        //debugger;  
	        $('.hideTr').slideUp();  
	     $('[data-toggle="toggle"]').click(function () {  
	        if ($(this).parents().next(".hideTr").is(':visible')) {  
	            $(this).parents().next('.hideTr').slideUp(10);  
	            $(".plusminus" + $(this).children().children().attr("id")).text('+');  
	           $(this).css('background-color', 'white');  
	            }  
	        else {  
	            $(this).parents().next('.hideTr').slideDown(10);  
	            $(".plusminus" + $(this).children().children().attr("id")).text('- ');  
	           $(this).css('background-color', '#c1eaff ');    
	        }  
	    });  
	    });  */
        $('.header').click(function(){
            //$(this).removeAttr("rowspan");
            $(this).nextUntil('td.header').slideToggle(10);
        });
    // function mairalaF()
    // {
    //     alert("nai");
    //     // document.getElementById("a").removeAttribute("onclick");
    //     // document.getElementById("a").setAttribute("onclick","return false;");
    //     alert("changed");
    // }
</script>