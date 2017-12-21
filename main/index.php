<?php
    session_start();
 
    echo $_SESSION['name_of_user'] ;


?>
<!DOCTYPE html>
<head>
    <title>Melody</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />

    <!-- syntax highlighting CSS -->
    <link rel="stylesheet" href="css/syntax.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/verovio.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/midiplayer.css" /> 
    <link rel="stylesheet" href="css/main.css" /> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="javascript/jquery-1.7.2.js"></script>

    <script src="javascript/jquery.min.js" type="text/javascript"></script>
    <script src="javascript/jquery.touchSwipe.min.js" type="text/javascript"></script>
    <script src="javascript/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascript/bootstrap-contextmenu.js" type="text/javascript"></script>
    <script src="javascript/filesaver.min.js" type="text/javascript"></script>
    <script src="javascript/d3.min.js" type="text/javascript"></script>
    <script src="javascript/jquery.cookie.js" type="text/javascript"></script>
    <script src="//d3js.org/d3.v3.min.js"></script>
    <!-- verovio -->



    <!-- use this to increase the memory for verovio -->
    <!--<script src="http://www.verovio.org/javascript/develop/verovio-memory.js" type="text/javascript"></script>-->
    
    <!--<script src="http://www.verovio.org/javascript/develop/verovio-memory.js" type="text/javascript"></script>-->
    <script src="javascript/verovio-toolkit.js" type="text/javascript"></script>
    
    <!-- midi-player -->
    
    <script src="javascript/midi-player/wildwebmidi.js" type="text/javascript"></script>
    <script src="javascript/midi-player/midiplayer.js" type="text/javascript"></script>
    
    <!-- midi.js for playback in the editor -->
    
    <!-- pdf kit -->
    
    <script src="javascript/pdfkit/blobstream.js" type="text/javascript"></script>
    <script src="javascript/pdfkit/pdfkit.js" type="text/javascript"></script>
    <script src="javascript/pdfkit/source.js" type="text/javascript"></script>
    <script src="javascript/pdfkit/vrv-ttf.js" type="text/javascript"></script>
 

</head>

<body>

    <div class="loading container"> 
        <div class="circle"></div>
        <div class="circle1"></div>
    </div>

    <div class="row-offcanvas row-offcanvas-right">

        <script type="text/javascript">


        
