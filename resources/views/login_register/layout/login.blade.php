@extends('login_register.template.header')
@section('content')
    <div class="content_login">
        <img class="gambar_login" src="{{ asset('image/image_login.png') }}" alt="">
        <div class="login_kiri">

        </div>
        <div class="login_kanan">
            <div class="content_kanan">
                @error('err')
                    <p>{{ $message }}</p>
                @enderror
                <form action="/login" method="POST">
                    @csrf
                    <h1>Sign in</h1>
                    <div class="input">
                        <label for="email">Email</label>
                        <br>
                        <input id="email" name="email" placeholder="Masukkan username" type="text">
                    </div>                
                    <div class="input">
                        <label for="password">Password</label>
                        <br>
                        <input id="password" name="password" placeholder="Masukkan password" type="text">
                    </div>
                    <button type="submit" class="login">Login</button>
                </form>
            <h2>Forgot your password?</h2>
            <img src="{{ asset('image/tulisan_login.png') }}" alt="">
            <br>
            
                <button type="submit" id="btnGoogle" class="google"><img class="logo_google" src="{{ asset('image/logo_google.png') }}" alt="">Masuk / Daftar dengan google</button>
            
            
            </div>
            
            
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script type="module">
         // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-analytics.js";
  import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-auth.js"
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDkQcZJYixXPbrBlCPNQC4MqfbBRjJ2vSg",
    authDomain: "projectbumn-c9d2e.firebaseapp.com",
    databaseURL: "https://projectbumn-c9d2e-default-rtdb.firebaseio.com",
    projectId: "projectbumn-c9d2e",
    storageBucket: "projectbumn-c9d2e.appspot.com",
    messagingSenderId: "825471555804",
    appId: "1:825471555804:web:8e20639cc5ba7301843c19",
    measurementId: "G-V339MLMM10"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  var URL  = $('meta[name="baseURL"]').attr('content');

  const provider = new GoogleAuthProvider();
  const auth = getAuth();

  document.getElementById('btnGoogle').addEventListener('click', function(e){
    signInWithPopup(auth, provider)
  .then((result) => {
    // This gives you a Google Access Token. You can use it to access the Google API.
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const token = credential.accessToken;
    // The signed-in user info.
    const user = result.user;
    console.log(user);

    function sendData(user) {
                $.ajax({
                    url: '/google/login',
                    type: 'POST',
                    data: JSON.stringify(user),
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.status == "success") {
                                    alert("Successfully logged in");
                                    window.location.replace("/admin/dashboard");
                                } else {
                                    alert("Something went wrong here");
                                }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error mengirim data:", status, error, xhr.responseText);
                    }
                });
            }

            sendData(user);
    // })
    // .catch((error) => {
    //     console.error('Error during sign-in:', error);
    // });




//     $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//                         $.ajax({
//                             url: "/google/login",
//                             type: "POST",
//                             // dataType: "json",
//                             data: {
//                                 _token: '{{ csrf_token() }}',
//                                 data: user.providerData[0],
                                 
//                             },
//                             success: function(data) {
//                                 if (data.status == "success") {
//                                     alert("Successfully logged in");
//                                     // window.location.replace("/admin/dashboard");
//                                 } else {
//                                     alert("Something went wrong here");
//                                 }
//                             },
//                             error: function(error ,data) {
//                                 alert(data);
//                             }
//                         });
                    }).catch((error) => {
                        const errorCode = error.code;
                        const errorMessage = error.message;
                        const email = error.customData.email;
                        const credential = GoogleAuthProvider.credentialFromError(error);
                        console.log('Error code:', errorCode);
                        console.log('Error message:', errorMessage);
                        console.log('Credential:', credential);
                        console.log('email:', email);
                    });
    // ...

    // ...
  });
//   });


      </script>

      <script> 
        
        </script>
</body>

</html>


@endsection