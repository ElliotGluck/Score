<?php
session_start();

if (!isset($_SESSION["masterGradesVar"])) { 
  die("You are not logged in.");
}
// remember, the class number = PERIOD - 1 you dumbass
$currentClass = 2;
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

// check for missing assignments
$missingAssignments = array_column($_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"], "notes");
$numberAssignmentsMissing = array_keys($missingAssignments, "Missing (zero) ");

?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Jan 22 2018 19:37:59 GMT+0000 (UTC)  -->
<html data-wf-page="5a65a799a6d4b0000109c61e" data-wf-site="5a626c88e1788700018e6c6c">
<head>
    <script>
  if (location.protocol != 'https:')
{
 location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
}
  </script>
  <meta charset="utf-8">
  <title><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["name"]); ?> - Score</title>
  <meta content="Third Period - Score" property="og:title">
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
    <div class="class-sidebar w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="sidebar-load"><a href="#" class="link-block-2 w-inline-block"></a>
      <div class="row-2 w-row">
        <div class="column-7 w-col w-col-9 w-col-small-9 w-col-tiny-tiny-stack">
          <a href="index.php" class="link-block-8 w-inline-block">
            <div class="overview-link-unselected w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="overview-load">Overview</div>
          </a>
          <a href="first.php" class="class-side-bar w-inline-block w-clearfix">
            <div class="firstperiodtext" data-ix="class-1-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][0]["name"]); ?></div>
          </a>
          <a href="second.php" class="class-side-bar secondperiodlink w-inline-block w-clearfix">
            <div class="secondperiodtext" data-ix="class-2-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][1]["name"]); ?></div>
          </a>
          <a href="#" class="class-side-bar thirdperiodlink w-inline-block w-clearfix">
            <div class="thirdperiodtext selected" data-ix="class-3-load"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][2]["name"]); ?></div>
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
    <div class="class-block" data-ix="main-div-load"><a href="index.php" class="button w-hidden-main w-button">Back</a>
      <div class="classpagetitle"><?php echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["name"]); ?></div>
      <div class="row w-row">
        <div class="column-4 w-col w-col-5">
          <div class="gpatitle" data-ix="gpa-title-load">Your Grade is</div>
          <div class="classgrade <?php echo $thirdClassGradeColor; ?>" data-ix="gpa-load"><?php echo $_SESSION["masterGradesVar"]["course"][$currentClass]["grade"]; ?>%</div>
       <?php if (sizeof($numberAssignmentsMissing) != 0) { echo '
          <div class="missingassignmentsblock">
            <div class="missingassignmentstitle" data-ix="worst-class">Missing Assignments:</div>
            <div class="text-block-11" data-ix="worst-class">You have '; echo sizeof($numberAssignmentsMissing); echo ' missing assignments in ';echo preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["name"]); echo '. Missing assignments are very damaging to your GPA. Try asking your teacher if you can make any of these up. It can go a long way</div>
            <div class="missingassignmenttext" data-ix="worst-class">';echo substr($_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][$numberAssignmentsMissing[0]]["name"],0,25); echo '</div>
            <div class="missingassignmenttext" data-ix="worst-class">';echo substr($_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][$numberAssignmentsMissing[1]]["name"],0,25); echo '</div>
            <div class="missingassignmenttext" data-ix="worst-class">';echo substr($_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][$numberAssignmentsMissing[2]]["name"],0,25); echo '</div>
            <div class="missingassignmenttext" data-ix="worst-class">';echo substr($_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][$numberAssignmentsMissing[3]]["name"],0,25); echo '</div>
            <div class="missingassignmenttext" data-ix="worst-class">';echo substr($_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][$numberAssignmentsMissing[4]]["name"],0,25); echo '</div>
            ';if (sizeof($numberAssignmentsMissing) > 5) {echo '<div class="additionalmissing" data-ix="worst-class">';echo (sizeof($numberAssignmentsMissing) - 5);echo' more...</div>';}echo '</div>
       ';} elseif (sizeof($numberAssignmentsMissing) == 0) { echo '
          <div class="goodassignmentsblock">
            <div class="goodassignmentstitle" data-ix="worst-class">Everything is turned in!</div>
            <div class="text-block-11" data-ix="worst-class">All of your assignments for this class are turned in. If you would like to get ahead in this class, consider taking some courses on <a href="https://www.khanacademy.org">Khan Academy</a>.</div>
          </div>
          <div class="class-html-embed w-hidden-small w-hidden-tiny w-embed" data-ix="worst-class"><iframe height="100%" width="100%" frameBorder="0" src="https://syndication.elliotgluck.com/network/score.php"></iframe></div>
        ';}?>
        </div>
        <div class="column-5 w-col w-col-7">
          <div class="recenttitle" data-ix="gpa-load">Recent Assignments</div>
          <div class="w-row" data-ix="best-class">
            <div class="w-col w-col-10 w-col-small-10">
              <div class="overviewassignment mostrecent"><?php echo substr(preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][0]["name"]),0,32); ?></div>
              <div class="overviewassignment secondrecent"><?php echo substr(preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][1]["name"]),0,32); ?></div>
              <div class="overviewassignment thirdrecent"><?php echo substr(preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][2]["name"]),0,32); ?></div>
              <div class="overviewassignment fourthrecent"><?php echo substr(preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][3]["name"]),0,32); ?></div>
              <div class="overviewassignment fifthrecent"><?php echo substr(preg_replace("/\([^)]+\)/","",$_SESSION["masterGradesVar"]["course"][$currentClass]["assignments"][4]["name"]),0,32); ?></div>
            </div>
            <div class="w-hidden-tiny w-clearfix w-col w-col-2 w-col-small-2">
            </div>
          </div><a href="#" class="modalbtn w-button" data-ix="gpa-load">Grade Calculator</a>
          <div class="class-html-embed w-hidden-small w-hidden-tiny w-embed" data-ix="worst-class"><iframe height="100%" width="100%" frameBorder="0" src="https://syndication.elliotgluck.com/network/score.php"></iframe></div>
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