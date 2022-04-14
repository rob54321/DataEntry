<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);

	if (!session_id()) session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Tabs</title>
	<meta name="generator" content="Bluefish 2.2.12" />
	<link rel="stylesheet" type="text/css" href="css/tabs_style.css">
	<script>
		function change_tab(id) {
			document.getElementById("page_content").innerHTML=document.getElementById(id+"_desc").innerHTML;
			document.getElementById("page1").className="notselected";
			document.getElementById("page2").className="notselected";
			document.getElementById("page3").className="notselected";
			document.getElementById(id).className="selected";
		}
	</script>
</head>
<body>

<div id="main_content">

 <li class="selected" id="page1" onclick="change_tab(this.id);">Data Entry</li>
 <li class="notselected" id="page2" onclick="change_tab(this.id);">Data Display</li>
 <li class="notselected" id="page3" onclick="change_tab(this.id);">Search</li>
 
 <div class='hidden_desc' id="page1_desc">
  <h2>Page 1</h2>
  This is some text for page 1 the second time it is brought up.
  This is some text for page 1 the second time it is brought up.
  This is some text for page 1 the second time it is brought up.

 </div>

 <div class='hidden_desc' id="page2_desc">
  <h2>Page 2</h2>
  Hello this is Page 2 description and this is just a sample text .This is the demo of Multiple Tab In Single Page Using JavaScript and CSS.
 </div>
 
 <div class='hidden_desc' id="page3_desc">
  <h2>Page 3</h2>
  Hello this is Page 3 description and this is just a sample text .This is the demo of Multiple Tab In Single Page Using JavaScript and CSS. 
  Hello this is Page 3 description and this is just a sample text .This is the demo of Multiple Tab In Single Page Using JavaScript and CSS.
 </div>
 
 <div id="page_content">
  <h2>Page 1</h2>
  This is some text form page 1 the initial page.
  This is some text form page 1 the initial page.
  This is some text form page 1 the initial page.
  This is some text form page 1 the initial page.

 </div>
 
</div>
 
</body>
</html>
