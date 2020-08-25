<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mouse Tracker</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.dataTables.css' ?>">


    <style>
        /*    div {
				width: 220px;
				height: 170px;
				margin: 10px 50px 10px 10px;
				background: yellow;
				border: 2px groove;
				float: right;
			}
			p {
				margin: 0;
				margin-left: 10px;
				color: red;
				width: 220px;
				height: 120px;
				padding-top: 70px;
				float: left;
				font-size: 14px;
			}
			span {
				display: block;
			}
	*/


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
        <h1 class="page-header">Input
            <small>Page</small>
            <div class="pull-right"><a href="<?php echo base_url() . 'MouseTrack/' ?>"
                                       class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Home Page</a>
            </div>
        </h1>
    </div>


    <div class="row">


        <div class="btn-group mr-2" role="group" aria-label="Controllers">
            <button type="button" id="btn-start" class="btn btn-lg btn-primary">Start</button>
            <button type="button" id="btn-stop" class="btn  btn-lg btn-danger">Stop</button>
            <button type="button" id="btn-save-record" class="btn  btn-lg btn-info">Record</button>
        </div>


    </div>
    <div class="row">
        <p>
            <span>Move the mouse over the div.</span>
            <span id="mouse-location">&nbsp;</span>
        </p>
        <div></div>


        <button onclick="myFunction()">Simulate the Mouse</button>

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

    var mousepoint = [];
    let recordign = false;

    //students.push({id:120,name:'Kshitij',age:20});

    //students.push({id:130,name:'Rajat',age:31});
</script>

<script>
    $("div").mousemove(function (event) {
        if (recordign) {

            var pageCoords = "( " + event.pageX + ", " + event.pageY + " )";


            var clientCoords = "( " + event.clientX + ", " + event.clientY + " )";

            mousepoint.push({_pageX: event.pageX, _pageY: event.pageY, _clientX: event.pageX, _clientY: event.pageY});

            $("#mouse-location").first().text("( event.pageX, event.pageY ) : " + pageCoords);
            $("#mouse-location").last().text("( event.clientX, event.clientY ) : " + clientCoords);
        }
    });
</script>


<script>
    function myFunction() {
        document.getElementById("demo").innerHTML = "";


        myLoop();


        for (i = 0; i < mousepoint.length; i++) {

            let cy = mousepoint[i]._clientY;
            let cx = mousepoint[i]._clientX;
            /*setTimeout(
			  function()
			  {
				//console.log("_pageX:- " + students[i]._pageX + ' _pageY:- ' + students[i]._pageY );
				//console.log("_clientX:- " + students[i]._clientX + ' _clientY:- ' + students[i]._clientY );
				console.log("_clientX:- " + cx + ' _clientY:- ' + cy );
			
			 $('.follow').css({'top': cy - 20, 'left': cx - 20});
			  }, 5000);*/


        }
        console.log('DONE');

    }


    $("#sketch").mousemove(function (e) {
        $('.follow').css({'top': e.clientY, 'left': e.clientX});
    });


    var x = 0;                  //  set your counter to 1

    function myLoop() {         //  create a loop function
        setTimeout(function () {   //  call a 3s setTimeout when the loop is called
         //   console.log('hello');
            //  your code here
            x++;                    //  increment the counter

            //console.log("_clientX:- " + cx + ' _clientY:- ' + cy );
            if (x < mousepoint.length) {           //  if the counter < 10, call the loop function
                let cy = mousepoint[x]._clientY;
                let cx = mousepoint[x]._clientX;

                console.log("_clientX:- " + cx + ' _clientY:- ' + cy);
                $('.follow').css({'top': cy, 'left': cx});


                myLoop();             //  ..  again which will trigger another
            }                       //  ..  setTimeout()
        }, 100)
    }


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

            $('#btn-save-record').on('click', function () {
                /*  $(this).toggleClass("btn-primary");*/
                recordign=false;

                console.log('Points saved...');

                console.log(mousepoint);

                var mousepointJson = JSON.stringify(mousepoint);

               

                console.log(mousepointJson);


                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('MouseTrack/save_record')?>",
                    dataType: "JSON",
                    data:{mousepointJson: mousepointJson},
                    success: function (data) {
                        console.log('Data saved');
                        console.log(data);
                        mousepoint = [];
                    }
                });
                return false;
            });
            
        
    }
        );

</script>
</body>
</html>