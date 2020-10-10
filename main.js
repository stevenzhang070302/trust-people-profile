var app = new Vue({
    el: '#app',
    data: {
  // Declaring all my variables and arrays
        errorMsg : "",
        successMsg : "",
        showAddModal : false,
        showEditModal : false,
        showDeleteModal : false,
        like: false,
        dislike: false,
        users : [],
        newUser : {id: "", name: "", datejoin: "" },
        currentUser : {},
        profile : [],
        newProfile : {profile_id: "", profile_name: "", bio: "", post_number: "", followers: "", following: "", other_info: "", degree: "", study: "", grade: "", description: "", current_password: "", new_password: ""},
        currentProfile : {},
        posts : [],
        newPost : {post_id: "", post_person: "", post_title: "", post_content: "", post_like: "", post_dislike: "", post_comment: "", post_date:""},
        currentPost : {},
        agreeVal: 0,
        similarVal: 0,
        commentVal: 0,
        // a : 1
  // Declaring my variables for password validation
        newPassword: null,
        password_length: 0,
        contains_eight_characters: false,
        contains_number: false,
        contains_uppercase: false,
        contains_special_character: false,
        valid_password: false,
  //Declaring variables for image upload
        files : [],
        forValidation: {file: ''},
        currentForValidation: {},
        errorUserimage: "",
        successMessage: "",
    },
// Functions that gets user profile, post, and selects the user profile information
    mounted: function(){
        this.getAllUser();
        this.getAllProfile();
        this.getAllPost();
        
  // this.selectProfile(profile);
        // this.a+1;
    },
    methods: {
  // Function that gets the user
        getAllUser(){
            axios.get("http://localhost/trust-people-profile/model.php?action=profile").then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.users = response.data.users;
                }
            });
        },
  // Function that gets the User information like bio and followers and following
        getAllProfile(){
            axios.get("http://localhost/trust-people-profile/model.php?action=profile_stats").then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.profile = response.data.profile;
                }
            });
        },
  // Function that gets all the posts the specific user has made
        getAllPost(){
            axios.get("http://localhost/trust-people-profile/model.php?action=readpost").then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.posts = response.data.posts;
                }
            });
        },
  // Function that likes a post
        likePost(){
          if(this.like == false){
            axios.get("http://localhost/trust-people-profile/model.php?action=likepost").then(function(response){
              if(response.data.error){
                  app.errorMsg = response.data.message;
              }
              else{
                  app.posts = response.data.posts;
              }
          });
          this.like = true;
          }
          if(this.like == true){
            axios.get("http://localhost/trust-people-profile/model.php?action=unlikepost").then(function(response){
              if(response.data.error){
                  app.errorMsg = response.data.message;
              }
              else{
                  app.posts = response.data.posts;
              }
          });
          this.like = false;
          }
         this.getAllPost();
      },   
  // Function that dislikes a post
        dislikePost(){
          if(dislike == false){
            axios.get("http://localhost/trust-people-profile/model.php?action=dislikepost").then(function(response){
              if(response.data.error){
                  app.errorMsg = response.data.message;
              }
              else{
                  app.posts = response.data.posts;
              }
          });
          dislike = true;
          }
          if(dislike == true){
            axios.get("http://localhost/trust-people-profile/model.php?action=undislikepost").then(function(response){
              if(response.data.error){
                  app.errorMsg = response.data.message;
              }
              else{
                  app.posts = response.data.posts;
              }
          });
          dislike = false;
          }
         this.getAllPost();
      },       
  //Function that updates the existing information with new information from user input
  updateUser(){
            var formData = app.toFormData(app.currentProfile);
            axios.post("http://localhost/trust-people-profile/model.php?action=update_profile", formData).then(function(response){
                app.currentProfile = {};
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllProfile();
                }
            });
        },
        
        toFormData(obj){
            var fd = new FormData();
            for(var i in obj){
                fd.append(i, obj[i]);
            }
            return fd;
        },
  // Function that selects the current profile to update information from
        selectProfile(profile){
            app.currentProfile = profile;
        },

        clearMsg(){
            app.errorMsg = "";
            app.successMsg = "";
        },

      followAlert() {
        alert('You are now following this user.');
      },
      incrementAgree() {
        this.agreeVal = this.agreeVal + 1;
      },
      incrementSimilar() {
        this.similarVal = this.similarVal + 1;
      },
      incrementComment() {
        this.commentVal = this.commentVal + 1;
      },

  //Password validation

      checkPassword() {
      this.password_length = this.newPassword.length;
      const format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      
      if (this.password_length > 8) {
        this.contains_eight_characters = true;
      } else {
        this.contains_eight_characters = false;
      }
      
      this.contains_number = /\d/.test(this.newPassword);
      this.contains_uppercase = /[A-Z]/.test(this.newPassword);
      this.contains_special_character = format.test(this.newPassword);
      
      if (this.contains_eight_characters === true &&
          this.contains_special_character === true &&
          this.contains_uppercase === true &&
          this.contains_number === true) {
            this.valid_password = true;			
      } 
      else {
        this.valid_password = false;
            }
      },

    //Submit Form Function 
    submitForm: function(){
			this.file = this.$refs.file.files[0];      
			var valForm = app.toFormData(app.forValidation);
			valForm.append('file', this.file);
			axios.post('validation.php', valForm,
			{
				headers: {
		            'Content-Type': 'multipart/form-data'
		        }
			})
				.then(function(response){
					// if(response.data.username){
					// 	app.errorUsername = response.data.message;
					// 	app.focusUsername();
					// }
					// else if(response.data.useremail){
					// 	app.errorUseremail = response.data.message;
					// 	app.errorUsername = '';
					// 	app.focusUseremail();
					// }
					// else if(response.data.password){
					// 	app.errorPassword = response.data.message;
					// 	app.errorUsername = '';
					// 	app.errorUseremail = '';
					// 	app.focusPassword();
					// }
					// else if(response.data.confirm_password){
					// 	app.errorConPass = response.data.message;
					// 	app.errorUsername = '';
					// 	app.errorUseremail = '';
					// 	app.errorPassword = '';
					// 	app.focusConPass();
					// }
					if(response.data.file){
						app.errorUserimage = response.data.message;
						// app.errorUsername = '';
						// app.errorUseremail = '';
						// app.errorPassword = '';
						// app.errorConPass = '';
						app.focusUserimage();
					}
					else{
						app.successMessage = response.data.message;
						// app.errorUsername = '';
						// app.errorUseremail = '';
						// app.errorPassword = '';
						// app.errorConPass = '';
						app.errorUserimage = '';
					}
				});
		},
		// focusUsername: function(){
		// 	this.$refs.username.focus();
		// },
		// focusUseremail: function(){
		// 	this.$refs.useremail.focus();
		// },
		// focusPassword: function(){
		// 	this.$refs.password.focus();
		// },
		// focusConPass: function(){
		// 	this.$refs.confirm_password.focus();
		// },
		focusUserimage: function(){
			this.$refs.file.focus();
		},
		toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function(){
			app.successMessage = '';
    },
    
   

   


  },
  

});


  //Password visibility toggle for your current password
  function showCurrentPassword() {
    var x = document.getElementById("currentPassword");
    if (x.type === "password") {
      x.type = "text";
    } 
    else {
      x.type = "password";
    }
  }
  //Password visibility toggle for your new password
  function showNewPassword() {
    var x = document.getElementById("newPassword");
    if (x.type === "password") {
      x.type = "text";
    } 
    else {
      x.type = "password";
    }
  }
//Test function for onload javascript event
  function myFunction() {
    alert("Page is loaded");
  }
  function share() {
  /* Get the text field */
  var copyText = "http://localhost/trust-people-profile/post.html"

  /* Select the text field */
  // copyText.select();
  // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}