<!DOCTYPE html>
<html lang="en">
<head>
  <title>Post Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="style.css" type="text/css" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Adding the icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

      <!-- Collapsable Navbar -->
 <nav class="navbar navbar-expand-md bg-white">
    <a class="navbar-brand mb-n4 mr-auto" href="#">
		<img class="rounded-lg" src="images/trust_people.png" alt="Logo">
    <div class="logo">
      <p class="d-flex justify-content-end small">as Individual</p>
    </div>
    </a>
    <div class="">
      <ul class="navbar-nav">
        <!-- <li class="nav-item align-self-center mx-2">
          <a class="nav-link" href="#">Home</a>
        </li> -->
      <div class="navbar-link">
      <div class="for-enterprise">
        <li class="nav-item align-self-center mr-5 mt-2">
          <a class="nav-link align-self-center" href="#">For Enterprise</a>
        </li>
      </div>
      </div>
		<li class="nav-item align-self-center mx-1">
			<a class="nav-link" href="profile.php">
				<img src="images/steven.jfif">
			</a>
		</li>
    <div class="navbar-name">
    <div class="navbar-profile-name">
      <li class="nav-item align-self-center mt-2">
        <a class="nav-link align-self-center" href="#">Steven Zhang</a>
      </li>
    </div>
    </div>
    <!-- <div class="navbar-more">
      <li class="nav-item align-self-center mt-2">
        <a class="nav-link align-self-center" href="#"> Steven</a>
      </li>
    </div>   -->
      </ul>
    </div>  
  </nav>
  
<br>
<br>

<!-- Container for search bar and profile icon -->
  <div class="container-fluid ">
    <div class="row">
        <div class ="col-7">
            <div class="heading">
                <h6 class="ml-5">Analysis  |  Occassion  |  Role  |  Date</h6>
            </div>
        </div>
       <!-- Search Bar and Profile Icon      -->
        <div class="col-3">
            <form class="form-inline d-flex justify-content-center md-form form-sm my-1 ">
                <input class="form-control form-control-sm mr-3 w-20 rounded-lg" type="text" placeholder="Search" aria-label="Search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </form> 
        </div>
        <div class="col-2">
            <a class="post-now" href="#">
                <div class="row">
                    <i class="fa fa-pencil mr-2 mt-2"> </i>
                    <h6 class="mt-1"> | Post Now </h6>
                </div>
            </a>
        </div>
    </div>
  </div>

<br>

<hr class="line">

<br>


 <!-- Vue Information -->
  <div id="app">


 
  <!-- Post Card -->
  <div class="container p-3 my-3 " v-for="posts in posts">
  <div class="post-card">
            <div class="row">
                <div class="col-4">

                </div>
                <div class="col-2">
                    <div class="user-info">
                        <h6>Role:</h6>
                        <p>Software Engineer</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="user-info">
                        <h6>Location:</h6>
                        <p>Texas</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="user-info">
                        <h6>Date Discussed:</h6>
                        <p>10-Jan-2020</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="user-info">
                        <h6>Attachment:</h6>
                        <p>Resume.pdf</p>
                    </div>
                </div>
            </div>  
      
	  <div class="row">
		<div class="col-2">
			<div class="row">
                <img src="uploads/steven.jfif" alt="Avatar" class="d-flex justify-content-center mb-2 ml-5">
            </div>
            <div class="row">
                 <button class="btn btn-info d-flex justify-content-center ml-5" @click="followAlert()">Follow</button>
            </div>
		</div>
		<div class="col-7 align-self-center">
			<div class="row">
				<h5>{{ posts.post_title }}</h5>
			</div>
			<div class="row">
				<h4 class="mr-3 small font-weighter-light text-secondary">{{ posts.post_person }}</h4>
				<div class="date">
					<h4 class="small font-weighter-light text-secondary">{{ posts.post_date }}</h4>
				</div>
			</div>
			<div class="row">
				<p>
					{{ posts.post_content}}
				</p>
			</div>
      <div class="row">
        <div class="hash-tag mr-auto">
          <a href="#">#blackout</a>
          <a href="#">#texas</a>
          <a href="#">#Vdart</a>
        </div>
      </div>
		</div>
		<div class="col-3">
      <div class="reaction">
			<div class="row ml-1">
				<button type="button" @click="incrementAgree();" class="btn btn-outline-light text-dark px-4 mb-2">
					<div class="row">
            <div class="trustworthy ">
              <h6 class="mr-2 d-inline">{{ agreeVal }}</h6>
              <h7 class="d-inline">Yes. I am with you</h7>
            </div>
					</div>
                </button>
			</div>
			<div class="row ml-1">
				<button type="button" @click="incrementSimilar();" class="btn btn-outline-light text-dark px-4 mb-2">
					<div class="row">
          <div class="untrustworthy">
						<h6 class="mr-2 d-inline">{{ similarVal }}</h6>
						<h7 class="d-inline">I have a similiar experience</h7>
          </div>
					</div>
				</button>
			</div>
      
			<div class="row">
        <div class="col-4">
          <button type="button" class="btn btn-outline-light text-dark px-4 mb-2">
            <div class="row">
            <div class="comment">
              <h6 class="mr-2 d-inline">{{ commentVal }}</h6>
              <i class="material-icons mr-1 mb-2 d-inline">chat_bubble_outline</i>
            </div>
            </div>
          </button>
        </div>
        <div class="col-8">
				<button type="button" @click="share();" class="btn btn-outline-light text-dark px-3">
					<div class="row">
          <div class="share">
						<i class="material-icons d-inline pl-2">share</i>
					</div>
					</div>
				</button>
      </div>
			</div>
			</div>
		</div>
	  </div>


</div>

    <div class="row">
        <!-- <form action="#" method="POST"> -->
                  <!-- <input type="hidden" name="" v-model=""> -->
                  <div class="col-2">
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                      <input type="text" class="form-control" @click="" placeholder="Add a Comment..." id="comment" name="comment">
                    </div>
         <!-- </form> -->
                  </div>
                  <div class="col-2">
                        <button type="update" class="btn btn-info" @click="incrementComment(); clearMsg();">Add Comment</button>
                  </div>
                  <div class="col-2">
                  </div>
    </div>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div class="comments">
                <h6>Other Comments</h6>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>

  </div>
	

  </div>

  <!-- Vue and Javascript Code -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script> 
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
  <script  src="main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
</body>
</html>

