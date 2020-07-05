var list = document.getElementById("ft_list");
var listArr = [];

if (document.cookie != "") {
    listArr = JSON.parse(getCookie("listArr"));
    displayTodo(listArr);
}

function remove(element) {
    if (confirm("Remove item?"))
    {
        element.remove();
        deleteTodo(element.id);
    }
}

function displayElement(text) {
    var tag = document.createElement("div");
    tag.setAttribute("onclick", "remove(this)");
    tag.setAttribute("id", text[1]);
    var todo = document.createTextNode(text[0]);
    tag.appendChild(todo);
    list.appendChild(tag);
}

function displayTodo(data) {
    data.slice().reverse().forEach(displayElement);
}

function createTodo(text) {
    listArr.push([text, Math.random().toString(36)]);
    setCookie("listArr", JSON.stringify(listArr), 365);
    location.reload();
}

function deleteTodo(id) {
    for (var i = 0; i < listArr.length; i++) {
        if (listArr[i][1] == id) {
            listArr.splice(i, 1);
            break;
        }
    }
    setCookie("listArr", JSON.stringify(listArr), 365);
}

function handleClick() {
    var ret = prompt("New to-do element");
    if (ret != null && ret != "")
        createTodo(ret);
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/;";
	var x = document.cookie;
}

function getCookie(cname) {
	var name = cname + "=";
	var decodeCookie = decodeURIComponent(document.cookie);
	var ca = decodeCookie.split(";");
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}