//<![CDATA[
    var vrvToolkit = new verovio.toolkit();
    var page = 1;
    var zoom = 40;
    var pageHeight = 2970;
    var pageWidth = 2100;
    var spacingSystem = 2;
    var font = 'Leipzig';
    var swipe_pages = false;
    var format = 'mei';
    var outputFilename = 'output.mei'
    var ids = [];
    var pdfFormat = "A4";
    var pdfOrientation = "portrait";

    // new 
    var svgWidth;
    var svgHeight;

    var mei_data  
    var resX,resY;              
    var offest;
    var sectWidth;
    var resOffset;
    var minDist;
    var selBtn;
    var mainDt=[];
    var totElt;
    var offsetX;
    var offsetY;
    var count;
    var selUid;
    var mei;
    var tStuffs;
    var vStuffs;

    var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}





    // reload cookies
    if ( $.cookie('zoom') ) zoom = $.cookie('zoom');
    if ( $.cookie('font') ) font = $.cookie('font');
    if ( $.cookie('pdfFormat') ) pdfFormat = $.cookie('pdfFormat');
    if ( $.cookie('pdfOrientation') ) pdfOrientation = $.cookie('pdfOrientation');
    
    if ( $.cookie('fileName') ) zoom = $.cookie('fileName');



 

    var uniqueId = function() {
        var timestamp = new Date().getUTCMilliseconds();
        return 'Tag' + Math.random(timestamp).toString(36).substr(2, 16);
    };

    function findIndexById(uid){
        index=-1;
        for (i=0;i<mainDt.length;i++){
            if (mainDt[i][7]==uid){
                index=i;
                break;
            }
        }
        return index;
    }
    function addCloseBtn(mainElement, mx, my){
        var closeTag = mainElement.append("g");

        closeTag.append("circle")
            .attr("class","rm")
            .attr("cx",mx)
            .attr("cy",my)
            .attr("r",130)
            .attr("opacity","0.25")
            .style("cursor","pointer")
            .style("fill","blue");


        closeTag.append("line")
            .attr("x1", mx-50 )
            .attr("y1", my-50)           
            .attr("x2", mx+50 )
            .attr("y2", my+50)  
            .style ("stroke", "rgb(255,255,255)") 
            .style ("stroke-width", "20");
        closeTag.append("line")
            .attr("x1", mx+50 )
            .attr("y1", my-50)           
            .attr("x2", mx-50 )
            .attr("y2", my+50)  
            .style ("stroke", "rgb(255,255,255)") 
                
            .style ("stroke-width", "20");
            
         
        closeTag.on({//remove element
            "mouseover": function() { 
                closeBtn = this.children[0];
                $(closeBtn).attr('opacity','0.7');
            },
            "mouseout":  function() { 
                closeBtn = this.children[0];
                $(closeBtn).attr('opacity','0.1');            }, 
            "click":  function() {
                var res=$(this).parent().attr('id');
                index=-1;
                for ( i=0;i<mainDt.length;i++){
                    
                    if(mainDt[i][7]==res){
                        index=i;
                    }
                }

                if (index>-1){
                    console.log("removed");
                    console.log (res);
                    $(this).parent().remove();
                    mainDt.splice(index,1);
                    totElt--;            
                }else{
                    console.log("cant remove");
                    console.log (res);
                }
            }
        });
    }






    function calc_page_height() {
        return ($(document).height() - $( "#navbar" ).height() - 4) * 100 / zoom;
    }

    function calc_page_width() {
        return ($(".row-offcanvas").width()) * 100 / zoom ; // - $( "#sidbar" ).width();
    }


    
    function set_options( ) {
        pageHeight = calc_page_height();
        pageWidth = calc_page_width();
        border = 50;
        options = {
                    inputFormat: format,
                    pageHeight: pageHeight,
                    pageWidth: pageWidth,
                    border: border,
                    scale: zoom,
                    spacingSystem: spacingSystem,
                    adjustPageHeight: 1,
                    ignoreLayout: 1,
                    mmOutput: 0,
                    font: font
                };
        //console.log( options );
        vrvToolkit.setOptions( options );
    }

    function upload_file() {
        totElt=0;
        mainDt=[];
        $('#submit-btn').popover('hide');
        
        var f = $("#mei_files").prop('files')[0];
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            outputFilename = theFile.name;
            fileName= theFile.name;
            console.log(theFile.name);
            return function(e) {
                $('.row-offcanvas').toggleClass('active');
                load_data(e.target.result);
            };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsText(f);
        
    };

    function load_data(data) {

        //console.log(mainDT);
        set_options();
        $('.loading').show();
        console.time("loading");
        ////////////////////////
        mei_data=data;
        try {
            vrvToolkit.loadData(data);

            if (vrvToolkit.getPageCount() == 0) {
                $("#overlay").hide().css("cursor", "auto");
                log = vrvToolkit.getLog();
                $('#err').text(log).html();
                $('#errorDialog').modal();
            }
            else {
                $("#total_text").html(vrvToolkit.getPageCount());
                page = 1;
                load_page();
                $("#play-button").show();
                $("#pdf-button").show();
            }
        }
        catch(err) {
            $("#overlay").hide().css("cursor", "auto");
            $('#err').html(err);
            $('#errorDialog').modal();
        }
        console.timeEnd("loading");
        
        $('.loading').hide();
    }

    function load_page() {
        $("#overlay").hide().css("cursor", "auto");
        $("#jump_text").val(page);

        svg = vrvToolkit.renderPage(page, {});
        $("#svg_output").html(svg);

        adjust_page_height();

        $(".measure").each(function(){
           // console.log($(this).children());
        });
        svgWidth = $('svg').attr('width'); // $("#svg_output svg").children()[3].viewBox.baseVal.width;
        svgHeight =$('svg').attr('height'); // $("#svg_output svg").children()[3].viewBox.baseVal.height;
        tStuffs =  ((page == 1)? 0 : $('.mnum tspan')[0].innerHTML * 1 - 1) * $($('.measure')[0]).children('.staff').length;
        vStuffs = $($('.measure')[0]).children('.staff').length;
        selBtn=0;

        console.log(mainDt );

        // customized melody

        for (i=0;i<totElt;i++){
            try {  
                stf = parseInt(mainDt[i][1]/100)-tStuffs;
                note = mainDt[i][1]%100;
                if ( stf+1 > $('.staff').length ) continue;
                sectX = $($(".staff")[stf]).children('.layer').find('use')[note].getAttribute('x')*1.0;
                sectY = $($(".staff")[stf]).children('.layer').find('use')[note].getAttribute('y')*1.0;
                
            }catch(e){
                continue;
            }
            
            

  
            x1 = sectX + mainDt[i][2];
            y1 = sectY + mainDt[i][3];


            
            if (mainDt[i][0]==2){/////////////////////////////////////////////////////////////////////////<
                var cut = false;
                var secondVisible = true;
                try{
                    stf1 = parseInt(mainDt[i][4]/100)-tStuffs;
                    note1 = mainDt[i][4]%100;
                    sectX1 = $($(".staff")[stf1]).children('.layer').find('use')[note1].getAttribute('x')*1.0;
                    sectY1 = $($(".staff")[stf1]).children('.layer').find('use')[note1].getAttribute('y')*1.0;
                    x2 = sectX1 + mainDt[i][5]  ;
                    y2 = sectY1 + mainDt[i][3];
                    
                    gy1 = $($('.staff')[stf]).children('path')[0].getAttribute('d').split(' ')[1]; 
                    gy2 = $($('.staff')[stf1]).children('path')[0].getAttribute('d').split(' ')[1];

                    if ( (stf1-stf)*(x2-x1)>0 && gy1==gy2 ){
                        dx = x2-x1;
                        dy = 200;
                    }else{
                         cut = true;
                    }
                }catch(e){
                    cut = true;
                    secondVisible = false;
                }
                if (cut ){
                    docW=  $('svg svg.definition-scale')[0].getAttribute('viewBox').split(" ")[2]*1.0 ;
                    if ((stf1-stf)>0){
                        dx = -x1 + docW - 1000;
                        dx1 = -x1 + 1000 ;
                    }else{
                        dx = -x1 + 1000;
                        dx1 = -x1 + docW - 1000;
                    }
                    dy =100;
                }

                var mainTag =d3.select('#svg_output svg .page-margin')
                
                .append("svg")
                    .attr("id",mainDt[i][7])
                    .attr("x", x1 - 100000 )
                    .attr("y", y1 - 100000 )
                    .attr("width","200000")
                    .attr("height","200000")     

                mainTag.append("line")
                    .attr("class","line1")
                    .attr("x1", 100000)
                    .attr("y1", 100000)
                    .attr("x2", 100000+dx)
                    .attr("y2", 100000-dy)  
                    .style ("stroke", "rgb(255,0,0)") 
                    .style ("stroke-width", "30");
                mainTag.append("line")
                    .attr("class","line2")
                    .attr("x1", 100000)
                    .attr("y1", 100000)           
                    .attr("x2", 100000+dx)
                    .attr("y2", 100000+dy)  
                    .style ("stroke", "rgb(255,0,0)") 
                    .style ("stroke-width", "30");

                if (cut && secondVisible ){
                    mainTag.append("line")
                        .attr("class","line1")
                        .attr("x1", 100000 + (x2-x1))
                        .attr("y1", 100000 + (gy2-gy1)+dy*2)
                        .attr("x2", 100000 + dx1)
                        .attr("y2", 100000 + (gy2-gy1)+dy )  
                        .style ("stroke", "rgb(255,0,0)") 
                        .style ("stroke-width", "30");
                    mainTag.append("line")
                        .attr("class","line1")
                        .attr("x1", 100000 + (x2-x1))
                        .attr("y1", 100000 + (gy2-gy1)-dy*2)
                        .attr("x2", 100000 + dx1)
                        .attr("y2", 100000 + (gy2-gy1)-dy )  
                        .style ("stroke", "rgb(255,0,0)") 
                        .style ("stroke-width", "30");                        
                }

                addCloseBtn(mainTag,100000,100000);
                
                var drag = d3.behavior.drag()
                .on("dragstart", function(){
                    offsetX=0.1
                })
                .on("drag", function(){
                    if (offsetX==0.1){
                        offsetX=d3.event.x-$(this).attr('x');
                        offsetY=d3.event.y-$(this).attr('y');
                    }
                    d3.select(this)
                    .attr("x",  d3.event.x - offsetX )
                    .attr("y",  d3.event.y - offsetY );
                })
                .on("dragend", function(e){
                    tagName = $(this).attr('id');
                    index=findIndexById(tagName);
                    if (index>-1){
                        
                        mainDt[index][1]=offset;
                        mainDt[index][2]=svgX-resX - (offsetX - 100000);
                        mainDt[index][3]=svgY-resY - (offsetY - 100000);
                        console.log(offsetX);
                    }else{
                        console.log("cant drag");
                        console.log(tagName);
                    }
                });
                mainTag.call(drag);
            }

            if (mainDt[i][0]==3){ ///////////////////////////////////////////////////c
                var mainTag =d3.select('#svg_output svg .page-margin')
                .append("svg")
                    .attr("id",mainDt[i][7])
                    .attr("x", x1 )
                    .attr("y", y1 )
                    .attr("width","7000")
                    .attr("height","7000")
                    
                mainTag.append("text")
                    .attr("font-size", 400)
                    .attr("x", 400 )
                    .attr("y", 400 )
                    .style("fill", "red")
                    .style("cursor","pointer")
                    .text(mainDt[i][6])
                    
                    .on({//change
                        "mouseover": function() { 
                        },
                        "mouseout":  function() { 
                         }, 
                        "dblclick":  function() {
                            txt=prompt(this.innerHTML);
                            index=findIndexById(this.parentNode.getAttribute('id'));
                            if (index>-1){
                                this.innerHTML=txt;
                                mainDt[index][6]=txt;
                                console.log("changed comment");
                                console.log(mainDt[index]);
                            }else{
                                console.log("can't change")
                            }
                        }
                    });

                addCloseBtn(mainTag,200,200);
                               // drag and drop
                
                var drag = d3.behavior.drag()
                .on("dragstart", function(){
                    offsetX=0.1
                })
                .on("drag", function(){
                    if (offsetX==0.1){
                        offsetX=d3.event.x-$(this).attr('x');
                        offsetY=d3.event.y-$(this).attr('y');
                    }
                    d3.select(this)
                    .attr("x",  d3.event.x - offsetX )
                    .attr("y",  d3.event.y - offsetY );
                })
                .on("dragend", function(e){
                    tagName = $(this).attr('id');
                    index=findIndexById(tagName);
                    if (index>-1){
                        
                        mainDt[index][1]=offset;
                        mainDt[index][2]= svgX-resX - offsetX  ;
                        mainDt[index][3]= svgY-resY - offsetY;
                        console.log(mainDt[index]);
                    }else{
                        console.log("cant drag");
                        console.log(tagName);
                    }
                });
                mainTag.call(drag);
              

            }

            if (mainDt[i][0]==1){ ///////////////////////////////////////////////////p
                // console.log(mainDt[i]);
                var mainTag =d3.select('#svg_output svg .page-margin')
               
                .append("svg")
                   .attr("id",mainDt[i][7])
                   .attr("x", x1 )
                   .attr("y", y1 )
                   .attr("width","7000")
                   .attr("height","7000")
                   
                mainTag.append("text")
                   .attr("font-size", 500)
                   .attr("x", 125 )
                   .attr("y", 500 )
                   .style("fill", "red")
                   .style("font-style","italic")
                   .style("cursor","pointer")
                   .style("font-weight","bolder")
                   .text("p")
  
                addCloseBtn(mainTag,500,200);

                 


                // drag and drop
                
                var drag = d3.behavior.drag()
                    .on("dragstart", function(){
                        offsetX=0.1
                    })
                    .on("drag", function(){
                        if (offsetX==0.1){
                            offsetX=d3.event.x-$(this).attr('x');
                            offsetY=d3.event.y-$(this).attr('y');
                        }
                        d3.select(this)
                        .attr("x",  d3.event.x - offsetX )
                        .attr("y",  d3.event.y - offsetY );
                    })
                    .on("dragend", function(e){
                        tagName = $(this).attr('id');
                        index=findIndexById(tagName);
                        if (index>-1){
                            
                            mainDt[index][1] = offset;
                            mainDt[index][2] = svgX-resX - offsetX  ;
                            mainDt[index][3] = svgY-resY - offsetY;
                            console.log(mainDt[index]);
                        }else{
                            console.log("cant drag");
                            console.log(tagName);
                        }
                    });
                    mainTag.call(drag);

            }
        }

        for (i=0;i<totElt;i++){
            if (mainDt[i][0]==2){
                pStaffs =  parseInt($(".staff").length);
                stf1 = parseInt(mainDt[i][1]/100)-tStuffs;
                stf2 = parseInt(mainDt[i][4]/100)-tStuffs;
                console.log (stf1 + "-" + stf2 + pStaffs)
                if (stf2>0 && stf2<pStaffs){

                    note2 = mainDt[i][4]%100;
                    try{
                        sectX2 = $($(".staff")[stf2]).find('use')[note2].getAttribute('x')*1.0;
                        sectY2 = $($('.staff')[stf2]).children('path')[0].getAttribute('d').split(' ')[1]*1.0;
                    }catch(e){
                        continue;
                    }
                    x2 = sectX2 + mainDt[i][5];
                    y2 = sectY2 + 400 + mainDt[i][3]/Math.abs(mainDt[i][3])*700;
                    docW=  $('svg svg.definition-scale')[0].getAttribute('viewBox').split(" ")[2]*1.0 ;
                    
                    tail = false;                    
                    if (stf1<0){
                        tail = true;
                        tx = - x2 + 1000;
                    }
                    if (stf1>=pStaffs){
                        tail = true;
                        tx = - x2 + docW - 1000;
                    }

                    if (!tail) continue;

                    var mainTag =d3.select('#svg_output svg .page-margin')
                
                    .append("svg")
                        .attr("id",mainDt[i][7]+"tail")
                        .attr("x", x2 - 100000 )
                        .attr("y", y2 - 100000 )
                        .attr("width","200000")
                        .attr("height","200000")     

                    mainTag.append("line")
                        .attr("class","line1")
                        .attr("x1", 100000)
                        .attr("y1", 100000+200)
                        .attr("x2", 100000+tx)
                        .attr("y2", 100000+100)  
                        .style ("stroke", "rgb(255,0,0)") 
                        .style ("stroke-width", "30");
                    mainTag.append("line")
                        .attr("class","line2")
                        .attr("x1", 100000)
                        .attr("y1", 100000-200)           
                        .attr("x2", 100000+tx)
                        .attr("y2", 100000-100)  
                        .style ("stroke", "rgb(255,0,0)") 
                        .style ("stroke-width", "30");

                }
            }
        }

		console.log("loaded!!!");		
        //$("#save-btn").trigger("click");
        console.log("saved for sync");
    };
 
    function next_page() {
        if (page >= vrvToolkit.getPageCount()) {
            return;
        }

        page = page + 1;
        load_page();
    };

    function prev_page() {
        if (page <= 1) {
            return;
        }

        page = page - 1;
        load_page();
    };

    function first_page() {
        page = 1;
        load_page();
    };

    function last_page() {
        page = vrvToolkit.getPageCount();
        load_page();
    };

    function apply_zoom() {
        console.log("apply zoom");
        // make sure we have loaded a file
        
        if (vrvToolkit.getPageCount() == 0) return;
        
        $.cookie('zoom', zoom, { expires: 30 });
        
        set_options();
        var measure = 0;
        if (page != 1) {
            measure = $("#svg_output .measure").attr("id");
            console.log("measure:"+measure)
        }

        vrvToolkit.redoLayout();

        $("#total_text").html(vrvToolkit.getPageCount());
        page = 1;
        if (measure != 0) {
            page = vrvToolkit.getPageWithElement(measure);
            console.log("page:"+page)
        }

        load_page();
    }

    function zoom_out() {
        if (zoom < 20) {
            return;
        }

        zoom = zoom / 2;
        apply_zoom();
    }

    function zoom_in() {
        if (zoom > 80) {
            return;
        }

        zoom = zoom * 2;
        apply_zoom();
    }

    function do_page_enter(e) {
        key = e.keyCode || e.which;
        if (key == 13) {

            text = $("#jump_text").val();

            if (text <= vrvToolkit.getPageCount() && text > 0) {
                page = Number(text);
                load_page();
            } else {
                $("#jump_text").val(page);
            }

        }
		
    }

    function do_zoom_enter(e) {
        
        key = e.keyCode || e.which;
        if (key == 13) {
            text = $("#zoom_text").val();
            zoom_val = Number(text.replace("%", ""));
            if (zoom_val < 10) zoom_val = 10;
            else if (zoom_val > 160) zoom_val = 160;
            zoom = zoom_val;
            apply_zoom();
        }
    }

    function adjust_page_height() {
        // adjust the height of the panel
        if ( $('#svg_panel svg') ) {
            zoomed_height = pageHeight * zoom / 100;
            if ( zoomed_height < $('#svg_panel svg').height() ) {
                zoomed_height = $('#svg_panel svg').height();
            }
            $('#svg_output').height( zoomed_height ); // slighly more for making sure we have no scroll bar
            //$('#svg_panel svg').height(pageHeight * zoom / 100 );
            //$('#svg_panel svg').width(pageWidth * zoom / 100 );
        }

        // also update the zoom control
        $("#zoom_text").val(zoom + "%");

        // enable the swipe (or not)
        enable_swipe( ( $('#svg_panel svg') && ( $('#svg_panel svg').width() <= $('#svg_panel').width() ) ) );
    }

    function swipe_prev(event, direction, distance, duration, fingerCount) {
          //prev_page();
     }

     function swipe_next(event, direction, distance, duration, fingerCount) {
         //next_page();
     }

     function swipe_zoom_in(event, target) {
         //zoom_in();
     }

     function swipe_zoom_out(event, target) {
         //zoom_out();
     }

    function enable_swipe( pages ) {
        if ( pages && !swipe_pages ) {
            $("#svg_output").swipe( "destroy" );
            $("#svg_output").swipe( { swipeLeft: swipe_next, swipeRight: swipe_prev, tap: swipe_zoom_in, doubleTap: swipe_zoom_out, allowPageScroll:"auto"} );
            swipe_pages = true;
        }
        // zoom only
        else if ( !pages && swipe_pages ) {
            $("#svg_output").swipe( "destroy" );
            $("#svg_output").swipe( { tap: swipe_zoom_in, doubleTap: swipe_zoom_out, allowPageScroll:"auto"} );
            swipe_pages = false;
        }


	
    }

    function getParameterByName(name) {
        var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }

    function play_midi() {
        var base64midi = vrvToolkit.renderToMidi();
        var song = 'data:audio/midi;base64,' + base64midi;
        $("#player").show();
        $("#play-button").hide();
        $("#player").midiPlayer.play(song);
    }

    var midiUpdate = function(time) {
        var vrvTime = Math.max(0, time - 400);
        var elementsattime = vrvToolkit.getElementsAtTime(vrvTime);
        if (elementsattime.page > 0) {
            if (elementsattime.page != page) {
                page = elementsattime.page;
                load_page();
            }
            if ((elementsattime.notes.length > 0) && (ids != elementsattime.notes)) {
                ids.forEach(function(noteid) {
                    if ($.inArray(noteid, elementsattime.notes) == -1) {
                        $("#" + noteid ).attr("fill", "#000");
                        $("#" + noteid ).attr("stroke", "#000");
                        //$("#" + noteid ).removeClassSVG("highlighted");
                    }
                });
                ids = elementsattime.notes;
                ids.forEach(function(noteid) {
                    if ($.inArray(noteid, elementsattime.notes) != -1) {
                    //console.log(noteid);
                        $("#" + noteid ).attr("fill", "#c00");
                        $("#" + noteid ).attr("stroke", "#c00");;
                        //$("#" + noteid ).addClassSVG("highlighted");
                    }
                });
            }
        }
    }

    var midiStop = function() {
        ids.forEach(function(noteid) {
            $("#" + noteid ).attr("fill", "#000");
            $("#" + noteid ).attr("stroke", "#000");
            //$("#" + noteid ).removeClassSVG("highlighted");
        });
        $("#player").hide();
        $("#play-button").show();
    }

    $.fn.addClassSVG = function(className){
        $(this).attr('class', function(index, existingClassNames) {
            return existingClassNames + ' ' + className;
        });
        return this;
    };

    $.fn.removeClassSVG = function(className){
        $(this).attr('class', function(index, existingClassNames) {
            //var re = new RegExp(className, 'g');
            //return existingClassNames.replace(re, '');
        });
        return this;
    };
    
    function generate_pdf() {
        
        var pdfFormat = $("#pdfFormat").val();
        var pdfSize = [2100, 2970];
        if (pdfFormat == "letter") pdfSize = [2159, 2794];
        else if (pdfFormat == "B4") pdfSize = [2500, 3530];
        
        var pdfOrientation = $("#pdfOrientation").val();
        var pdfLandscape = pdfOrientation == 'landscape';
        var pdfHeight = pdfLandscape ? pdfSize[0] : pdfSize[1];
        var pdfWidth = pdfLandscape ? pdfSize[1] : pdfSize[0];
        
        var fontCallback = function(family, bold, italic, fontOptions) {
            if (family == "VerovioText") {
                return family;
            }
            if (family.match(/(?:^|,)\s*sans-serif\s*$/) || true) {
                if (bold && italic) {return 'Times-BoldItalic';}
                if (bold && !italic) {return 'Times-Bold';}
                if (!bold && italic) {return 'Times-Italic';}
                if (!bold && !italic) {return 'Times-Roman';}
            }
        };
    
        var options = {};
        options.fontCallback = fontCallback;
        
        var doc = new PDFDocument({useCSS: true, compress: true, autoFirstPage: false, layout: pdfOrientation}); 
        var stream = doc.pipe(blobStream());
        
        stream.on('finish', function() {
            var blob = stream.toBlob('application/pdf');
            var pdfFilename = fileName.replace(/\.[^\.]+$/, '.pdf');
            saveAs(blob, pdfFilename);
        });
        
        var buffer = Uint8Array.from(atob(vrvTTF), c => c.charCodeAt(0));
        doc.registerFont('VerovioText',buffer);  
        
        pdfOptions = {
                    pageHeight: pdfHeight,
                    pageWidth: pdfWidth,
                    border: 50,
                    scale: 100,
                    spacingSystem: spacingSystem,
                    adjustPageHeight: 0,
                    ignoreLayout: 1,
                    mmOutput: 1,
                    font: font
        }
        
        vrvToolkit.setOptions(pdfOptions);
        vrvToolkit.redoLayout();
        for (i = 0; i < vrvToolkit.getPageCount(); i++) {
            doc.addPage({size: pdfFormat, layout: pdfOrientation});
            SVGtoPDF(doc, vrvToolkit.renderPage(i + 1, {}), 0, 0, options);
        }        
        
        // Reset the options
        set_options();
        vrvToolkit.redoLayout();
        
        doc.end();
    }

