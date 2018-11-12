<!DOCTYPE html>

<?php
	$absen = $_GET['absen'];
?>

<head>
<title>QUANTA 2018</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

<!-- nav-bar -->
<div class="quanta-top">
  <div class="nav-bar">
	<img class="nav-header" src="Assets/top.svg">
    <a href="https://quanta2018.com/" target="_self" class="quanta">Quanta</a>
    <div class="small-navbar">
      <a href="https://gg.gg/BBQGratis" target="_blank" class="bbq">BBQ</a>
      <a href="https://quanta2018.com/Biodata" target="_self" class="biodata">Biodata</a>
      <a href="https://quanta2018.com/Gallery" target="_self" class="gallery">Gallery</a>
    </div>
  </div>
</div>

<div class="container">
	<div id="content"></div>
</div>

<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
				var listMembers = JSON.parse(this.responseText);
				var absen = "<?php echo $absen ?>";
				var toOutput = '';
				var isFound = false;
				
				for (i = 0; i < listMembers.length; ++i) {
					if (listMembers[i].absen == absen) {
						toOutput += '<img src="img/' + absen + '.png" alt="" /><br>';
						toOutput += '<h2>' + listMembers[i].nama + '</h2>' + listMembers[i].desc;
						isFound = true;
						break;
					}
				}
				
				if (!isFound) {
					toOutput += "<br><br><h3>Content not available</h3>";
				}
				document.getElementById("content").innerHTML = toOutput;
    }
};

xmlhttp.open("GET", "desc.json", true);
xmlhttp.send();
</script>

</body>