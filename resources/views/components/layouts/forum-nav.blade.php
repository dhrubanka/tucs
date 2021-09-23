git checkout <!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">      
        <link rel="stylesheet" href="/css/styles2.css">
        <!-- Styles -->
        <link href="{{ asset('css/forum.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="row">
            <nav class="navbar navbar-dark navbar-expand-md fixed-top">

                <button class="btn col-1 col-md-1" type="button" id="b1" onclick="navToggle()">
                    <i class="fas fa-angle-double-right" id="sideMenuIcon"></i>
                </button>    
        
                <a class="navbar-brand col-2 col-md-1" href="/forum">FORUM</a>

                <div class="col-8 offset-md-2 col-md-4">
                    <form class="form-inline">
                        <input class="form-control" type="text" placeholder="&#xf075; Search" style="font-family: FontAwesome;">
                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                      </form> 
                </div>

            </nav>
        </div>

        <div class="row">

            <div class="col-4 col-md-2" id="side_bar">
                
                <div id="side_menu">
                    <div style="margin-top: 150px;">
                        <a class="elements" href="/"><i class="fa fa-home"></i><span>HOME</span></a>
                        <a class="elements" href="#"><i class="fa fa-info"></i><span>ABOUT</span></a>
                        <a class="elements" href="#"><i class="fa fa-tasks"></i><span>EVENTS</span></a>
                        <a class="elements" href="#"><i class="fas fa-award"></i><span>AWARDS</span></a>
                        <a class="elements" href="/blog"><i class="fas fa-blog"></i><span>BLOG</span></a>    
                        <a class="elements" href="/forum"><i class="fa fa-comments"></i><span>FORUM</span></a>    
                        <a class="elements" href="#"><i class="fas fa-address-card"></i><span>CONTACT</span></a>    
                    </div>
                </div>

            </div>

            {{ $slot }}    

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function navToggle(){
                var side_menu = document.getElementById("side_menu");
                var elements = document.getElementsByClassName("elements");
                var side_menu_icon = document.getElementById("sideMenuIcon");

                if(side_menu.style.width == "50px"){
                    side_menu.style.width = "200px";
                    for(var i=0; i<elements.length; i++) {
                        elements[i].style.display = "block";
                    }
                    side_menu_icon.classList.remove("fa-angle-double-right");
                    side_menu_icon.classList.add("fa-angle-double-left");
                }
                else{
                    side_menu.style.width = "50px";
                    for(var i=0; i<elements.length; i++) {
                        elements[i].style.display = "none";
                    }
                    side_menu_icon.classList.remove("fa-angle-double-left");
                    side_menu_icon.classList.add("fa-angle-double-right");
                }
          
            }

        </script>
    </body>
</html>