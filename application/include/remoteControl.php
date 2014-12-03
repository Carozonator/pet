<?php

if($_REQUEST['action']=='remote_control'){
    $output = shell_exec('sudo python remote_control.py '.$_REQUEST['signal']);
    die;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Automation | Raspberry Pi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!--<link href="HomeAuto.css" rel="stylesheet" type="text/css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            
            
            function remoteControl(signal){
                if(typeof signal=='object'){
                    signal = $(signal).html();
                }
                $.ajax({
                    url:'index.php?action=remote_control&signal='+signal,
                    success:function(data){
                        conosle.log(data);
                        //$('body').html(data);
                    }
                });
            }
        </script>
        <style>
            /* SLIDE THREE */


body{
    font-family:"Lucida Grande", "Lucida Sans Unicode", Tahoma, Sans-Serif
}
.widget .slideThree{
    position:absolute;
    right:2px;
    top:2px;
}
.slideThree {
	width: 80px;
	height: 26px;
        background:#FFF;
        
        display:inline-block;
        margin:2px 5px;
        
	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	position: relative;
        
        border:1px solid #666;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}

.widget .content{
    position:absolute;
    right:2px;
    top:5px;
}
.widget .title{
    padding:10px;
    display:inline-block;
}

.widget {
        border-left:4px solid #1385e5;
        /* #1385e5; */
        color:white;
	width: 220px;
	height: 40px;
       
        background: -webkit-linear-gradient(#4d4d4d,#2f2f2f);
        background: -moz-linear-gradient(#4d4d4d,#2f2f2f);
        background: -o-linear-gradient(#4d4d4d,#2f2f2f);
        background: linear-gradient(#4d4d4d,#2f2f2f);
        
	position: relative;
        
        /*
	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
        */
}
.widget:active{
    background: #1385e5;
  background: -webkit-linear-gradient(top, #53b2fc, #1385e5);
  background: -moz-linear-gradient(top, #53b2fc, #1385e5);
  background: -o-linear-gradient(top, #53b2fc, #1385e5);
  background: linear-gradient(to bottom, #53b2fc, #1385e5);
}
.widget:active .button{
    background: -webkit-linear-gradient(#4d4d4d,#2f2f2f);
        background: -moz-linear-gradient(#4d4d4d,#2f2f2f);
        background: -o-linear-gradient(#4d4d4d,#2f2f2f);
        background: linear-gradient(#4d4d4d,#2f2f2f);
}










.slideThree:after {
	content: 'OFF';
	font: 12px/26px Arial, sans-serif;
	
        position: absolute;
	right: 10px;
	z-index: 0;
	font-weight: bold;
        
        text-shadow: 0 0 0 #000,0px 1px 2px #555;
	color: #222;
        
}

.slideThree:before {
	content: 'ON';
	font: 12px/26px Arial, sans-serif;
	color: #1385e5;
	position: absolute;
	left: 10px;
	z-index: 0;
	font-weight: bold;
        text-shadow: 0 1px 1px #052541;
}

.slideThree label {
        border:1px solid #666;
    
	display: block;
	width: 36px;
	height: 18px;

        
	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	-webkit-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.3);
	box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.3);
	background: #fcfff4;

        /*background-image:linear-gradient(#4d4d4d,#2f2f2f);
        */
        
	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
        
}

.slideThree input[type=checkbox]:checked + label {
	left: 40px;
}
input[type="checkbox"]{
    visibility:hidden;
}



.button.number{
    width:55px;
    text-align: center;
    height:55px;
    line-height:55px;
    font-size:20px;
    margin:5px;
}
.button {
    width:35px;
    text-align:center;
  background: #fafafa;
  background: -webkit-linear-gradient(top, #ffffff, #eeeeee);
  background: -moz-linear-gradient(top, #ffffff, #eeeeee);
  background: -o-linear-gradient(top, #ffffff, #eeeeee);
  background: linear-gradient(to bottom, #ffffff, #eeeeee);
  border: 1px solid #bbbbbb;
  border-radius: 50px;
  box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.2);
  color: #555555;
  cursor: pointer;
  display: inline-block;
  font-family: "Helvetica Neue", Arial, Verdana, "Nimbus Sans L", sans-serif;
  font-size: 13px;
  font-weight: 500;
  height: 28px;
  line-height: 25px;
  outline: none;
  padding: 0 7px;
  text-shadow: 0 1px 0 white;
  text-decoration: none;
  vertical-align: middle;
  white-space: nowrap;
  -webkit-font-smoothing: antialiased;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.button-blue {
  background: #1385e5;
  background: -webkit-linear-gradient(top, #53b2fc, #1385e5);
  background: -moz-linear-gradient(top, #53b2fc, #1385e5);
  background: -o-linear-gradient(top, #53b2fc, #1385e5);
  background: linear-gradient(to bottom, #53b2fc, #1385e5);
  border-color: #075fa9;
  color: white;
  font-weight: bold;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.7);
}
.button-red {
    background: #ff1a00; /* Old browsers */
background: -moz-linear-gradient(top,  #ff1a00 0%, #ff1a00 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff1a00), color-stop(100%,#ff1a00)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ff1a00 0%,#ff1a00 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ff1a00 0%,#ff1a00 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ff1a00 0%,#ff1a00 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ff1a00 0%,#ff1a00 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff1a00', endColorstr='#ff1a00',GradientType=0 ); /* IE6-9 */
color: white;
border-color:#363636;
  font-weight: bold;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.7);
}

.button.refresh{
    font-size:16px;
    font-weight:bold;
}

.rotate_180{
    -ms-transform: rotate(180deg); /* IE 9 */
    -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
    transform: rotate(180deg);
}



@media (max-width: 700px) {
    body{
        margin:0px;
        background:#333;
    }
    .widget {
        width:100%;
        margin:0px;
    }
}
        </style>
    </head>
    <body>
        <div class="widget">
            <div class="title">Channel</div>
            <div class="content">
                <span></span><span></span>
                <a href="#" onclick="remoteControl('12');return false;" class="button button-blue refresh">&#8679;</a>
                <a href="#" onclick="remoteControl('13');return false;" class="button button-blue refresh rotate_180">&#8679;</a>
            </div>
        </div>
        <div class="widget">
            <div class="title">Volume</div>
            <div class="content">
                <span></span><span></span>
                <a href="#" onclick="remoteControl('14');return false;" class="button button-blue refresh">+</a>
                <a href="#" onclick="remoteControl('15');return false;" class="button button-blue refresh">-</a>
            </div>
        </div>
        <div class="widget" onclick="remoteControl('11');return false;">
            <div class="title">Power</div>
            <div class="content">
                <span></span><span></span>
                <a href="#" style="width:75px;" class="button button-red refresh">on/off</a>
            </div>
        </div>
        <div style="text-align:center;">
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">1</a>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">2</a>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">3</a>
            <br/>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">4</a>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">5</a>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">6</a>
            <br/>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">7</a>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">8</a>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(this);return false;">9</a>
            <br/>
            <a href="#" class="button button-blue number refresh" onclick="remoteControl(10);return false;">0</a>
        </div>
    </body>
</html>