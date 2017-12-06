

<html>
<head>
<meta http-equiv="Content-Type" content="charset=iso-8859-1" />

<style type="text/css" media="all">
   @import url("css/svg.css");
</style>
<script type="text/javascript" src="javascript/jquery-1.7.2.js"></script>
<script type="text/javascript" src="javascript/jquery.svg.js"></script>
<script type="text/javascript" src="javascript/jquery.transit.min.js"></script>
<script type="text/javascript" src="javascript/jquery.svg.input.min.js"></script> <!--jquery.svg.input.js"></script>-->

<script type="text/javascript">

$(document).ready(function(){
  
  $('#svg').svg({onLoad: init, settings: {
	    viewBox: '0 0 400 200', 
	    version: '1.1'
  	}
  });
  
});

function init(svg){


  s = svg.input.textArea(5, 5, "When you look at basketball shoes, what do you see? A big swoosh. Three stripes. Michael Jordan. A billboard molded to your feet. But do you see the technology? Though maybe not as blatant as an Intel sticker on your laptop, every shoe showcases its own advanced technology. Don't worry, you can't miss it on these, the best basketball shoes on the planet. Because they roll with carbon fiber and Kevlar.", {width: '200'});
	console.log(svg.input);
  s.bind("SVGInput_changedSize", function (e, width, height) {
    console.log("changed size: " + width.toString() + "x" + height.toString());
  });
  
  s.bind("SVGInput_changedText", function (e, string) {
    console.log("changed text: " + string);
  });
	
}

</script>

</head>

<body>

<a href="https://github.com/engelfrost/svg-input-elements"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>

<p style="text-align: center; color: red; font-size: 3em;">
  This project has had a reboot. It's new home is on <a href="http://engelfrost.github.io/svg-input-elements/">engelfrost.github.io/svg-input-elements/</a>.
</p>

<h1 style="margin: auto; width: 800px;  margin-bottom: 12px; margin-top: 25px; ">SVG Input Elements</h1>
<p style="margin: auto; width: 800px; margin-bottom: 10px;  ">
  <a href="textarea.html">Textarea</a>, <a href="text.html">Text</a>, <a href="list.html">List</a> and <a href="image.html">Image</a>
</p>

<div style="margin: auto; width: 800px;">
  <svg id="svg" version="1.1" width="800" height="400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>
</div>

<p style="margin: auto; width: 800px; margin-top: 10px; ">This is a simple demonstration of a textarea written in JavaScript and SVG. It handles text input, line wrapping, word wrapping, selection, copy/paste and undo/redo. None of these features are natively supported in SVG 1.1. It can be styled using a subset of CSS. Licensed under the <a href="license.txt">MIT License</a>. For more information go to <a href="https://github.com/silence150/SVG-Input-Elements">the GitHub project</a>. 
</p>
</body>
</html>
