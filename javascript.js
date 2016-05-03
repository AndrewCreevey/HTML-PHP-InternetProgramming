/* Andrew Creevey, 12236284, Assignment 2*/

canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 80px Georgia'
context.textBaseline = 'top'
image				 = new Image()
image.src			 = 'php.jpg'

image.onload = function() {
	gradient = context.createLinearGradient(0, 0, 0, 89)
	gradient.addColorStop(0.00, '#5F82BA')
	context.fillStyle = gradient
	context.fillText( "Quiz Fun in ", 15, 0)
	context.drawImage(image, 520, 10)
}
function O(obj) {
	if (typeof obj == 'object') return obj
	else return document.getElementById(obj)
}
function S(obj){
	return O(obj).style
}
function C(name) {
	var elements = document.getElementsByTagName('*')
	var objects = []
	for (var i = 0 ; i < elements.length ; ++i)
		if (elements[i].className == name)
			objects.push(elements[i])
	return objects
}