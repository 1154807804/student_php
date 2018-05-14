body{line-height:1;color:#333;width:100%;margin:0 auto;-webkit-text-size-adjust:none;overflow-x:hidden}p,ol,ul,li{list-style:none}a,span{line-height:1;color:#333;text-decoration:none}button{outline:0}label{font-weight:normal}img{width:100%;display:block}a img{word-break:break-all;word-wrap:break-word}a:hover,a:focus{text-decoration:none}:focus{outline:0}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-text-size-adjust:none}
html,body{padding:0; margin:0 auto; height:100%; font-size:15px; max-width:400px}
*{-webkit-appearance:none; margin:0; padding:0}
a, span{color:inherit ; line-height:inherit; text-decoration:none}
img{width:auto }
input{outline:none;}

/**
 * CSS3 答题卡翻页效果 jQuery Transit 
 * @authors Candice <hovertree.com>
 * @date    2016-9-27 15:30:18
 * @version v1.0.8
 */
.wrapper{width:100%; margin:0 auto;}
.card_wrap{width:400px; height:584px; position:relative; overflow:hidden; display:none}
.card_cont{width:100%; height:530px; box-sizing:border-box; margin:0 auto; position:absolute;  background:url(http://hovertree.com/texiao/jquery/87/hovertree_card_bg.png) no-repeat center top; background-size:100% auto; padding:8px 20px 18px; transition:all ease .5s; -webkit-transition:all ease .5s; -moz-transition:all ease .5s; -ms-transition:all ease .5s; transform:scale(0,0); -moz-transform:scale(0,0);-ms-transform:scale(0,0); -o-transform:scale(0,0); -webkit-transform:scale(0,0); bottom:0; display:none;}
.card{width:320px; height:100%; position:relative; margin:0 auto; padding:0 18px; }
.card .card_bottom{width:100%; position:absolute; bottom:28px; left:0; box-sizing:border-box; padding:0 28px}
.card .card_bottom a{color:#c733c5; cursor:pointer }
.card .card_bottom span{float:right; color:#909090}.card .card_bottom span b{color:#666; font-weight:inherit}

.card_cont.card1{ display:block;transform:scale(1,1) translate(0,0) !important ;  
-ms-transform:scale(1,1) translate(0,0) !important ; 
-moz-transform:scale(1,1) translate(0,0) !important ; 
-webkit-transform:scale(1,1) translate(0,0) !important ; 
}
.card_cont.card2{ display:block;
transform:scale(.85,.85) translate(0,-62px) !important ; 
-ms-transform:scale(.85,.85) translate(0,-62px) !important ; 
-moz-transform:scale(.85,.85) translate(0,-62px) !important ; 
-webkit-transform:scale(.85,.85) translate(0,-62px) !important;
}
.card_cont.card3{ display:block;
transform:scale(.72,.72) translate(0,-135px) !important ; 
-ms-transform:scale(.72,.72) translate(0,-135px) !important ; 
-moz-transform:scale(.72,.72) translate(0,-135px) !important ;
-webkit-transform:scale(.72,.72) translate(0,-135px) !important ;
}
.card_cont.cardn{display:block;
transform:translate(0,-1000px) !important; 
-moz-transform:translate(0,-1000px) !important; 
-ms-transform:translate(0,-1000px) !important;
-webkit-transform:translate(0,-1000px) !important;}

.question{display:table-cell; height:80px; font-size:16px; font-weight:100; color:#fff; line-height:1.4; vertical-align:middle; padding-left:1em}
.question span{margin-left:-1em}

/*Radio Specific styles*/
input[type='radio']{ display: none;cursor: pointer;}
input[type='radio']:focus, input[type='radio']:active{outline: none;}
input[type='radio'] + label {
  cursor: pointer;
  display: inline-block;
  position: relative;
  padding-left: 28px;
  color: #666;

}
input[type='radio']:checked + label {color: #c733c5 !important;}
input[type='radio'] + label:before, input[type='radio'] + label:after{
  content: '';
  font-family: helvetica;
  display: inline-block;
  width: 20px;
  height:20px;
  left: 0;
  top: 0;
  text-align: center;
  position: absolute;
}
input[type='radio'] + label:before {background-color:transparent;}
input[type='radio'] + label:after {color: #c733c5;}
input[type='radio']:checked + label:before {
  -moz-box-shadow: inset 0 0 0 5px #fff;
  -webkit-box-shadow: inset 0 0 5px #fff;
  box-shadow: inset 0 0 0 5px #fff; 
  border:1px solid #c733c5;
  background-color:#c733c5;
}

input[type='radio'] + label:before {
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  border:1px solid #c733c5;
}

input[type='radio'] + label:hover:after {color: #c733c5;}
input[type='radio']:checked + label:after, input[type='radio']:checked + label:hover:after {color: #c733c5;}
ul.select{margin-top:30px}
ul.select li{height:46px; line-height:1.5; margin:0 0 20px 0}