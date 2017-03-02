//--------------------------------------------------------------
//Javascript slider code
//--------------------------------------------------------------
<!--
versionButton = 1
var browser = new Object();
if (navigator.appName.substring(0,8) == "Netscape")
{
browser.name = "NN";
}
if (navigator.appName.substring(0,9) == "Microsoft")
{
browser.name = "MSIE";
}
browser.version = Math.round(parseFloat(navigator.appVersion) * 1000);
if ((browser.name == "MSIE" && browser.version >= 4000) || (browser.name == "NN"
&& browser.version >= 3000)) versionButton = 3; 
if (versionButton == 3)
{
  toc0on = new Image(42, 10);
  toc0on.src = "on.slider.gif";
  toc1on = new Image(42, 10);
  toc1on.src = "on.slider.gif";
  toc2on = new Image(42, 10);
  toc2on.src = "on.slider.gif";
  toc3on = new Image(42, 10);
  toc3on.src = "on.slider.gif";
  toc4on = new Image(42, 10);
  toc4on.src = "on.slider.gif";
  toc5on = new Image(42, 10);
  toc5on.src = "on.slider.gif";
  toc6on = new Image(42, 10);
  toc6on.src = "on.slider.gif";
  toc7on = new Image(42, 10);
  toc7on.src = "on.slider.gif";
  toc8on = new Image(42, 10);
  toc8on.src = "on.slider.gif";
  toc9on = new Image(42, 10);
  toc9on.src = "on.slider.gif";
  toc10on = new Image(42, 10);
  toc10on.src = "on.slider.gif";
  toc11on = new Image(42, 10);
  toc11on.src = "on.slider.gif";
  toc12on = new Image(42, 10);
  toc12on.src = "on.slider.gif";
  toc13on = new Image(42, 10);
  toc13on.src = "on.slider.gif";
  toc14on = new Image(42, 10);
  toc14on.src = "on.slider.gif";
  toc15on = new Image(42, 10);
  toc15on.src = "on.slider.gif";
  toc16on = new Image(42, 10);
  toc16on.src = "on.slider.gif";
  toc17on = new Image(42, 10);
  toc17on.src = "on.slider.gif";
  toc18on = new Image(42, 10);
  toc18on.src = "on.slider.gif";
  toc19on = new Image(42, 10);
  toc19on.src = "on.slider.gif";
  toc20on = new Image(42, 10);
  toc20on.src = "on.slider.gif";
  toc21on = new Image(42, 10);
  toc21on.src = "on.slider.gif";
  toc22on = new Image(42, 10);
  toc22on.src = "on.slider.gif";
  toc23on = new Image(42, 10);
  toc23on.src = "on.slider.gif";
  toc24on = new Image(42, 10);
  toc24on.src = "on.slider.gif";
  toc25on = new Image(42, 10);
  toc25on.src = "on.slider.gif";
  toc26on = new Image(42, 10);
  toc26on.src = "on.slider.gif";
  toc27on = new Image(42, 10);
  toc27on.src = "on.slider.gif";
  toc28on = new Image(42, 10);
  toc28on.src = "on.slider.gif";
  toc29on = new Image(42, 10);
  toc29on.src = "on.slider.gif";
  toc30on = new Image(42, 10);
  toc30on.src = "on.slider.gif";
  toc31on = new Image(42, 10);
  toc31on.src = "on.slider.gif";
  toc32on = new Image(42, 10);
  toc32on.src = "on.slider.gif";
  toc33on = new Image(42, 10);
  toc33on.src = "on.slider.gif";
  toc34on = new Image(42, 10);
  toc34on.src = "on.slider.gif";
  toc35on = new Image(42, 10);
  toc35on.src = "on.slider.gif";
  toc36on = new Image(42, 10);
  toc36on.src = "on.slider.gif";
  toc37on = new Image(42, 10);
  toc37on.src = "on.slider.gif";
  toc38on = new Image(42, 10);
  toc38on.src = "on.slider.gif";
  toc39on = new Image(42, 10);
  toc39on.src = "on.slider.gif";
  toc40on = new Image(42, 10);
  toc40on.src = "on.slider.gif";
  toc41on = new Image(42, 10);
  toc41on.src = "on.slider.gif";
  toc42on = new Image(42, 10);
  toc42on.src = "on.slider.gif";
  toc43on = new Image(43, 10);
  toc43on.src = "on.slider.gif";
  
  toc0off = new Image(42, 10);
  toc0off.src = "off.slider.gif";
  toc1off = new Image(42, 10);
  toc1off.src = "off.slider.gif";
  toc2off = new Image(42, 10);
  toc2off.src = "off.slider.gif";
  toc3off = new Image(42, 10);
  toc3off.src = "off.slider.gif";
  toc4off = new Image(42, 10);
  toc4off.src = "off.slider.gif";
  toc5off = new Image(42, 10);
  toc5off.src = "off.slider.gif";
  toc6off = new Image(42, 10);
  toc6off.src = "off.slider.gif";
  toc7off = new Image(42, 10);
  toc7off.src = "off.slider.gif";
  toc8off = new Image(42, 10);
  toc8off.src = "off.slider.gif";
  toc9off = new Image(42, 10);
  toc9off.src = "off.slider.gif";
  toc10off = new Image(42, 10);
  toc10off.src = "off.slider.gif";
  toc11off = new Image(42, 10);
  toc11off.src = "off.slider.gif";
  toc12off = new Image(42, 10);
  toc12off.src = "off.slider.gif";
  toc13off = new Image(42, 10);
  toc13off.src = "off.slider.gif";
  toc14off = new Image(42, 10);
  toc14off.src = "off.slider.gif";
  toc15off = new Image(42, 10);
  toc15off.src = "off.slider.gif";
  toc16off = new Image(42, 10);
  toc16off.src = "off.slider.gif";
  toc17off = new Image(42, 10);
  toc17off.src = "off.slider.gif";
  toc18off = new Image(42, 10);
  toc18off.src = "off.slider.gif";
  toc19off = new Image(42, 10);
  toc19off.src = "off.slider.gif";
  toc20off = new Image(42, 10);
  toc20off.src = "off.slider.gif";
  toc21off = new Image(42, 10);
  toc21off.src = "off.slider.gif";
  toc22off = new Image(42, 10);
  toc22off.src = "off.slider.gif";
  toc23off = new Image(42, 10);
  toc23off.src = "off.slider.gif";
  toc24off = new Image(42, 10);
  toc24off.src = "off.slider.gif";
  toc25off = new Image(42, 10);
  toc25off.src = "off.slider.gif";
  toc26off = new Image(42, 10);
  toc26off.src = "off.slider.gif";
  toc27off = new Image(42, 10);
  toc27off.src = "off.slider.gif";
  toc28off = new Image(42, 10);
  toc28off.src = "off.slider.gif";
  toc29off = new Image(42, 10);
  toc29off.src = "off.slider.gif";
  toc30off = new Image(42, 10);
  toc30off.src = "off.slider.gif";
  toc31off = new Image(42, 10);
  toc31off.src = "off.slider.gif";
  toc32off = new Image(42, 10);
  toc32off.src = "off.slider.gif";
  toc33off = new Image(42, 10);
  toc33off.src = "off.slider.gif";
  toc34off = new Image(42, 10);
  toc34off.src = "off.slider.gif";
  toc35off = new Image(42, 10);
  toc35off.src = "off.slider.gif";
  toc36off = new Image(42, 10);
  toc36off.src = "off.slider.gif";
  toc37off = new Image(42, 10);
  toc37off.src = "off.slider.gif";  
  toc38off = new Image(42, 10);
  toc38off.src = "off.slider.gif";
  toc39off = new Image(42, 10);
  toc39off.src = "off.slider.gif";
  toc40off = new Image(42, 10);
  toc40off.src = "off.slider.gif";
  toc41off = new Image(42, 10);
  toc41off.src = "off.slider.gif";
  toc42off = new Image(42, 10);
  toc42off.src = "off.slider.gif";
  toc43off = new Image(43, 10);
  toc43off.src = "off.slider.gif";
}

function img_act(imgName,imgNum)
{
  if (versionButton == 3)
  {
   stop();
   current_image = imgNum;
   //display image
   document.animation.src = theImages[current_image-first_image].src;
   //display image number
   document.control_form.frame_nr.value = current_image;
    imgOn = eval(imgName + "on.src");
    document [imgName].src = imgOn;
  }
}
function img_inact(imgName)
{
  if (versionButton == 3)
  {
    imgOff = eval(imgName + "off.src");
    document [imgName].src = imgOff;
  }
}
// -->
//--------------------------------------------------------------
//End of Javascript slider code
//--------------------------------------------------------------
