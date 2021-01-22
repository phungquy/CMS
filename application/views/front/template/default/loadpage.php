<style>
.circle{
    width: 120px;
    height: 120px;
    border: 10px inset rgb(133,224,242);
    display: block;
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -100px;
    margin-top: -100px;
    border-radius: 200px;
    -moz-animation: rotate 5s infinitelinear;
    -webkit-animation: rotate 5s infinite linear;
    animation: rotate 5s infinite linear;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.circle-small{
    width: 90px;
    height: 90px;
    border: 6px outset rgb(133,224,242);
    display: block;
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -81px;
    margin-top: -81px;
    border-radius: 156px;
    -moz-animation: rotate-rev 3s infinite linear;
    -webkit-animation: rotate-rev 3s infinite linear;
    animation: rotate-rev 3s infinite linear;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.circle-big{
    width: 150px;
    height: 150px;
    border: 4px dotted rgb(133,224,242);
    display: block;
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -109px;
    margin-top: -109px;
    border-radius: 214px;
    -moz-animation: rotate-rev 10s infinite linear;
    -webkit-animation: rotate-rev 10s infinite linear;
    animation: rotate-rev 10s infinite linear;
}

.circle-inner{
    width: 20px;
    height: 20px;
    background-color: rgb(133,224,242);
    display: block;
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -40px;
    margin-top: -40px;
    border-radius: 80px;
    -moz-animation: pulse 1.5s infinite ease-in;
    -webkit-animation: pulse 1.5s infinite ease-in;
    animation: pulse 1.5s infinite ease-in;
    opacity: 1;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.circle-inner-inner{
    width: 40px;
    height: 40px;
    background-color: rgb(74,124,134);
    display: block;
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -50px;
    margin-top: -50px;
    border-radius: 100px;
    -moz-animation: pulse 1.5s infinite ease-in;
    -webkit-animation: pulse 1.5s infinite ease-in;
    animation: pulse 1.5s infinite ease-in;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
}


/*==============ANIMATIONS=================*/

/*==============ROTATE=====================*/

@-moz-keyframes rotate{
  0% {-moz-transform: rotate(0deg);}
  100% {-moz-transform: rotate(360deg);}
}

@-webkit-keyframes rotate{
	0% {-webkit-transform: rotate(0deg);}
	100% {-webkit-transform: rotate(360deg);}
}

@keyframes rotate{
	0% {transform: rotate(0deg);}
	100% {transform: rotate(360deg);}
}

/*==============ROTATE-REV=================*/

@-moz-keyframes rotate-rev{
	0% {-moz-transform: rotate(0deg);}
	100% {-moz-transform: rotate(-360deg);}
}

@-webkit-keyframes rotate-rev{
	0% {-webkit-transform: rotate(0deg);}
	100% {-webkit-transform: rotate(-360deg);}
}

@keyframes rotate-rev{
	0% {transform: rotate(0deg);}
	100% {transform: rotate(-360deg);}
}

/*==============PULSE======================*/

@-moz-keyframes pulse{
	0% {
        -moz-transform: scale(0.1);
        opacity: 0.2;
    }
	50% {
        -moz-transform: scale(1);
        opacity: 0.8;
    }
    100% {
        -moz-transform: scale(0.1);
        opacity: 0.2;
    }
}

@-webkit-keyframes pulse{
	0% {
        -webkit-transform: scale(0.1);
        opacity: 0.2;
    }
	50% {
        -webkit-transform: scale(1);
        opacity: 0.8;
    }
    100% {
        -webkit-transform: scale(0.1);
        opacity: 0.2;
    }
}

@keyframes pulse{
	0% {
        transform: scale(0.1);
        opacity: 0.2;
    }
	50% {
        transform: scale(1);
        opacity: 0.8;
    }
  100% {
        transform: scale(0.1);
        opacity: 0.2;
    }
}
.load {
    position: fixed;
    width: 100%;
    background: #fff;
    height: 100%;
    z-index: 999;
}
</style>
<div class="load" id="load">
    <div class="circle"></div>
    <div class="circle-small"></div>
    <div class="circle-big"></div>
    <div class="circle-inner-inner"></div>
    <div class="circle-inner"></div>
    <script>
    // BEGIN LOAD PAGE
    window.onload = function()
    {
        $("#load").css("display", "none");
    };
    // END Load Page
    </script>
</div>