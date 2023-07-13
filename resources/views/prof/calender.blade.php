<!DOCTYPE html>
<html lang="en">
 
    <head>
 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Modal Video Tutorial</title>
 
        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
 
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
 
    </head>
 
    <body>

        <style>
            /***** Modal *****/
 
.modal-backdrop.in {
    filter: alpha(opacity=7);
    opacity: 0.7;
}
 
.modal-content {
    background: none;
    border: 0;
    -moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
}
 
.modal-body {
    padding: 0 25px 25px 25px;
}
 
.modal-header {
    padding: 25px 25px 15px 25px;
    text-align: right;
}
 
.modal-header, .modal-footer {
    border: 0;
}
 
.modal-header .close {
    float: none;
    margin: 0;
    font-size: 36px;
    color: #fff;
    font-weight: 300;
    text-shadow: none;
    opacity: 1;
}
.video-link {
    padding-top: 70px;
}
 
.video-link a:hover,
.video-link a:focus {
    outline: 0;
}
 
a .video-link-text {
    color: #fff;
    opacity: 0.8;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}
 
a:hover .video-link-text, 
a:focus .video-link-text {
    outline: 0;
    color: #fff;
    opacity: 1;
    border-bottom: 1px dotted #fff;
}
 
a .video-link-icon {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 50px;
    margin-right: 10px;
    background: #e89a3e;
    color: #fff;
    line-height: 50px;
    -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}
a .video-link-icon:after {
    position: absolute;
    content: "";
    top: -6px;
    left: -6px;
    width: 66px;
    height: 66px;
    background: #444;
    background: rgba(0, 0, 0, 0.1);
    z-index: -99;
    -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;
}
 
a:hover .video-link-icon,
a:focus .video-link-icon {
    outline: 0;
    background: #fff;
    color: #e89a3e;
}
        </style>
 
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
 
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Bootstrap Modal Video</h1>
                        <p>
                            Learn how to create this Bootstrap Modal video from the tutorial on <a href="https://azmind.com">AZMIND</a>. 
                            Then download and customize it as you like.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 video-link medium-paragraph">
                        <a href="#" class="launch-modal" data-modal-id="modal-video">
                            <span class="video-link-icon"><i class="fa fa-play"></i></span> 
                            <span class="video-link-text">Launch modal video</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 social">
                        <a href="http://www.facebook.com/pages/Azmindcom/196582707093191"><i class="fa fa-facebook"></i></a> 
                        <span class="divider-2"></span> 
                        <a href="http://twitter.com/anli_zaimi"><i class="fa fa-twitter"></i></a> 
                        <span class="divider-2"></span> 
                        <a href="https://plus.google.com/101131425868807087570"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
 
            </div>
        </div>
 
        <!-- MODAL -->
        <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/84910153?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=e89a3e"
                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

        <script>
            $('.launch-modal').on('click', function(e){
    e.preventDefault();
    $( '#' + $(this).data('modal-id') ).modal();
});
        </script>
 
    </body>


 
</html>