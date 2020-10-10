<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trust People Profile Page</title>
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


  <!-- Container for search bar and profile icon -->
  <div class="container-fluid ">
       <!-- Search Bar and Profile Icon      -->
	<!-- <form class="form-inline d-flex justify-content-center md-form form-sm my-1 ">
		<input class="form-control form-control-sm mr-3 w-75 rounded-lg" type="text" placeholder="Search" aria-label="Search">
		<i class="fa fa-search" aria-hidden="true"></i>
  	</form> -->
  </div>

  <!-- Vue Information -->
  <div id="app">

   <!-- Some containers with profile information -->
 <div class="container p-3 my-3 ">
    <div class="profile-card" v-for="users in users">
        <div v-for="profile in profile">
        <div class="row">
            <div class="col-2">
                <img src="uploads/steven.jfif">
            </div>
            <div class="col-6 align-self-center text-nowrap">
                <h4>{{ users.name }}</h4>
                <p>{{ profile.bio }}</p>
            </div> 
            <div class="col-4 d-flex justify-content-end">
                <a href="editProfile.php" @click="selectProfile(profile);">Edit your profile</a>
            </div>
        </div>
        <div class="row mt-2 mb-2">
            <div class="ml-3 mr-2">
                <i class="fa fa-calendar"></i>
            </div>
            <div class="">
                <h7>{{ users.datejoin }}</h7>
            </div>
        </div>
        <div class="row">
          <div class="profile-follow">
            <div class="col-1">
                <a href="#" class="btn btn-info" role="button" v-on:click="followAlert()">Follow</a>
            </div>
          </div>
          <div class="profile-message">
            <div class="col-1 ">
                <a href="#" class="btn btn-info" role="button">Message</a>
            </div>
          </div>
            <div class="col-4 d-flex justify-content-center">
            <div class="row">
              <div class="post-number">
                <div class="post-tag mr-1">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </div>
                <h6>{{ profile.post_number }} Posts</h6>
              </div>
            </div>
            </div>

            <div class="followers-tag col-3">
                 <h6>{{ profile.followers}} Followers</h6>
            </div>
            <div class="following-tag col-2">
                <h6>{{ profile.following }} Following</h6> 
            </div>
        </div>
        </div>
    </div>
</div>
 


 
  <!-- Post Card -->
  <!-- Creates multiple posts as long the database has more posts -->
  <div class="container p-3 my-3 " v-for="posts in posts">
  <div class="post-card">
	  <div class="row">
		<div class="col-2 d-flex justify-content-center align-self-center">
			<img src="uploads/steven.jfif" alt="Avatar">
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
        <div class="see-more ml-auto mr-2">
          <a href="post.php">...See more</a>
        </div>
      </div>
		</div>
		<div class="col-3">
      <div class="reaction">
			<div class="row ml-1">
        <div class="trustworthy-button">
        <form action="#" method="POST">
          <input type="hidden" name="post_id" v-model="currentPost.post_id">
				<button type="button" @click="likePost();" class="btn btn-outline-light text-dark px-4 mb-2">
					<div class="row">
            <div class="trustworthy ">
              <h6 class="mr-2 d-inline">{{ posts.post_like }}</h6>
              <h7 class="d-inline">Yes. I am with you</h7>
            </div>
					</div>
        </button>
      </form>
      </div>
			</div>
			<div class="row ml-1">
        <div class="untrustworthy-button">
				<button type="button" class="btn btn-outline-light text-dark px-4 mb-2">
					<div class="row">
          <div class="untrustworthy">
						<h6 class="mr-2 d-inline">{{ posts.post_dislike }}</h6>
						<h7 class="d-inline">I have a similiar experience</h7>
          </div>
					</div>
				</button>
        </div>
			</div>
      
			<div class="row">
        <div class="col-4">
          <div class="comment-button">
          <button type="button" class="btn btn-outline-light text-dark px-4 mb-2">
            <div class="row">
            <div class="comment">
              <h6 class="mr-2 d-inline">{{ posts.post_comment }}</h6>
              <i class="material-icons mr-1 mb-2 d-inline">chat_bubble_outline</i>
            </div>
            </div>
          </button>
          </div>
        </div>
        <div class="col-8">
        <div class="share-button">
				<button type="button" class="btn btn-outline-light text-dark px-3">
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

