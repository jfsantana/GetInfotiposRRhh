<style>
@font-face {
    font-family: "fvisitas"; 
    src: url('vistas/layouts/animatexto/fuentes/AldotheApache.ttf');  /* EASPORTS15  Pickle.otf    AMVINYL.ttf   ACROSS.ttf*/
}

.rw-sentence{
	text-shadow: 2px 2px 2px #616e73;
}
.rw-sentence span{ /* Tamaño y tipo de letra  */
	position: absolute;
	white-space: nowrap;
	font-size: calc(3.7em + 1vw);
	color: #616e73;
 	font-family: 'Arial Narrow Bold', sans-serif;
	letter-spacing: 0.10em;
}

.rw-sentence-2 span{
	top: 0px;
	left: 1.3em; /* 00428e  */
	-webkit-animation: rotateWordsSecond 10s linear infinite 0s;
	-ms-animation: rotateWordsSecond 10s linear infinite 0s;
	animation: rotateWordsSecond 10s linear infinite 0s;
	color: #616e73;

}
.rw-sentence span:nth-child(2) {   
    -webkit-animation-delay: 3s; 
	-ms-animation-delay: 3s; 
	animation-delay: 3s; 
}

.rw-words{
	display: inline;
	text-indent: 10px;
}

.rw-words span{   
	position: absolute;
	opacity: 1;
	overflow: hidden;
	width: 58%;
	font-family: 'Arial Narrow Bold', sans-serif;
	font-size: calc(3.7em + 1vw);	
	letter-spacing: 0.10em;
	left: 1.3em;
	top: 0px;
	color: #616e73;
	line-height: 1;
}

.rw-words span:nth-child(2) { 
    -webkit-animation-delay: 3s; 
	-ms-animation-delay: 3s; 
	animation-delay: 3s; 
	color: #b2b2b2;
}

 /* Segunda aparicion */

.rw-words span:nth-child(3) { 
    -webkit-animation-delay: 3s; 
	-ms-animation-delay: 3s; 
	animation-delay: 3s; 
background: -moz-linear-gradient(left, #616e73 1000%, #b2b2b2 200%);
    background-color: #616e73;
    background-image: -moz-linear-gradient(left center ,#616e73 1000%, #b2b2b2 200%);
-webkit-background-clip: text; color: transparent;
}

.rw-words span:nth-child(4) {  
    -webkit-animation-delay: 4s; 
	-ms-animation-delay: 4s; 
	animation-delay: 4s; 
	color: #efecec;
}

.rw-words span:nth-child(5) { 
    -webkit-animation-delay: 4s; 
	-ms-animation-delay: 4s; 
	animation-delay: 4s; 
background: -moz-linear-gradient(left, #616e73 1000%, #b2b2b2 200%);
    background-color: #616e73;
    background-image: -moz-linear-gradient(left center ,#616e73 1000%, #b2b2b2 200%);
-webkit-background-clip: text; color: transparent;
}

.rw-words span:nth-child(6) {  
    -webkit-animation-delay: 4s; 
	-ms-animation-delay: 4s; 
	animation-delay: 4s; 
background: -moz-linear-gradient(left, #616e73 1000%, #b2b2b2 200%);
    background-color: #616e73;
    background-image: -moz-linear-gradient(left center ,#616e73 1000%, #b2b2b2 200%);
-webkit-background-clip: text; color: transparent;
}

@-webkit-keyframes rotateWordsSecond {
    0% { opacity: 1; -webkit-animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
	20% { opacity: 1; width: 58%; }
    27% { opacity: 0; width: 58%; }
    58% { opacity: 1; }
}
@-ms-keyframes rotateWordsSecond {
    0% { opacity: 1; -ms-animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
	20% { opacity: 1; width: 58%; }
    27% { opacity: 0; width: 58%; }
    58% { opacity: 1; }
}
@keyframes rotateWordsSecond {
    0% { opacity: 1; -webkit-animation-timing-function: ease-in; animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
	20% { opacity: 1; width: 58%; }
    27% { opacity: 0; width: 58%; }
    58% { opacity: 1; }
}

@media screen and (max-width: 100%){
	.rw-sentence {  font-size: calc(1em + 1vw); }
}
</style>