//]]>
</script>

<!-- modal -->
<div class="modal fade" id="errorDialog" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"> </span></button>
                <h4 class="modal-title" id="myModalLabel">Error</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">Sorry, Verovio failed to process the MEI data</div>
                <div id="errDiv">
                    <pre id="err"></pre>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- sidebar -->
<div class="sidebar-offcanvas sidebar-right" id="sidebar" role="navigation">
    <div class="sidebar-panel">
        <div class="row">
            <div class="col-xs-12">
                <h4>Navigation</h4>
            </div>
        </div>
        <div class="row sidebar-row">
            <div class="col-xs-12">
                <button class="btn btn-default btn-sm pull-left popover-btn" type="button" data-container="body" data-toggle="popover" data-placement="left" data-content="On mobile devices, you can swipe left or right to change page and tap or double tap to zoom-in or zoom-out. On desktops, you can use [ctrl+] left or right arrows and +/- keys.">
                    <span class="glyphicon glyphicon-question-sign"/>
                </button>
            </div>
        </div>
        <div class="row sidebar-row">
            <div class="col-md-12">
                <p>
                    Go to page [1-<span id="total_text">1</span>]:
                </p>
                <div class="input-group input-group-sm" style="width: 20px;">
                    <span class="input-group-btn">
                        <button onclick="first_page()" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-fast-backward"/>
                        </button>
                        <button onclick="prev_page()" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-backward"/>
                        </button>
                    </span>
                    <input type="text" class="form-control" placeholder="0" id="jump_text" style="width: 45px !important;" onkeypress="do_page_enter(event)"/>
                    <span class="input-group-btn">
                        <button onclick="next_page()" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-forward"/>
                        </button>
                        <button onclick="last_page()" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-fast-forward"/>
                        </button>
                    </span>
                </div>
                <p></p>
                <p><em>(Swipe or click left- or right-key to change screen)</em></p>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <div class="row sidebar-row">
            <div class="col-md-6">
                <p>
                    Zoom:
                </p>
                <div class="input-group input-group-sm" style="width: 20px;">
                    <span class="input-group-btn">
                        <button onclick="zoom_out()" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-zoom-out"/>
                        </button>
                    </span>
                    <input type="text" class="form-control" style="width:60px !important;" placeholder="100%" id="zoom_text" onkeypress="do_zoom_enter(event)"/>
                    <span class="input-group-btn">
                        <button onclick="zoom_in()" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-zoom-in"/>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <div class="row sidebar-row">
            <div class="col-md-12">
                <p>
                    Font:
                </p>
            </div>
            <div class="col-md-12">
                <div>
                    <select class="form-control" id="fontSelect">
                        <option value="Leipzig">Leipzig</option>
                        <option value="Bravura">Bravura</option>
                        <option value="Gootville">Gootville</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-panel">
        <div class="row">
            <div class="col-xs-12">
                <h4>Show me</h4>
            </div>
        </div>
        <div id="downloads_panel_body">
            <div class="row">
                <div class="col-md-12">
                    
                    
                    
                </div>
                <!-- /.col-md-6 -->
            <!-- /.row -->
            </div>
        </div>
    </div>

    <div class="hidden-xs hidden-sm sidebar-panel">
        <div class="row">
            <div class="col-xs-12">
                <h4>Select MEI file</h4>
            </div>
        </div>

        <div id="options_panel_body">
            <form id="upload_form" onsubmit="upload_file( $('#upload_form') ); return false" class="form-inline" role="form">
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" id="mei_files" onchange="$('#submit-btn').popover('show');" name="file" style="margin: 4px 0px 8px 0px;"/>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" id="submit-btn" class="btn btn-default btn-sm popover-btn" data-container="body" data-toggle="popover" data-placement="left" data-content="Click to display the MEI file!" data-trigger="manual">Render</button>
                        <button type="button" id="save-btn" class="btn btn-default btn-sm popover-btn" data-container="body" data-toggle="popover" data-placement="left" data-content="Click to save all!" data-trigger="manual">Save</button>
                    </div>
				</div>
				
                


            </form>
		</div>
        <div id="insert_panel_body">
            <form id="save_mei" >
                <div class="row">
                    <div class="col-md-12">
 
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-success active btn-tools">
							<input type="radio" name="options" id="tool0" autocomplete="off" checked> +
							</label>
							<label class="btn btn-primary btn-tools">
							<input type="radio" name="options" id="tool1" autocomplete="off"> P
							</label>
							<label class="btn btn-primary btn-tools">
							<input type="radio" name="options" id="tool2" autocomplete="off"> <
							</label>
							<label class="btn btn-primary btn-tools">
							<input type="radio" name="options" id="tool3" autocomplete="off"> C
							</label>
					 	</div>

                    </div>
                    <div class="col-md-12">
                         
                    </div>
				</div>
				
                


            </form>
		</div>		

		
    </div>

    

