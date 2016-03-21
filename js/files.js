var files, count, folder;

function createList() {
	var list = document.getElementById("fileList");
	for(var i = 0; i < count; i++){
		var listItem = document.createElement('li');
		var linkItem = document.createElement('a');
		var name = files[i].replace(/^.*[\\\/]/, '');
		linkItem.href = files[i];
		linkItem.innerHTML = name;
		linkItem.download = name;
		listItem.appendChild(linkItem);
		list.appendChild(listItem);
	}
}
function getFiles() {
	$.ajax({
	  url: "php/getFiles.php?folder=" + folder
	}).done(function( data ) {
		if ( console && console.log ) {
		  console.log(data);
		}
		files = data.split(',');
		files.pop();
		count = files.length;
		createList();
		for (var i=0; i < count; i++){console.log(files[i]);}
	});
}