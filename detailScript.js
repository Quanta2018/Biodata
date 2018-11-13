function getSearchParameters() {
      var prmstr = window.location.search.substr(1);
      return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
				var listMembers = JSON.parse(this.responseText);
		var absen = getSearchParameters()["absen"];
				var toOutput = '';
				var isFound = false;
				
				for (i = 0; i < listMembers.length; ++i) {
					if (listMembers[i].absen == absen) {
						toOutput += '<img src="img/' + absen + '.png" alt="" /><br>';
						toOutput += '<p><b>Nama :</b> ' + listMembers[i].fullname + '</p>';
						toOutput += '<p><b>Panggilan :</b> ' + listMembers[i].nickname + '</p>';
						toOutput += '<p><b>Tanggal Lahir :</b> ' + listMembers[i].birthdate + '</p>';
						toOutput += '<p><b>ID Line :</b> ' + listMembers[i].lineid + '</p>';
						toOutput += '<p><b>Instagram :</b> ' + listMembers[i].instaname + '</p>';
						toOutput += '<p><b>Pesan:</b> ' + listMembers[i].desc + '</p>';
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