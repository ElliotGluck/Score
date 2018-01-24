<?php
session_start();

if (!isset($_SESSION["masterGradesVar"])) {
      if(filter_var($_POST["userid"], FILTER_VALIDATE_EMAIL)) {
        $userid = strstr($_POST["userid"], '@', true);
    }
    else {
        $userid = $_POST["userid"];
    }
  $postData = array(
    'userid' => $userid, //replaced with user id
    'password' => $_POST["password"], //repalced with user pw
    'semester' => 1 //change on new semester
);
$ch = curl_init('https://385.elliotgluck.com/grades');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $postData
));


// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
    die("There was an error connecting to the Synergy API. Please try again in a few minutes.");
}

// Decode the response
$_SESSION["masterGradesVar"] = json_decode($response, TRUE);

if (count($_SESSION["masterGradesVar"]["course"]) == 0) {
  session_destroy();
  die("Login is invalid. Redirecting in 5 seconds...");
  sleep("5");
header('Location: ../index.html');
}
  if (count($_SESSION["masterGradesVar"]["course"]) !== 7) {
  session_destroy();
  die("Score only works for high school students with standard, 7 period schedules. We are working to support more/less classes in the future.");
}
}

// apply indexonly below

$gradeList = array(
  0 => $_SESSION["masterGradesVar"]["course"][0]["grade"],
  1 => $_SESSION["masterGradesVar"]["course"][1]["grade"],
  2 => $_SESSION["masterGradesVar"]["course"][2]["grade"],
  3 => $_SESSION["masterGradesVar"]["course"][3]["grade"],
  4 => $_SESSION["masterGradesVar"]["course"][4]["grade"],
  5 => $_SESSION["masterGradesVar"]["course"][5]["grade"],
  6 => $_SESSION["masterGradesVar"]["course"][6]["grade"]
);

$bestClass = max($gradeList);
$worstClass = min($gradeList);
$bestClassKey = array_search($bestClass, $gradeList);
$worstClassKey = array_search($worstClass, $gradeList);

if ($bestClassKey == 0) {
  $bestClassFig = "first";
} elseif ($bestClassKey == 1) {
  $bestClassFig = "second";
} elseif ($bestClassKey == 2) {
  $bestClassFig = "third";
} elseif ($bestClassKey == 3) {
  $bestClassFig = "fourth";
} elseif ($bestClassKey == 4) {
  $bestClassFig = "fifth";
} elseif ($bestClassKey == 5) {
  $bestClassFig = "sixth";
} elseif ($bestClassKey == 6) {
  $bestClassFig = "seventh";
}
if ($worstClassKey == 0) {
  $worstClassFig = "first";
} elseif ($worstClassKey == 1) {
  $worstClassFig = "second";
} elseif ($worstClassKey == 2) {
  $worstClassFig = "third";
} elseif ($worstClassKey == 3) {
  $worstClassFig = "fourth";
} elseif ($worstClassKey == 4) {
  $worstClassFig = "fifth";
} elseif ($worstClassKey == 5) {
  $worstClassFig = "sixth";
} elseif ($worstClassKey == 6) {
  $worstClassFig = "seventh";
}

// GPA Calculation

// colors based on grade score per class
// first period
if ($_SESSION["masterGradesVar"]["course"][0]["grade"] >= 90) {
  $firstClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][0]["grade"] < 90) {
  $firstClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][0]["grade"] < 80) {
  $firstClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][0]["grade"] < 70) {
  $firstClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] < 60) {
  $firstClassGPA = 0;
}
// second period
if ($_SESSION["masterGradesVar"]["course"][1]["grade"] >= 90) {
  $secondClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][1]["grade"] < 90) {
  $secondClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][1]["grade"] < 80) {
  $secondClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][1]["grade"] < 70) {
  $secondClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] < 60) {
  $secondClassGPA = 0;
}
// third period
if ($_SESSION["masterGradesVar"]["course"][2]["grade"] >= 90) {
  $thirdClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][2]["grade"] < 90) {
  $thirdClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][2]["grade"] < 80) {
  $thirdClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][2]["grade"] < 70) {
  $thirdClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] < 60) {
  $thirdClassGPA = 0;
}
// fourth period
if ($_SESSION["masterGradesVar"]["course"][3]["grade"] >= 90) {
  $fourthClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][3]["grade"] < 90) {
  $fourthClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][3]["grade"] < 80) {
  $fourthClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][3]["grade"] < 70) {
  $fourthClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] < 60) {
  $fourthClassGPA = 0;
}
// fifth period
if ($_SESSION["masterGradesVar"]["course"][4]["grade"] >= 90) {
  $fifthClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][4]["grade"] < 90) {
  $fifthClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][4]["grade"] < 80) {
  $fifthClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][4]["grade"] < 70) {
  $fifthClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] < 60) {
  $fifthClassGPA = 0;
}
  // sixth period
