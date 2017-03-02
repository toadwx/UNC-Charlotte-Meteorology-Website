// <!--
//============================================================
//                >> jsImagePlayer 1.0 <<
//            for Netscape3.0+, September 1996
//============================================================
//                  by (c)BASTaRT 1996
//             Praha, Czech Republic, Europe
//
// feel free to copy and use as long as the credits are given
//          by having this header in the code
//
//          contact: xholecko@sgi.felk.cvut.cz
//          http://sgi.felk.cvut.cz/~xholecko
//
//============================================================
// Thanx to Karel & Martin for beta testing and suggestions!
//============================================================
//
//   Modified by:  Dave Watson and A. Earnhart (CSU/CIRA), 07/30/97
//                 Audrey Wakefield (NRL Monterey), 09/02/98
//                 John Kent (NRL Monterey), 08/10/99
//     		   Greg Thompson (NCAR/RAP), 05/07/00
//                 Brian McNoldy (CSU/CIRA), 12/07/00
//
//============================================================
//   This script is used extensively at PSU for their E-Wall,
//   which is where we found it to use here at UNC Charlotte. Thx
//============================================================
 
//********* SET UP THESE VARIABLES - MUST BE CORRECT!!!*****************

modImages = new Array();
modImages[0] = "img/TR0_42.gif";
modImages[1] = "img/TR0_43.gif";
modImages[2] = "img/TR0_44.gif";
modImages[3] = "img/TR0_45.gif";
modImages[4] = "img/TR0_46.gif";
modImages[5] = "img/TR0_47.gif";
modImages[6] = "img/TR0_48.gif";
modImages[7] = "img/TR0_49.gif";
modImages[8] = "img/TR0_50.gif";
modImages[9] = "img/TR0_51.gif";
modImages[10] = "img/TR0_52.gif";
modImages[11] = "img/TR0_53.gif";
modImages[12] = "img/TR0_54.gif";
modImages[13] = "img/TR0_55.gif";
modImages[14] = "img/TR0_56.gif";
modImages[15] = "img/TR0_57.gif";
modImages[16] = "img/TR0_58.gif";
modImages[17] = "img/TR0_59.gif";
modImages[18] = "img/TR0_60.gif";
modImages[19] = "img/TR0_61.gif";
modImages[20] = "img/TR0_62.gif";
modImages[21] = "img/TR0_63.gif";
modImages[22] = "img/TR0_64.gif";
modImages[23] = "img/TR0_65.gif";
modImages[24] = "img/TR0_66.gif";
modImages[25] = "img/TR0_67.gif";
modImages[26] = "img/TR0_68.gif";
modImages[27] = "img/TR0_69.gif";
modImages[28] = "img/TR0_70.gif";
modImages[29] = "img/TR0_71.gif";
modImages[30] = "img/TR0_72.gif";
modImages[31] = "img/TR0_73.gif";
modImages[32] = "img/TR0_74.gif";

first_image = 0;
last_image = 32;
//**************************************************************************
 
//=== THE CODE STARTS HERE - no need to change anything below ===
 
//=== global variables ====
theImages = new Array();      //holds the images
imageNum = new Array();       //keeps track of which images to omit from loop
normal_delay = 300;
delay = normal_delay;         //delay between frames in 1/100 seconds
delay_step = 50;
delay_max = 4000;
delay_min = 50;
dwell_multipler = 3;
dwell_step = 1;
end_dwell_multipler   = dwell_multipler;
start_dwell_multipler = dwell_multipler;
current_image = first_image;     //number of the current image
timeID = null;
status = 0;                      // 0-stopped, 1-playing
play_mode = 0;                   // 0-normal, 1-loop, 2-sweep
size_valid = 0;
 
//===> Make sure the first image number is not bigger than the last image number
if (first_image > last_image)
{
   var help = last_image;
   last_image = first_image;
   first_image = help;
}
 
//===> Preload the first image (while page is downloading)
   theImages[0] = new Image();
   theImages[0].src = modImages[0];
   imageNum[0] = true;
 
//==============================================================
//== All previous statements are performed as the page loads. ==
//== The following functions are also defined at this time.   ==
//==============================================================
 