</div>

<div id="page-content-wrapper">
    <!-- top navbar -->
    <div id="navbar" class="navbar navbar-default navbar-with-sidebar">
        <button type="button" class="navbar-toggle sidebar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
             <span class="icon-bar">        

            </span> 
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
        </button>
        <a class="" href="#">
            <img src='images/melody.png'>
        </a>
        <div class="btn-group">
            <button id="pdf-button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#pdfDialog" type="button" data-loading-text="Generating PDF..." style="display: none;">
                <span>PDF </span><span class="glyphicon glyphicon-book"/>
            </button>
            <button id="play-button" onclick="play_midi();" class="btn btn-sm btn-default" type="button" style="display: none;">
                <span class="glyphicon glyphicon-volume-up"/>Play
            </button>
            <button id="play-button" onclick="location.href='../logout.php'" class="btn btn-sm btn-default" type="button"  >
                logout
            </button>
        </div>

        <button type="button" id="mei_download" class="navbar-toggle menu-download" style="display: none;">
            <span class="glyphicon glyphicon-download"></span><span> MEI</span>
        </button>

        <div style="clear: both;"></div>
        <hr/>
    </div>

    <div id="svg_panel" style="background-color: #fff;">
        <div id="player" style="z-index: 20; position: absolute; display: none;"></div>
        <div id="svg_output" style="overflow:hidden;" />
    </div>