if ($_SESSION["masterGradesVar"]["course"][5]["grade"] >= 90) {
  $sixthClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][5]["grade"] < 90) {
  $sixthClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][5]["grade"] < 80) {
  $sixthClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][5]["grade"] < 70) {
  $sixthClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] < 60) {
  $sixthClassGPA = 0;
}
  // seventh period
if ($_SESSION["masterGradesVar"]["course"][6]["grade"] >= 90) {
  $seventhClassGPA = 4;
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][6]["grade"] < 90) {
  $seventhClassGPA = 3;
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][6]["grade"] < 80) {
  $seventhClassGPA = 2;
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] >=60 && $_SESSION["masterGradesVar"]["course"][6]["grade"] < 70) {
  $seventhClassGPA = 1;
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] < 60) {
  $seventhClassGPA = 0;
}

// GPA Array
$GPAarray = array($firstClassGPA, $secondClassGPA, $thirdClassGPA, $fourthClassGPA, $fifthClassGPA, $sixthClassGPA, $seventhClassGPA);

// GPA Average
$averageGPA = array_sum($GPAarray) / count($GPAarray);
 $GPAformated = number_format ($averageGPA, 1);

// color by gpa
if ($GPAformated >= 3.5) {
  $GPAColor = "green";
} elseif ($GPAformated >= 3.0 && $GPAformated < 3.5) {
  $GPAColor = "yellow";
} elseif ($GPAformated >= 2.5 && $GPAformated < 3.0) {
  $GPAColor = "orange";
} elseif ($GPAformated < 2.5) {
  $GPAColor = "red";
}
// apply global below

// colors based on grade score per class
// first period
if ($_SESSION["masterGradesVar"]["course"][0]["grade"] >= 90) {
  $firstClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][0]["grade"] < 90) {
  $firstClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][0]["grade"] < 80) {
  $firstClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][0]["grade"] < 70) {
  $firstClassGradeColor = "red";
}
// second period
if ($_SESSION["masterGradesVar"]["course"][1]["grade"] >= 90) {
  $secondClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][1]["grade"] < 90) {
  $secondClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][1]["grade"] < 80) {
  $secondClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][1]["grade"] < 70) {
  $secondClassGradeColor = "red";
}
// third period
if ($_SESSION["masterGradesVar"]["course"][2]["grade"] >= 90) {
  $thirdClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][2]["grade"] < 90) {
  $thirdClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][2]["grade"] < 80) {
  $thirdClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][2]["grade"] < 70) {
  $thirdClassGradeColor = "red";
}
// fourth period
if ($_SESSION["masterGradesVar"]["course"][3]["grade"] >= 90) {
  $fourthClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][3]["grade"] < 90) {
  $fourthClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][3]["grade"] < 80) {
  $fourthClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][3]["grade"] < 70) {
  $fourthClassGradeColor = "red";
}
// fifth period
if ($_SESSION["masterGradesVar"]["course"][4]["grade"] >= 90) {
  $fifthClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][4]["grade"] < 90) {
  $fifthClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][4]["grade"] < 80) {
  $fifthClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][4]["grade"] < 70) {
  $fifthClassGradeColor = "red";
}
  // sixth period
if ($_SESSION["masterGradesVar"]["course"][5]["grade"] >= 90) {
  $sixthClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][5]["grade"] < 90) {
  $sixthClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][5]["grade"] < 80) {
  $sixthClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][5]["grade"] < 70) {
  $sixthClassGradeColor = "red";
}
  // seventh period
if ($_SESSION["masterGradesVar"]["course"][6]["grade"] >= 90) {
  $seventhClassGradeColor = "green";
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] >=80 && $_SESSION["masterGradesVar"]["course"][6]["grade"] < 90) {
  $seventhClassGradeColor = "yellow";
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] >=70 && $_SESSION["masterGradesVar"]["course"][6]["grade"] < 80) {
  $seventhClassGradeColor = "orange";
} elseif ($_SESSION["masterGradesVar"]["course"][6]["grade"] < 70) {
  $seventhClassGradeColor = "red";
}
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Jan 22 2018 19:37:59 GMT+0000 (UTC)  -->
<html data-wf-page="5a626c88e1788700018e6c6d" data-wf-site="5a626c88e1788700018e6c6c">
<head>
  <script>
  if (location.protocol != 'https:')
{
 location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
}
  </script>
  <meta charset="utf-8">
  <title>Overview - Score</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/score-dashboard.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Roboto:100,300,regular,500,700,900"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
