<section id="slider" class="slider fullwidthbanner-container roundedcorners">
    <!--
        Navigation Styles:
        
            data-navigationStyle="" theme default navigation
            
            data-navigationStyle="preview1"
            data-navigationStyle="preview2"
            data-navigationStyle="preview3"
            data-navigationStyle="preview4"
            
        Bottom Shadows
            data-shadow="1"
            data-shadow="2"
            data-shadow="3"
            
        Slider Height (do not use on fullscreen mode)
            data-height="300"
            data-height="350"
            data-height="400"
            data-height="450"
            data-height="500"
            data-height="550"
            data-height="600"
            data-height="650"
            data-height="700"
            data-height="750"
            data-height="800"
    -->
    <div class="fullwidthbanner" data-height="550" data-navigationStyle="">
        <ul class="hide">

            <!-- SLIDE  -->
            <li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">

                <img src="{{request()->root()}}/public/assets/images/_smarty/1x1.png" data-lazyload="{{ request()->root() }}/public/assets/images/slides/slide1.jpg" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />

                <div class="overlay dark-3"><!-- dark overlay [1 to 9 opacity] --></div>

                <div class="tp-caption customin ltl tp-resizeme text_white"
                    data-x="center"
                    data-y="105"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1000"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 10;">
                    <span class="fw-300">مرحبا بكم في الموقع الرسمي</span>
                </div>

                <div class="tp-caption customin ltl tp-resizeme large_bold_white"
                    data-x="center"
                    data-y="155"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1200"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 10;">
                    المؤسسة المدنية الخيرية للتنمية
                </div>

                {{-- <div class="tp-caption customin ltl tp-resizeme small_light_white"
                    data-x="center"
                    data-y="245"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1400"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 10; width: 100%; max-width: 750px; white-space: normal; text-align:center; font-size:20px;">
                    مرحبا بكم في شركة ريل باث للخدمات المحدودة، نتطلع لجعل حياتكم أفضل. <br /> فقط قم باختيار ما يناسبك من الخدمات التي تقدمها الشركة.
                </div> --}}

                <div class="tp-caption customin ltl tp-resizeme"
                    data-x="center"
                    data-y="313"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1550"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 10;">
                    <a href="{{ request()->root() }}/page/4" class="btn btn-default btn-lg">
                        <span>من نحن؟</span> 
                    </a>
                </div>

            </li>

            <!-- SLIDE -->
            {{-- <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">

                <img src="{{request()->root()}}/public/assets/images/_smarty/1x1.png" data-lazyload="demo_files/images/video/neuron.jpg" alt="video" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">

                <div class="tp-caption tp-fade fadeout fullscreenvideo"
                    data-x="0"
                    data-y="0"
                    data-speed="1000"
                    data-start="1100"
                    data-easing="Power4.easeOut"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1500"
                    data-endeasing="Power4.easeIn"
                    data-autoplay="true"
                    data-autoplayonlyfirsttime="false"
                    data-nextslideatend="true"
                    data-volume="mute" 
                    data-forceCover="1" 
                    data-aspectratio="16:9" 
                    data-forcerewind="on" style="z-index: 2;">

                    <video class="" preload="none" width="100%" height="100%" poster="demo_files/images/video/neuron.jpg">
                        <source src="demo_files/images/video/neuron.webm" type="video/webm" />
                        <source src="demo_files/images/video/neuron.mp4" type="video/mp4" />
                    </video>

                </div>

                <div class="tp-caption customin ltl tp-resizeme text_white"
                    data-x="center"
                    data-y="105"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1000"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 3;">
                    <span class="fw-300">DEVELOPMENT / MARKETING / DESIGN / PHOTO</span>
                </div>

                <div class="tp-caption customin ltl tp-resizeme large_bold_white"
                    data-x="center"
                    data-y="155"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1200"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 3;">
                    WELCOME TO SMARTY
                </div>

                <div class="tp-caption customin ltl tp-resizeme small_light_white font-lato"
                    data-x="center"
                    data-y="245"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1400"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 3; width: 100%; max-width: 750px; white-space: normal; text-align:center; font-size:20px;">
                    Fabulas definitiones ei pri per recteque hendrerit scriptorem in errem scribentur mel fastidii propriae philosophia cu mea.
                </div>

                <div class="tp-caption customin ltl tp-resizeme"
                    data-x="center"
                    data-y="313"
                    data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1550"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 3;">
                    <a href="#purchase" class="btn btn-default btn-lg">
                        <span>Purchase Smarty Now</span> 
                    </a>
                </div>

            </li> --}}

        </ul>
        <div class="tp-bannertimer"></div>
    </div>
</section>