</div>

<div class="modal fade" id="pdfDialog" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4>PDF options</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="inputEmail3">Format</label>
                        <div>
                            <select class="form-control" id="pdfFormat">
                                <option value="A4">A4</option>
                                <option value="letter">Letter</option>
                                <option value="B4">B4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">Orientation</label>
                        <div>
                            <select class="form-control" id="pdfOrientation">
                                <option value="portrait">Portrait</option>
                                <option value="landscape">Landscape</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-warning" style="text-align:left;">
                    <strong>Warning!</strong> This is an experimental feature and it can take some time.
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="pdfOK" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
    $( document ).ready(function() {

        var version = vrvToolkit.getVersion();
        var n = version.lastIndexOf('-');
        var commit = version.substring(n + 1);



        $(window).keyup(function(event){
            // We need to make sure not to capture event on text fields
            if ( $(event.target).hasClass('form-control') ) {
                return;
            }
            if ( event.ctrlKey && (event.keyCode == 37) ) {
                first_page();
            }
            else if ( event.keyCode == 37 ) {
                prev_page();
            }
            else if ( event.ctrlKey && (event.keyCode == 39) ) {
                last_page();
            }
            else if ( event.keyCode == 39 ) {
                next_page();
            }
            else if ( event.keyCode == 107 ) {
                zoom_in();
            }
            else if ( event.keyCode == 109 ) {
                zoom_out();
            }
        });

        $(window).resize(function(){
            apply_zoom();
        });

        $( "#toggle_log" ).click(function() {
            log = !log;
            $( "#log_panel_body" ).toggle();
            // toggle icon
            $("span", this).toggleClass("glyphicon-chevron-down glyphicon-chevron-left");
        });

        $( "#mei_download" ).click(function() {
            //outputFilename = outputFilename.replace(/\.[^\.]+$/, '.mei');
            //saveAs(new Blob([vrvToolkit.getMEI(-1, true)], {type: "text/xml;charset=utf-8"}), outputFilename);
        });

        // Set the popover for the btn
        $( ".popover-btn" ).popover( );

        // Adjust the size of the svg_output and the zoom according to the div (screen) size
        width = $('#svg_panel').width();

        zoom = Math.min( Math.floor( 100 * width / 2100 ), zoom );

        // Init the swipe
        enable_swipe( true );

        // Load the default file or the file passed in the URL
        var file = getParameterByName("file");
        var musicxml = getParameterByName("musicxml");
        var local = getParameterByName("local");

        if (musicxml == "true") {
            format = 'musicxml';
            $("#mei_download").show();
        }

        if (local == "true") {
            data = localStorage.getItem("musicxml_file");
            outputFilename = localStorage.getItem("musicxml_filename");
            load_data( data );
        }
        else {
            console.log("loading first");
            
            $.ajax({
                url: 'save_mei2.php',
                type: 'post',
                data: {'action': 'read_recent'},
                success: function(dt, status) {
                    var res = JSON.parse(dt);
                    console.log(dt);


                    fileName=res[0];
                    data=res[1];
                    mainDt=[];
                    mainDt=JSON.parse(res[2]);
                    totElt=mainDt.length;
                    recentList=JSON.parse(res[3]);
                    $("#downloads_panel_body").empty();
                    
                    for (var i=0;i<recentList.length;i++){
                        console.log(recentList[i]);
                        $("#downloads_panel_body").append("<div class='row'><div class='col-md-12'><a href='#' id='showMe"+i+"'>"+recentList[i]+"</a></div></div>");
                        $('a#showMe'+i).click(function() {
                            fn=($(this).text());
                            $.ajax({
                                url: 'save_mei2.php',
                                type: 'post',
                                data: {'action': 'read_one','fn':fn},
                                success: function(dt, status) {
                                    var res_partal= JSON.parse(dt);
                                    fileName = res_partal[0];
                                    data = res_partal[1];
                                    mainDt = JSON.parse(res_partal[2]);
                                    totElt=mainDt.length;
                                    mei=res_partal[3];
                                    console.log("slkdfjklsdjflksdlkflskdflk");
                                    console.log(mei);
                                    load_data(data);
                                },
                                error: function (xhr, desc,err){
                                    console.log(xhr);
                                    console.log("Details: " + desc + "\nError:" + err);
                                }
                            
                            
                            });
                        });
                    }
                    load_data( data );
                    console.log(mainDt);
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            }); // end ajax call
            
/*
            if (!file || (file.length == 0)) {
                file = "downloads/v.mei";
                
            }
            $("#overlay").show();
            $.ajax({
                url: file
                , dataType: "text"
                , success: function(data) {
                    outputFilename = file.replace(/^.*[\\\/]/, '')
                    load_data( data );
                }
            });
*/            
            

        }
        $(".row-offcanvas").on('transitionend webkitTransitionEnd oTransitionEnd mozTransitionend MSTransitionEnd', function() { 
            if (pageWidth != calc_page_width()) {
                apply_zoom();   
            }
        });
        
        $("#player").midiPlayer({
            color: "#c00",
            onUnpdate: midiUpdate,
            onStop: midiStop,
            width: 250
        });
        
        $("#fontSelect").val(font);
        
        $("#fontSelect").change(function() {
            if (font == $(this).val()) return;
            console.log($(this).val());
            font = $(this).val();
            $.cookie('font', font, { expires: 30 });
            apply_zoom();
        });
        
        $("#pdfFormat").val(pdfFormat);
        $("#pdfOrientation").val(pdfOrientation);
        
        $('#pdfOK').click(function () {
            $('#pdfDialog').modal('hide');
            var pdfFormat = $("#pdfFormat").val();
            var pdfOrientation = $("#pdfOrientation").val();
            $.cookie('pdfFormat', pdfFormat, { expires: 30 });
            $.cookie('pdfOrientation', pdfOrientation, { expires: 30 });
            generate_pdf();
        });
    });
//]]>
</script>


    </div>



    <script type="text/javascript">
        //<![CDATA[
        
        var mouseDown = 0;
        var svgX0;
        var svgX0;
        var svgX1;
        var svgX1;      
        var offset0;
        var resX0;
        var resY0;

        $(document).ready(function() {
            
            totElt = 0  

            function getMeiElt(eX,eY,offsetOne){
                svgRate= parseFloat (pageWidth)/parseFloat(svgWidth)*10.0;
                svgX=eX*svgRate-500;
                svgY=eY*svgRate-500;
                fontSize=12*svgRate;

                minDist=-100;

                

                count = 0;
                offset = 0;
                //$('#staff-0000000269397575 .layer').children()[0].children[0]
                $('.staff').each(function(){  ///////////////////////////////////////////getting basic pixel
                    if (offsetOne>=0){
                        if (((count-parseInt(offsetOne*1/100))%vStuffs)!=0) {count++; return;}
                        console.log("----",vStuffs);
                    }
                    var basicID = this.getAttribute('id');

                    var sectNote = $("#" + basicID + " .layer").find("use")
                    for (var i = 0; i < sectNote.length; i++ ){
                        var nX = sectNote[i].getAttribute('x');
                        var nY = sectNote[i].getAttribute('y');
                        dist = (svgX*1.0-nX*1.0)*(svgX*1.0-nX*1.0)+(svgY*1.0-nY*1.0)*(svgY*1.0-nY*1.0);
                        
                        if (minDist<0 || dist<minDist){
                            offset = (count+tStuffs)*100 + i ;
                            console.log('offsetOne---', offsetOne)
                            console.log('offset---', offset)
                            minDist=dist;
                            resX = nX;
                            resY = nY;
                            
                        }
                    }

                    count++;

                    
                }); 
                
                console.log('offset', offset)



 
            }


            $('[data-toggle=offcanvas]').click(function() {
                $('.row-offcanvas').toggleClass('active');
            });
 
            
            $('.btn-tools').click(function(e){//element selection (tools)
                selBtn=$(this).children()[0].getAttribute('id').replace("tool","");
                console.log(selBtn);
            });
            
            $('#save-btn').click(function(e){
               if (totElt==0) mainDt=[];
               console.log (mainDt);
               console.log(totElt);

               var url = "save_mei2.php";
                
  
                $('.loading').show();
                $.ajax({
                    url: 'save_mei2.php',
                    type: 'post',
                    data: {'action': 'save',  'fn': fileName, 'mei':mei_data, 'edit':JSON.stringify(mainDt)},
                    success: function(dt, status) {
                        $('.loading').hide();
                        if(dt == "ok") {
                            //$('#followbtncontainer').html('<p><em>Following!</em></p>');
                            //var numfollowers = parseInt($('#followercnt').html()) + 1;
                            //$('#followercnt').html(numfollowers);
                            console.log("!!");

                        }
                        console.log(dt);
                    },
                    error: function(xhr, desc, err) {
                      console.log(xhr);
                      console.log("Details: " + desc + "\nError:" + err);
                    }
                  }); // end ajax call

            });

            $('#svg_output').mousedown(function(e){
                mouseDown = 1 ;
                getMeiElt(e.offsetX,e.offsetY,-1);
                
                 if (selBtn==0) return;
                 if (selBtn==2){ ///////////////////////////////////////////////////////////// <
                    svgRate= parseFloat (pageWidth)/parseFloat(svgWidth)*10.0;
                    svgX0=e.offsetX*svgRate-500;
                    svgY0=e.offsetY*svgRate-500;
                    selUid= uniqueId() ;
                    var mainTag =d3.select('#svg_output svg .page-margin')

                    .append("svg")
                        .attr("id",selUid)
                        .attr("x", svgX0-100000 )
                        .attr("y", svgY0-100000 )
                        .attr("width","200000")
                        .attr("height","200000")
 
                    mainTag.append("line")
                        .attr("class","line1")
                        .attr("x1", 100000)
                        .attr("y1", 100000)           
                        .attr("x2", 100000+300)
                        .attr("y2", 100000-100)  
                        .style ("stroke", "rgb(255,0,0)") 
                        .style ("stroke-width", "30");
                    mainTag.append("line")
                        .attr("class","line2")
                        .attr("x1", 100000)
                        .attr("y1", 100000)           
                        .attr("x2", 100000+300)
                        .attr("y2", 100000+100)  
                        .style ("stroke", "rgb(255,0,0)") 
                        .style ("stroke-width", "30");
                    offset0 = offset;
                    resX0= resX;
                    resY0= resY;
                    console.log("down");
                    console.log(offset0);
                    console.log(totElt);
                }
            })

            $('#svg_output').mousemove(function(e){

                svgRate= parseFloat (pageWidth)/parseFloat(svgWidth)*10.0;
                svgX1=e.offsetX*svgRate-500;
                svgY1=e.offsetY*svgRate-500;
                if (mouseDown && selBtn==2){  ///////////////////////////////////////////////////////// < dragging & drawing
                   dH= svgY1-svgY0;
                   dW= svgX1-svgX0; 
 
                d3.select('#svg_output svg .page-margin #'+selUid +' line.line1')
                .attr("x2", 100000+dW )
                .attr("y2", 100000+200 )
                .attr("x1", 100000)
                .attr("y1", 100000 );
                d3.select('#svg_output svg .page-margin #'+selUid +' line.line2')
                .attr("x2", 100000+dW )
                .attr("y2", 100000-200  )
                .attr("x1", 100000)
                .attr("y1", 100000 );

                    
                }

            });

 

            $('#svg_output').mouseup(function(e){
                mouseDown= 0 ;
                getMeiElt(e.offsetX,e.offsetY,-1);
                console.log("mouseup");
 
                
                if (selBtn==0) return;

                if (selBtn==2){  ////////////////////////////////////////////////////////////////////  <
 
                    svgRate= parseFloat (pageWidth)/parseFloat(svgWidth)*10.0;
                    getMeiElt(e.offsetX,(svgY0+500)/svgRate,offset0);
 
                    var mainTag =d3.select('#svg_output svg .page-margin #'+selUid);
                    addCloseBtn(mainTag,100000,100000);
                    
                    var schm2 = [2,offset0,svgX0-resX0,svgY0-resY0,offset,svgX-resX ,"",selUid];
                    totElt ++;
                    mainDt.push(schm2);//add element

                    //drag and drop  ////////////////////////....................    
                    var drag = d3.behavior.drag()
                    .on("dragstart", function(){
                        offsetX=0.1;
                        offsetY=0.1;
                    })
                    .on("drag", function(){
                        
                        if (offsetY==0.1){
                            offsetX= d3.event.x- $(this).attr('x') ;
                            offsetY= d3.event.y- $(this).attr('y') ;
                        }
                            d3.select(this)
                        .attr("y",  d3.event.y - offsetY )
                        .attr("x",  d3.event.x - offsetX );
            
                    })
                    .on("dragend", function(){
                        
                        tagName = $(this).attr('id');
                         
                        index= findIndexById(tagName);
                        
                        if (index>-1){
                            mainDt[index][1]=offset;
                            mainDt[index][2]=svgX-resX - (offsetX - 100000);;
                            mainDt[index][3]=svgY-resY - (offsetX - 100000);;


                            console.log(mainDt[index]);
                        }
            
                    });                 
                                   
                    mainTag.call(drag);

                }

                if (selBtn==3){  ////////////////////////////////////////////////////////////////////Content
                    uid= uniqueId() ;
                    var initialTxt="DbClick here!";
                    var mainTag =d3.select('#svg_output svg .page-margin')
                    .append("svg")
                        .attr("id",uid)
                        .attr("x", svgX-250 )
                        .attr("y", svgY-250 )
                        .attr("width","7000")
                        .attr("height","7000")
                        
                    mainTag.append("text")
                        .attr("font-size", 400)
                        .attr("x", 400 )
                        .attr("y", 400 )
                        .style("fill", "red")
                        .style("cursor","pointer")
                        .text(initialTxt)
                        
                        .on({//change
                            "mouseover": function() { 
                            },
                            "mouseout":  function() { 
                             }, 
                            "dblclick":  function() {
                                txt=prompt(this.innerHTML);
                                index=findIndexById(this.parentNode.getAttribute('id'));
                                if (index>-1){
                                    this.innerHTML=txt;
                                    mainDt[index][6]=txt;
                                    console.log("changed comment");
                                    console.log(mainDt[index]);
                                }else{
                                    console.log("can't change")
                                }
                            }
                        });

                    addCloseBtn(mainTag,200,200);
                    var schm3 = [3,offset,svgX-resX-250,svgY-resY-250,0,0,initialTxt,uid];
                    
                    totElt ++;
                    mainDt.push(schm3);//add element
                    
                    //drag and drop      
                    // drag and drop
                    
                    var drag = d3.behavior.drag()
                    .on("dragstart", function(){
                        offsetX=0.1
                    })
                    .on("drag", function(){
                        if (offsetX==0.1){
                            offsetX=d3.event.x-$(this).attr('x');
                            offsetY=d3.event.y-$(this).attr('y');
                        }
                        d3.select(this)
                        .attr("x",  d3.event.x - offsetX )
                        .attr("y",  d3.event.y - offsetY );
                    })
                    .on("dragend", function(e){
                        tagName = $(this).attr('id');
                        index=findIndexById(tagName);
                        if (index>-1){
                            
                            mainDt[index][1] = offset;
                            mainDt[index][2] = svgX-resX - offsetX ;
                            mainDt[index][3] = svgY-resY - offsetY;
                            console.log(mainDt[index]);
                        }else{
                            console.log("cant drag");
                            console.log(tagName);
                        }
                    });
                    mainTag.call(drag);     
                                    
                            
 
 
                }
                
                if (selBtn==1){  ////////////////////////////////////////////////////////////////////  P
                    
                    uid= uniqueId();

                    var mainTag =d3.select('#svg_output svg .page-margin')
                    
                    .append("svg")
                        .attr("id",uid )
                        .attr("x", svgX-250 )
                        .attr("y", svgY-250 )
                        .attr("width","7000")
                        .attr("height","7000")
                        
                    mainTag.append("text")
                        .attr("font-size", 500)
                        .attr("x", 125 )
                        .attr("y", 500 )
                        .style("fill", "red")
                        .style("font-style","italic")
                        .style("cursor","pointer")
                        .style("font-weight","bolder")
                        .text("p")
                         

                    addCloseBtn(mainTag,500,200);

                    var schm1 = [1,offset,svgX-resX-250,svgY-resY-250,0,0,"",uid];
                    
                    totElt ++;
                    mainDt.push(schm1);//add element

                    console.log(mainDt);




                    //drag and drop                     
                    var drag = d3.behavior.drag()
                    .on("dragstart", function(){
                        offsetX=0.1;
                        offsetY=0.1;
                    })
                    .on("drag", function(){
                        
                        if (offsetY==0.1){
                            offsetX= d3.event.x- $(this).attr('x') ;
                            offsetY= d3.event.y- $(this).attr('y') ;
                        }
                         d3.select(this)
                        .attr("y",  d3.event.y - offsetY )
                        .attr("x",  d3.event.x - offsetX );

                    })
                    .on("dragend", function(){
                        
                        tagName = $(this).attr('id');
                        svgX = $(this).attr('x');
                        svgY =  $(this).attr('y');
                      
                        index= findIndexById(tagName);
                        
                        if (index>-1){
                            mainDt[index][1]=offset;
                            mainDt[index][2]=svgX-resX - offsetX;
                            mainDt[index][3]=svgY-resY  ;
                            console.log(mainDt[index]);
                        }

                    });
                    
                    mainTag.call(drag);
                    
                }



                
                $("#tool0").trigger("click");
                
            })

            function make_editable(d, field)
            {
                console.log(d);
            }

        });



        //]]>

	</script>
	


</body>

</html>
