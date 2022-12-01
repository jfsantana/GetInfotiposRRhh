<style>
@font-face {
    font-family: "fvisitas"; 
    src: url('vistas/layouts/animatexto/fuentes/EASPORTS15.ttf');  /* EASPORTS15  Pickle.otf    AMVINYL.ttf   ACROSS.ttf*/
}

.rw-sentence{
		text-shadow: 2px 2px 2px rgba(241, 29, 29, 0.8);
}
.rw-sentence span{ /* Tamaño y tipo de letra  */
	position: absolute;
	white-space: nowrap;
	font-size: 650%;
 	font-family: "fvisitas";
	letter-spacing: 0.2em;
}

.rw-sentence-2 span{
	left: 8%; 
	-webkit-animation: rotateWordsSecond 10s linear infinite 0s;
	-ms-animation: rotateWordsSecond 10s linear infinite 0s;
	animation: rotateWordsSecond 10s linear infinite 0s;
	color: rgb(245, 14, 14);
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
	opacity: 0;
	overflow: hidden;
	width: 70%;
 	font-family: "fvisitas";
	font-size: 650%;
	letter-spacing: 0.2em;
	left: 8%;
	color: #e2381a;
}

.rw-words span:nth-child(2) {   
    -webkit-animation-delay: 3s; 
	-ms-animation-delay: 3s; 
	animation-delay: 3s; 
	color: rgb(240, 11, 11);
}

 /* Segunda aparicion */

.rw-words span:nth-child(3) { 
    -webkit-animation-delay: 6s; 
	-ms-animation-delay: 6s; 
	animation-delay: 6s; 
background: -moz-linear-gradient(left, #e71a0c 1000%, black 200%);
    background-color: rgba(0, 0, 0, 0);
    background-image: -moz-linear-gradient(left center , #ee5706 1000%, black 200%);
-webkit-background-clip: text; color: transparent;

}
.rw-words span:nth-child(4) {  /* VISITAS  */
    -webkit-animation-delay: 9s; 
	-ms-animation-delay: 9s; 
	animation-delay: 9s; 
	color: #ea420a;
}

.rw-words span:nth-child(5) { 
    -webkit-animation-delay: 6s; 
	-ms-animation-delay: 6s; 
	animation-delay: 6s; 
background: -moz-linear-gradient(left, #ea420a 1000%, black 200%);
    background-color: rgba(0, 0, 0, 0);
    background-image: -moz-linear-gradient(left center , #ea420a 1000%, black 200%);
-webkit-background-clip: text; color: transparent;
}
.rw-words span:nth-child(6) {  /* VISITAS  */
    -webkit-animation-delay: 9s; 
	-ms-animation-delay: 9s; 
	animation-delay: 9s; 
background: -moz-linear-gradient(left, #ea420a 1000%, black 200%);
    background-color: rgba(0, 0, 0, 0);
    background-image: -moz-linear-gradient(left center , #ea420a 1000%, black 200%);
-webkit-background-clip: text; color: transparent;
}

@-webkit-keyframes rotateWordsSecond {
    0% { opacity: 1; -webkit-animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
	20% { opacity: 1; width: 85%; }
    27% { opacity: 0; width: 85%; }
    100% { opacity: 1; }
}
@-ms-keyframes rotateWordsSecond {
    0% { opacity: 1; -ms-animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
	20% { opacity: 1; width: 85%; }
    27% { opacity: 0; width: 85%; }
    100% { opacity: 1; }
}
@keyframes rotateWordsSecond {
    0% { opacity: 1; -webkit-animation-timing-function: ease-in; animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
	20% { opacity: 1; width: 85%; }
    27% { opacity: 0; width: 85%; }
    100% { opacity: 1; }
}
@media screen and (max-width: 80%){
	.rw-sentence { font-size: 80%; }
}
@media screen and (max-width: 80%){
	.rw-sentence { font-size: 80%; }
}

</style>