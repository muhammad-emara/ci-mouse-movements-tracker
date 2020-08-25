<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mouse Tracker</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.dataTables.css' ?>">


    <style>
  


        #sketch {
            width: 100%;
            height: 100vh;
            border: 1px solid gray;
            background-color: yellow;
        }


        #myimg {
            position: absolute;
            z-index: 1000;
        }


    </style>
</head>
<body>
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <h1 class="page-header">Output
            <small>Page</small>
            <div class="pull-right"><a href="<?php echo base_url() . 'MouseTrack/' ?>"
                                       class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Home Page</a>
            </div>
        </h1>
    </div>


    <div class="row">


        <div class="btn-group mr-2" role="group" aria-label="Controllers">
            <button type="button" id="btn-start-live" class="btn btn-lg btn-primary">Play Live</button>
           <!-- <button type="button" id="btn-play" class="btn  btn-lg btn-danger">play</button>-->
            <button type="button" id="btn-get-record" class="btn  btn-lg btn-info">Play Recording</button>
        </div>


    </div>
    <div class="row">
        <p>
            <span>Move the mouse over the div.</span>
            <span id="mouse-location">&nbsp;</span>
        </p>
        <div></div>


      

        <p id="demo"></p>


        <div id="sketch" class="box areabox"></div>
        <img src="https://cdn2.iconfinder.com/data/icons/freecns-cumulus/16/519641-142_Mouse-64.png" class="follow"
             id="myimg"/>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>


<script type="text/javascript">

</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<script>

    var mousepoint_recorded = [];
   
</script>




<script>
    


    $("#sketch").mousemove(function (e) {
        $('.follow').css({'top': e.clientY, 'left': e.clientX});
    });


    var xx = 0;                  //  set your counter to 1

 

</script>


<script type="text/javascript">
    $(document).ready(function () {

            //Enable recording
            $('#btn-start').on('click', function () {
                /*  $(this).toggleClass("btn-primary");*/
                recordign=true;

                console.log('Enable Recording...');
            });

            //Dis Enable recording
            $('#btn-stop').on('click', function () {
                /*  $(this).toggleClass("btn-primary");*/
                recordign=false;

                console.log('Disable Recording...');
            });

            $('#btn-get-record').on('click', function () {
                /*  $(this).toggleClass("btn-primary");*/
                recordign=false;

                console.log('Points saved...');

                console.log(mousepoint_recorded);

                var mousepointJson = JSON.stringify(mousepointJson);



                console.log(mousepointJson);


                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('MouseTrack/get_record')?>",
                    dataType: "JSON",
                    success: function (data) {
                        console.log('Data got');
                        console.log(data);
                     //   mousepoint = [];

                      //  mousepointJson

                        var jsonObj = $.parseJSON(data);

                        mousepoint_recorded = jsonObj;

                        console.log('Data Array is ');
                        console.log(jsonObj);
                        
                        if(mousepoint_recorded.length>0)
                        {
                            smiluatemovement(mousepoint_recorded);
                        }
                        
                    }
                });
                return false;
            });


        }
    );
    
    
    function smiluatemovement() {

        console.log('pointsarray Data Array is ');
        console.log(mousepoint_recorded);
        setTimeout(function () {   //  call a 3s setTimeout when the loop is called
            //   console.log('hello');
            //  your code here
            xx++;                    //  increment the counter

            //console.log("_clientX:- " + cx + ' _clientY:- ' + cy );
            if (xx < mousepoint_recorded.length) {           //  if the counter < 10, call the loop function
                let cy = mousepoint_recorded[xx]._clientY;
                let cx = mousepoint_recorded[xx]._clientX;

                console.log("_clientX:- " + cx + ' _clientY:- ' + cy);

             //   $("#mouse-location").first().text("( event.pageX, event.pageY ) : " + pageCoords);
                $("#mouse-location").last().text("( event.clientX, event.clientY ) : " + "(" + cx + ' ,' + cy+')');
                
                $('.follow').css({'top': cy, 'left': cx});


                smiluatemovement();            //  ..  again which will trigger another
            }                       //  ..  setTimeout()
        }, 100)
    }

</script>
</body>
</html>