<link rel="manifest" href="/favicons/manifest.json">
<link rel="shortcut icon" href="/favicons/favicon.ico">
<meta name="msapplication-config" content="/favicons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
</head>
<body class="body-2">
  <div class="top-bar">
    <div class="header w-container">
      <div class="w-row">
        <div class="column-6 w-col w-col-2" data-ix="column-1-header">
          <h1 class="heading">Score</h1>
          <div class="text-block">For BSD</div>
        </div>
        <div class="w-hidden-small w-hidden-tiny w-col w-col-2" data-ix="column-2-header">
          <a href="index.php" class="link-block w-inline-block">
            <div class="text-block-2">Dashboard</div>
          </a>
        </div>
        <div class="w-hidden-small w-hidden-tiny w-col w-col-2" data-ix="column-3-header">
          <a href="about.php" class="link-block w-inline-block">
            <div class="text-block-2">About</div>
          </a>
        </div>
        <div class="w-hidden-small w-hidden-tiny w-col w-col-2" data-ix="column-4-header">
          <a href="#" class="link-block w-inline-block">
            <div class="text-block-2">Contact</div>
          </a>
        </div>
        <div class="w-hidden-small w-hidden-tiny w-col w-col-2" data-ix="column-5-header">
          <a href="../privacy.html" class="link-block w-inline-block">
            <div class="text-block-2">Privacy</div>
          </a>
        </div>
        <div class="column w-hidden-small w-hidden-tiny w-col w-col-2" data-ix="column-6-header">
          <a href="logout.php" class="link-block w-inline-block">
            <div class="text-block-2">Log out</div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="body w-clearfix">
    <div class="div-block" data-ix="sidebar-load"><a href="#" class="link-block-2 w-inline-block"></a>
      <div class="row-2 w-row">
        <div class="column-7 w-col w-col-9 w-col-small-9 w-col-tiny-tiny-stack">
          <a href="#" class="link-block-8 w-inline-block">
            <div class="overview-link w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="overview-load">Overview</div>
          </a>
          <a href="first.php" class="class-side-bar w-inline-block w-clearfix">
            <div class="firstperiodtext" data-ix="class-1-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][0]["name"]); ?></div>
          </a>
          <a href="second.php" class="class-side-bar secondperiodlink w-inline-block w-clearfix">
            <div class="secondperiodtext" data-ix="class-2-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][1]["name"]); ?></div>
          </a>
          <a href="third.php" class="class-side-bar thirdperiodlink w-inline-block w-clearfix">
            <div class="thirdperiodtext" data-ix="class-3-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][2]["name"]); ?></div>
          </a>
          <a href="fourth.php" class="class-side-bar fourthperiodlink w-inline-block w-clearfix">
            <div class="fourthperiodtext" data-ix="class-4-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][3]["name"]); ?></div>
          </a>
          <a href="fifth.php" class="class-side-bar fifthperiodlink w-inline-block w-clearfix">
            <div class="fifthperiodtext" data-ix="class-5-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][4]["name"]); ?></div>
          </a>
          <a href="sixth.php" class="class-side-bar sixthperiodlink w-inline-block w-clearfix">
            <div class="sixthperiodtext" data-ix="class-6-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][5]["name"]); ?></div>
          </a>
          <a href="seventh.php" class="class-side-bar w-inline-block w-clearfix">
            <div class="seventhperiodtext" data-ix="class-7-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][6]["name"]); ?></div>
          </a>
        </div>
        <div class="column-8 w-hidden-tiny w-clearfix w-col w-col-3 w-col-small-3 w-col-tiny-tiny-stack">
          <div class="text-block-7 gpa-title w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="overview-load">GPA</div>
          <a href="#" class="link-block-3 firstperiodlink w-inline-block">
            <div class="firstperiodgrade <?php echo $firstClassGradeColor; ?>" data-ix="class-1-load">(<?php echo $_SESSION["masterGradesVar"]["course"][0]["grade"]; ?>%)</div>
          </a>
          <a href="#" class="link-block-3 secondperiodlink w-inline-block">
            <div class="secondperiodgrade <?php echo $secondClassGradeColor; ?>" data-ix="class-2-load">(<?php echo $_SESSION["masterGradesVar"]["course"][1]["grade"]; ?>%)</div>
          </a>
          <a href="#" class="link-block-3 thirdperiodlink w-inline-block">
            <div class="thirdperiodgrade <?php echo $thirdClassGradeColor; ?>" data-ix="class-3-load">(<?php echo $_SESSION["masterGradesVar"]["course"][2]["grade"]; ?>%)</div>
          </a>
          <a href="#" class="link-block-3 w-inline-block">
            <div class="fourthperiodgrade <?php echo $fourthClassGradeColor; ?>" data-ix="class-4-load">(<?php echo $_SESSION["masterGradesVar"]["course"][3]["grade"]; ?>%)</div>
          </a>
          <a href="#" class="link-block-3 fifthperiodlink w-inline-block">
            <div class="fifthperiodgrade <?php echo $fifthClassGradeColor; ?>" data-ix="class-5-load">(<?php echo $_SESSION["masterGradesVar"]["course"][4]["grade"]; ?>%)</div>
          </a>
          <a href="#" class="link-block-3 sixthperiodlink w-inline-block">
            <div class="sixthperiodgrade <?php echo $sixthClassGradeColor; ?>" data-ix="class-6-load">(<?php echo $_SESSION["masterGradesVar"]["course"][5]["grade"]; ?>%)</div>
          </a>
          <a href="#" class="link-block-3 seventhperiodlink w-inline-block">
            <div class="seventhperiodgrade <?php echo $seventhClassGradeColor; ?>" data-ix="class-7-load">(<?php echo $_SESSION["masterGradesVar"]["course"][6]["grade"]; ?>%)</div>
          </a>
        </div>
      </div><a href="#" class="link-block-4 w-inline-block"></a><a href="#" class="link-block-4 w-inline-block"></a><a href="#" class="link-block-4 w-inline-block"></a><a href="#" class="link-block-4 w-inline-block"></a><a href="#" class="link-block-4 w-inline-block"></a><a href="#" class="link-block-4 w-inline-block"></a><a href="#" class="link-block-4 w-inline-block"></a></div>
    <div class="div-block-2 w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="main-div-load">
      <div class="overviewtitle">Overview</div>
      <div class="row w-row">
        <div class="column-4 w-col w-col-5">
          <div class="gpatitle" data-ix="gpa-title-load">Your GPA is</div>
          <div class="gpatext <?php echo $GPAColor; ?>" data-ix="gpa-load"><?php echo $GPAformated; ?></div>
          <div class="text-block-8" data-ix="gpa-load">(unweighted, current semester only)</div><a href="https://twitter.com/home?status=My%20GPA%20is%20<?php echo $GPAformated; ?>!%20Find%20your%20GPA%20with%20Score.%20www.bsdscore.com" class="sharelink" data-ix="gpa-load">Share GPA on Twitter</a>
          <a href="<?php echo $bestClassFig; ?>.php" class="bestclasslink w-inline-block">
            <div class="bestclasstitle" data-ix="best-class">Your best class:</div>
            <div class="bestclasstext" data-ix="best-class"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$bestClassKey]["name"]); ?> (<?php echo $bestClass;?>%)</div>
          </a>
          <a href="<?php echo $worstClassFig; ?>.php" class="worstclasslink w-inline-block">
            <div class="worstclasstitle" data-ix="worst-class">Needs some work:</div>
            <div class="worstclasstext" data-ix="worst-class"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$worstClassKey]["name"]); ?> (<?php echo $worstClass;?>%)</div>
          </a>
        </div>
        <div class="column-5 w-col w-col-7">
          <div class="recenttitle" data-ix="gpa-load">Recent Updates</div>
          <div class="w-row" data-ix="best-class">
            <div class="">
              <div class="overviewassignment mostrecent">1) <?php echo substr($_SESSION["masterGradesVar"]["course"][0]["assignments"][0]["name"],0,32); ?></div>
              <div class="overviewassignment secondrecent">2) <?php echo substr($_SESSION["masterGradesVar"]["course"][1]["assignments"][0]["name"],0,32); ?></div>
              <div class="overviewassignment thirdrecent">3) <?php echo substr($_SESSION["masterGradesVar"]["course"][2]["assignments"][0]["name"],0,32); ?></div>
              <div class="overviewassignment fourthrecent">4) <?php echo substr($_SESSION["masterGradesVar"]["course"][3]["assignments"][0]["name"],0,32); ?></div>
              <div class="overviewassignment fifthrecent">5) <?php echo substr($_SESSION["masterGradesVar"]["course"][4]["assignments"][0]["name"],0,32); ?></div>
              <div class="overviewassignment sixthrecent">6) <?php echo substr($_SESSION["masterGradesVar"]["course"][5]["assignments"][0]["name"],0,32); ?></div>
              <div class="overviewassignment seventhrecent">7) <?php echo substr($_SESSION["masterGradesVar"]["course"][6]["assignments"][0]["name"],0,32); ?></div>
            </div>
          </div>
          <div class="html-embed w-embed" data-ix="worst-class"><iframe height="100%" width="100%" frameBorder="0" src="https://syndication.elliotgluck.com/network/score.php"></iframe></div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer" data-ix="footer-load">Designed by Elliot Gluck<br>Built by Practical Devs<br>Not affiliated with the Bellevue School District or Edupoint</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
