<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="generator" content="PTGui" />
    <title></title>
    
<!-- -------------   style sheet:   ------------ -->
<style type="text/css">

html, body{
  width: 100%;
  height: 100%;
}

body {
  font-family: Verdana, Arial, Helvetica, Sans-Serif;
  font-size: 8pt;
  margin: 0px;  
}

h1 {
  font-size: 12pt;
  display: inline;
}


#mypanoviewer {
	height:100%;
  width: 100%;
  -webkit-box-shadow: 5px 5px 10px rgb(180,180,180);
  -moz-box-shadow: 5px 5px 10px rgb(180,180,180);
  box-shadow: 5px 5px 10px rgb(180,180,180);
}


</style>

<!--[if lte IE 8]>
<style type="text/css">
/* Internet Explorer cannot fill a table row up to the remaining height; scrollbars will appear
  therefore set the middle row to only 70% :
*/  
#middletd {
	height:70%;
}
</style>
<![endif]-->    

<!-- -------------   code to embed the panorama viewer:   ------------ -->
<script type="text/javascript" src="PTGuiViewer.js"></script>
<script type="text/javascript">
//<![CDATA[

// create a new viewer object:
var viewer=new PTGuiViewer();

// point to the location of the flash viewer (PTGuiViewer.swf)
// this should be relative to the location of the current HTML document
viewer.setSwfUrl("PTGuiViewer.swf");

// What to do if both Flash and the native viewer can be used:
// use viewer.preferHtmlViewer() if you prefer to use the native HTML viewer 
// use viewer.preferFlashViewer() if you prefer to use the native HTML viewer 
// when Flash is available.
viewer.preferHtmlViewer();
// viewer.preferFlashViewer();

// set parameters for the viewer:
viewer.setVars({
  pano: "WR_",
  format: "14faces",
  pan: 0,
  minpan: -180,
  maxpan: 180,
  tilt:0,
  mintilt: -21.06289614822038,
  maxtilt: 21.06289614822038,
  fov: 90,
  minfov: 30,
  maxfov: 140,
  autorotatespeed: 0.5,
  autorotatedelay: 10,
  maxiosdimension: 567,
  showfullscreenbutton_flash: 1,
  showfullscreenbutton_html: 1,
  enablegyroscope: 1,
  mousemode: "drag"
});

// and embed the viewer
// The remainder of this HTML document should contain an element with the id mentioned here
// (e.g. <div id="..."> )
// The viewer will be embedded as a child of that element

viewer.embed("mypanoviewer");

//]]>
</script>
<!-- -------------  that's all!  ------------ -->
  </head>
  
  <body>
    <div id="mypanoviewer"></div>
              
  </body>
</html>