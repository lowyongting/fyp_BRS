<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Recommender System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">
 
</head>
<body>
<?php
include("masterpage/navbar.php");
?>

                  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                          <li data-target="#myCarousel" data-slide-to="3"></li>
                          <li data-target="#myCarousel" data-slide-to="4"></li>
                          <li data-target="#myCarousel" data-slide-to="5"></li>
                      </ol>
                      
                        <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img class="" src="img/carousel/1.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive carousel-image" src="img/carousel/2.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive carousel-image" src="img/carousel/3.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive carousel-image"src="img/carousel/4.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive carousel-image" src="img/carousel/5.jpg">
                          </div>

                          <div class="item">
                            <img class="img-responsive carousel-image" src="img/carousel/6.jpg">
                          </div>
                      </div>
                  </div>


  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-1&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/1.jpg">
                  <hr>
                  Like A Love Song <br>
                  Rs 113  &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 175 </span>
                  <span class="label label-warning">35%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-2&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/2.jpg">
                  <hr>
                  General Knowledge 2017  <br>
                  Rs 68 &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 120 </span>
                  <span class="label label-warning">43%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-3&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/3.png">
                  <hr>
                  Indian Family Bussiness Mantras <br>
                  Rs 400 &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 595 </span>
                  <span class="label label-warning">33%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=NEW-4&category=new">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/4.jpg">
                  <hr>
                  Kiran s SSC Mathematics Chapterwise Solutions <br>
                  Rs 289 &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 435 </span>
                  <span class="label label-warning">33%</span>
              </div>
            </a>
          </div>
      </div>
  </div>

  <div class="container-fluid" id="author">
      <h3 style="color:#D67B22;"> POPULAR AUTHORS </h3>
      <div class="row">
          <div class="col-sm-5 col-md-3 col-lg-3">
              <a href="Author.php?value=Durjoy%20Datta"><img class="img-responsive center-block" src="img/popular-author/0.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block" src="img/popular-author/1.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block" src="img/popular-author/2.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block" src="img/popular-author/3.jpg"></a>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-5 col-md-3 col-lg-3">
              <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block" src="img/popular-author/4.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block" src="img/popular-author/5.jpg"><a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block" src="img/popular-author/6.jpg"></a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block" src="img/popular-author/7.jpg"></a>
          </div>
      </div>
  </div>

  <footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1">
              </div>
              <div class="col-sm-7 col-md-5 col-lg-5">
                  <div class="row text-center">
                      <h2>Let's Get In Touch!</h2>
                      <hr class="primary">
                      <p>Still Confused? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                  </div>
                  <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>123-456-6789</p>
                      </div>
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-envelope"></span>
                          <p>BookStore@gmail.com</p>
                      </div>
                  </div>
              </div>
              <div class="hidden-sm-down col-md-2 col-lg-2">
              </div>
              <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                  <h2 style="color:#D67B22;">Follow Us At</h2>
                  <div>
                      <a href="https://twitter.com/strandbookstore">
                      <img title="Twitter" alt="Twitter" src="img/social/twitter.png" width="35" height="35" />
                      </a>
                      <a href="https://www.linkedin.com/company/strand-book-store">
                      <img title="LinkedIn" alt="LinkedIn" src="img/social/linkedin.png" width="35" height="35" />
                      </a>
                      <a href="https://www.facebook.com/strandbookstore/">
                      <img title="Facebook" alt="Facebook" src="img/social/facebook.png" width="35" height="35" />
                      </a>
                      <a href="https://plus.google.com/111917722383378485041">
                      <img title="google+" alt="google+" src="img/social/google.jpg" width="35" height="35" />
                      </a>
                      <a href="https://www.pinterest.com/strandbookstore/">
                      <img title="Pinterest" alt="Pinterest" src="img/social/pinterest.jpg" width="35" height="35" />
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </footer>

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">Ask query</button>
  <!-- Modal -->
  <div class="modal fade" id="query" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ask your query here</h4>
          </div>
          <div class="modal-body">           
                    <form method="post" action="query.php" class="form" role="form">
                        <div class="form-group">
                             <label class="sr-only" for="name">Name</label>
                             <input type="text" class="form-control"  placeholder="Your Name" name="sender" required>
                        </div>
                        <div class="form-group">
                             <label class="sr-only" for="email">Email</label>
                             <input type="email" class="form-control" placeholder="abc@gmail.com" name="senderEmail" required>
                        </div>
                        <div class="form-group">
                             <label class="sr-only" for="query">Message</label>
                             <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Your Query" required></textarea>
                        </div>
                        <div class="form-group">
                              <button type="submit" name="submit" value="query" class="btn btn-block">
                                                              Send Query
                               </button>
                        </div>
                    </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>  
  </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>	