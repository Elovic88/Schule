function init(){
    var documents = document.getElementById("documents");
    documents.innerHTML = "";
    loadDropdownData("Klasse", "getclasses", "class-select");
}
function loadDropdownData(name, method, menuId) {
    var xhttp = new XMLHttpRequest();
    var select = document.getElementById(menuId);
    select.innerHTML = "<option disabled selected>" + name + "</option>";

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.response);
            var html = "";
            for(var i = 0; i<data.length; i++) {
                var opt = document.createElement('option');
                opt.value = data[i].id;
                opt.innerHTML = data[i].name;
                select.appendChild(opt);
            }
        }
    };
    xhttp.open("GET", "/Document.php?m="+method, true);
    xhttp.send();
}
function changeClass(elem, dropdown) {
    var selectedValue = elem.options[elem.selectedIndex].value;
    loadDropdownData("Fach", "getsubjects&class="+selectedValue, dropdown);
}
function loadDocuments() {
    var select = document.getElementById("subject-select");
    var selectedValue = select.options[select.selectedIndex].value;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.response);
            var html = "";
            for(var i = 0; i<data.length; i++) {
                html+="<button onclick='loadDocument(\"/Document.php?m=getdocument&id=" + data[i].id + "\")'>"+data[i].name+"</button> <br />";
            }
            document.getElementById("documents").innerHTML = html;
        }
    };
    xhttp.open("GET", "/Document.php?m=getdocuments&subject="+selectedValue, true);
    xhttp.send();
}
function loadDocument(url) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var html = "<iframe style=\"position: absolute; height: 100%; width: 100%; border: none\" src='"+ this.response +"'></iframe>";
            document.getElementById("documents").innerHTML = html;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}