//===> Stop the animation
function stop()
{
   //== cancel animation (timeID holds the expression which calls the fwd or bkwd function) ==
   if (status == 1)
      clearTimeout (timeID);
   status = 0;
}
 
 
//===> Display animation in fwd direction in either loop or sweep mode
function animate_fwd()
{
   current_image++;                      //increment image number
 
   //== check if current image has exceeded loop bound ==
   if (current_image > last_image) {
      if (play_mode == 1) {              //fwd loop mode - skip to first image
         current_image = first_image;
      }
      if (play_mode == 2) {              //sweep mode - change directions (go bkwd)
         current_image = last_image;
         animate_rev();
         return;
      }
   }
 
   //== check to ensure that current image has not been deselected from the loop ==
   //== if it has, then find the next image that hasn't been ==
   while (imageNum[current_image-first_image] == false) {
         current_image++;
         if (current_image > last_image) {
            if (play_mode == 1)
               current_image = first_image;
            if (play_mode == 2) {
               current_image = last_image;
               animate_rev();
               return;
            }
         }
   }
 
   document.animation.src = theImages[current_image-first_image].src;   //display image onto screen
   document.control_form.frame_nr.value = current_image;                //display image number
   delay_time = delay;
   if ( current_image == first_image) delay_time = start_dwell_multipler*delay;
   if (current_image == last_image)   delay_time = end_dwell_multipler*delay;
   //== call "animate_fwd()" again after a set time (delay_time) has elapsed ==
   timeID = setTimeout("animate_fwd()", delay_time);
}
 
 
//===> Display animation in reverse direction
function animate_rev()
{
   current_image--;                      //decrement image number
 
   //== check if image number is before lower loop bound ==
   if (current_image < first_image) {
     if (play_mode == 1) {               //rev loop mode - skip to last image
        current_image = last_image;
     }
     if (play_mode == 2) {
        current_image = first_image;     //sweep mode - change directions (go fwd)
        animate_fwd();
        return;
     }
   }
 
   //== check to ensure that current image has not been deselected from the loop ==
   //== if it has, then find the next image that hasn't been ==
   while (imageNum[current_image-first_image] == false) {
         current_image--;
         if (current_image < first_image) {
            if (play_mode == 1)
               current_image = last_image;
            if (play_mode == 2) {
               current_image = first_image;
               animate_fwd();
               return;
            }
         }
   }
 
   document.animation.src = theImages[current_image-first_image].src;   //display image onto screen
   document.control_form.frame_nr.value = current_image;                //display image number
   delay_time = delay;
   if ( current_image == first_image) delay_time = start_dwell_multipler*delay;
   if (current_image == last_image)   delay_time = end_dwell_multipler*delay;
   //== call "animate_rev()" again after a set amount of time (delay_time) has elapsed ==
   timeID = setTimeout("animate_rev()", delay_time);
}
 
 
//===> Changes playing speed by adding to or substracting from the delay between frames
function change_speed(dv)
{
   delay+=dv;
   //== check to ensure max and min delay constraints have not been crossed ==
   if(delay > delay_max) delay = delay_max;
   if(delay < delay_min) delay = delay_min;
}
 
//===> functions that changed the dwell rates.
function change_end_dwell(dv) {
   end_dwell_multipler+=dv;
   if ( end_dwell_multipler < 1 ) end_dwell_multipler = 0;
   }
 
function change_start_dwell(dv) {
   start_dwell_multipler+=dv;
   if ( start_dwell_multipler < 1 ) start_dwell_multipler = 0;
   }
 
//===> Increment to next image
function incrementImage(number)
{
   stop();
   //== if image is last in loop, increment to first image ==
   if (number > last_image) number = first_image;
   //== check to ensure that image has not been deselected from loop ==
   while (imageNum[number-first_image] == false) {
         number++;
         if (number > last_image) number = first_image;
   }
   current_image = number;
   document.animation.src = theImages[current_image-first_image].src;   //display image
   document.control_form.frame_nr.value = current_image;                //display image number
}
 
//===> Decrement to next image
function decrementImage(number)
{
   stop();
   //== if image is first in loop, decrement to last image ==
   if (number < first_image) number = last_image;
   //== check to ensure that image has not been deselected from loop ==
   while (imageNum[number-first_image] == false) {
         number--;
         if (number < first_image) number = last_image;
   }
   current_image = number;
   document.animation.src = theImages[current_image-first_image].src;   //display image
   document.control_form.frame_nr.value = current_image;                //display image number
}
//===> "Play forward"
function fwd()
{
   stop();
   status = 1;
   play_mode = 1;
   animate_fwd();
}
//===> "Play reverse"
function rev()
{
   stop();
   status = 1;
   play_mode = 1;
   animate_rev();
}
//===> "play sweep"
function sweep() {
   stop();
   status = 1;
   play_mode = 2;
   animate_fwd();
   }
//===> Change play mode (normal, loop, swing)
function change_mode(mode)
{
   play_mode = mode;
}
//===> Load and initialize everything once page is downloaded (called from 'onLoad' in <BODY>)
function launch()
{
   for (var i = first_image + 1; i <= last_image; i++)
   {
      theImages[i-first_image] = new Image();
      theImages[i-first_image].src = modImages[i-first_image];
      imageNum[i-first_image] = true;
      document.animation.src = theImages[i-first_image].src;
      document.control_form.frame_nr.value = i;
   }
   // this needs to be done to set the right mode when the page is manually reloaded
   change_mode (1);
   fwd();
}
//===> Check selection status of image in animation loop
function checkImage(status,i)
{
   if (status == true)
      imageNum[i] = false;
   else imageNum[i] = true;
}
//==> Empty function - used to deal with image buttons rather than HTML buttons
function func()
{
}
//===> Sets up interface - this is the one function called from the HTML body
function animation()
{
  count = first_image;
}
 
// -->
