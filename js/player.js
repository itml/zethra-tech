var files;
var tracks;
var track = 0;
var audio = $("#player");
var name;
var playState = false;
var songTextBox = document.getElementById('song');
var titleTextBox = document.getElementById('title');
var downloadButton = document.getElementById('download');
var currentText;
var previousTest = $('#songList').find('li:nth-child(1)');
var tags = [];

function update(){
	audio.attr("src", files[track]);
	downloadButton.href = files[track];
	downloadButton.download = files[track];
	titleTextBox.innerHTML = files[track].replace(/^.*[\\\/]/, '').replace(/^[0-9 | -]+/g,"").substring(0, files[track].replace(/^.*[\\\/]/, '').replace(/^[0-9 | -]+/g,"").length - 4);
	audio[0].pause();
	audio[0].load();
	previousTest.css('font-style', 'normal');
	currentText = $('#songList').find('li:nth-child(' + (track + 1) + ')')
	currentText.css('font-style', 'italic');
	previousTest = currentText;
}

$.ajax({
  url: "/php/player.php",
}).done(function( data ) {
	files = data.split(',');
	files.pop();
	tracks = files.length;
	files = shuffle(files)
	creatList();
	update();
	
});
$('#song').keypress(function(){
	if (event.keyCode == 13) {
		var songnum = parseInt(document.getElementById('song').value) - 1
		if(songnum >= 0 && songnum <= tracks - 1){
			track = songnum
			update();
			if(playState){audio[0].play();}
		}
		document.getElementById('song').value = ""
    }
});
$('ol').click(function(e) {
    var n = $(e.target).index() + this.start;
    track = n - 1
	update();
	if(playState){audio[0].play();}    
});
function foward(override){
	track++;
	if(track >= tracks){track = 0;}
	update();
	if(playState || override){audio[0].play();}
}
function backward(){
	track--;
	if(track < 0){track = tracks - 1;}
	update();
    if(playState){audio[0].play();}
}
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;
  while (0 !== currentIndex) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }
  return array;
}
function creatList(){
	var list = document.getElementById("songList");
	for(n = 0; n < tracks; n++){
		var listItem = document.createElement('li');
		listItem.innerHTML = files[n].replace(/^.*[\\\/]/, '').replace(/^[0-9 | -]+/g,"").substring(0, files[n].replace(/^.*[\\\/]/, '').replace(/^[0-9 | -]+/g,"").length - 4);
		list.appendChild(listItem);
	}
}
function pp(){
	if(!playState){audio[0].play();}
	else{audio[0].pause()}
}
function dl(){
	
}
$('#player').bind("ended", function(){foward(true);});
$('#player').on('pause', function(){playState = false;});
$('#player').on('play', function(){playState = true;});
$(document).keydown(function(e){
	switch(e.which){
		case 32: pp(); break;
		case 39: foward(); break;
		case 37: backward(); break;
		case 179: pp(); break;
		case 176: foward(); break;
		case 177: backward(); break;
	}
});