<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trust People Profile Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="style.css" type="text/css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600'><link rel="stylesheet" href="./style.css">
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



  <!-- Vue Information -->
  <div id="app" >
 <!-- Some containers with profile information -->
 <!-- A Profile card that shows profile information-->
  <div class="profile-card" v-for="users in users">
    <div v-for="profile in profile">
      <div class="container p-3 my-3 ">
        <div class="row">
            <div class="col-2">
              <div class="profile-edit" v-for="file in files">
                <img src='<?php echo $image_src;  ?>' alt="Avatar" class="image">
                <div class="cover">
                <a href="#" class="icon" @click="showEditModal = true; selectProfile(profile);" title="User Profile">
                  <i class="fa fa-edit"></i>
                </a>
                </div>
              </div>
              <div class="cover">
                <a href="#" class="icon" @click="showEditModal = true; selectProfile(profile);" title="User Profile">
                  <i class="fa fa-edit">Edit yout Profile Picture</i>
                </a>
                </div>
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
  

 

        
     <!-- Sidebar for editing profile -->
    <div class="row">
        <div class="col-md-1 mr-3">

        </div>
        
    <div class="col-2 ml-5">
        <!-- Three buttons to navigate to different tabs to edit your information -->
        <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#about" >About Information</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#education" >Education Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#password">Password and Security</a>
              </li>
        </ul>
        
    </div>
  
         <!-- Tab panes  -->
     <div class="col-7">
        <!-- Blank Tab planes until you select one of the tab planes to edit your info -->
        <div class="tab-content">
          <div class="tab-pane" id="start">
  
        </div>
            <!-- Edit your bio and other information fields -->
            <div class="tab-pane container active p-3 mb-4" id="about">
                <h4>About Information</h4>
                <form action="#" method="POST">
                  <input type="hidden" name="id" v-model="currentProfile.profile_id">
                    <div class="form-group">
                      <label for="bio">Bio:</label>
                      <input type="text" class="form-control" @click="selectProfile(profile);" placeholder="Edit your bio information..." id="bio" name="bio" v-model="currentProfile.bio">
                    </div>
                    <div class="form-group">
                        <label for="edit">Other information:</label>
                        <input type="text" class="form-control" @click="selectProfile(profile);" placeholder="Edit your other information..." id="edit" name="other_info" v-model="currentProfile.other_info">
                      </div>
                    <button type="update" class="btn btn-info btn-block" @click="updateUser(); clearMsg();">Update</button>
                  </form>
            </div>
            <!-- Edit your education information -->
            <div class="tab-pane container fade p-3 mb-4" id="education">
                <h4>Education Details</h4>
                <form action="#" method="POST">
                    <div class="form-group">
                      <label for="degree">Degree:</label>
                      <input type="text" class="form-control" @click="selectProfile(profile);" placeholder="Edit your degree information..." id="degree" name="degree" v-model="currentProfile.degree">
                    </div>
                    <div class="form-group">
                        <label for="study">Field of Study:</label>
                        <input type="text" class="form-control" @click="selectProfile(profile);" placeholder="Edit your field of study information..." id="study" name="study" v-model="currentProfile.study">
                      </div>
                    <div class="form-group">
                        <label for="grade">Grade:</label>
                        <input type="text" class="form-control" @click="selectProfile(profile);" placeholder="Edit your grade..." id="grade" name="grade" v-model="currentProfile.grade">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" @click="selectProfile(profile);" placeholder="Edit your description..." id="description" name="description" v-model="currentProfile.description">
                      </div>  
                    <button type="update" class="btn btn-info btn-block" @click="updateUser(); clearMsg();">Update</button>
                  </form>
            </div>
            <!-- Edit your password and security information -->
            <div class="tab-pane container fade p-3 mb-4" id="password">
                <h4>Change Password</h4>
                <form action="#" method="POST">
                    <div class="form-group">
                      <label for="currentPassword">Current Password:</label>
                      <input type="password" class="form-control" @click="selectProfile(profile);" placeholder="Enter your current password..." id="currentPassword" name="currentPassword" v-model="currentProfile.current_password">
                      <!-- An element to toggle between password visibility -->
                      <input type="checkbox" onclick="showCurrentPassword()">Show Password</input>
                      <br>
                      <a href="#">Forgot password?</a>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input type="password" @input="checkPassword" class="form-control" autocomplete="off" @click="selectProfile(profile);" placeholder="Enter your new password..." id="newPassword" name="newPassword" v-model="newPassword">
                        <!-- An element to toggle between password visibility -->
                        <input type="checkbox" onclick="showNewPassword()">Show Password</input>
                        <br>
                        <br>
                        <!-- Checks for password strength -->
                        <h7>Password Strength Checklist</h7>
                        <ul>
                          <li v-bind:class="{ is_valid: contains_eight_characters }">8 Characters</li>
                          <li v-bind:class="{ is_valid: contains_number }">Contains Number</li>
                          <li v-bind:class="{ is_valid: contains_uppercase }">Contains Uppercase</li>
                          <li v-bind:class="{ is_valid: contains_special_character }">Contains Special Character</li>
                        </ul>
            
                    </div>
                    <button type="update" class="btn btn-info btn-block" @click="updateUser(); clearMsg();">Update</button>
                  </form> 
            </div>

        </div> 
    </div>
        <div class="col-2">

        </div>
    </div> 
    </div>
    </div>

    <!-- Edit your profile picture popup overlay -->
    <!-- edit add modal popup -->
		<div id="overlay" v-if="showEditModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit User Profile Picture</h5>
						<button type="button" class="close" @click="showEditModal = false">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-4">
						<form action="#" method="POST">
							 <input type="hidden" name="id" v-model="currentUser.id"> 
               <div class="form-group">
                <label class="control-label col-sm-y" for="file">Select an Image:</label>
                <div class="col-sm-10">          
                    <input type="file" class="form-control" name="file" ref="file" v-model="forValidation.file">
                    <div v-if="errorUserimage" class="error">{{ errorUserimage }}</div>
                </div>
              </div>  
							<div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success" @click="submitForm(); updatePicture();">Submit</button>
                </div>
              </div>
						</form>
					</div>
				</div>
			</div>
		</div>



  </div>

  <!-- Vue and Javascript Code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script> 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
    <script  src="./main.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
	
</body>
</html>

<?php
    include_once 'setup.php';
    $sql = "select image_name from image_upload where image_id=1";
    // $result = mysqli_query($conn,$sql);
    $result = pg_query($conn,$sql);
    $row = pg_fetch_array($result);

    $image = $row['image_name'];
    $image_src = "uploads/".$image;
?>
