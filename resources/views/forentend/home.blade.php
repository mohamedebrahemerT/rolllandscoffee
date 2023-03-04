<!doctype html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="qpL64bFSPJtkVrLIWnnm42jLPvFYAtGVubjgPSGo">
  <link rel="shortcut icon" id="" href="{{url('/')}}/forentend/logo.jpg">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--libraries for firebase started-->
  <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
  <script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
  <!--libraries for firebase ended-->
  <title> @if(session('lang')=='ar')

                {{settings()->namear}}

                @endif

                @if(session('lang')=='en')

                {{settings()->nameaen}}

                @endif   </title>
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <link rel="stylesheet" href="{{url('/')}}/css/app.css">

  <script src="https://qahwat-luz.menuspages.com/js/notify.js"></script>
  <script src="https://qahwat-luz.menuspages.com/js/notify.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>

    <link rel="stylesheet" href="{{url('/')}}/css/theme-8.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
<style>
    :root {
        --mainColor: #000000;
    }
</style>
<style>
    :root {
        --CategoryFontColor: #fffefe;
    }
</style><script>
    $(function(){
        $("#selected_table").val("unselected")
        $("#selected_table_id").val("0")

    })
</script>



<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/forentend/sliders/engine1/style.css" />

<script type="text/javascript" src="{{url('/')}}/forentend/sliders/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->






<script>
    $(function(){
        $("#containerCustomerSubscription").addClass("collapse")
    })
</script>








<style>
.theme4-category-box
{
    background-color:white !important;
}
.theme4-category-box img
{
    background:rgba(255, 255, 255, 0.5);
}
</style>



<style>
    :root {
        --fontFamily: El Messiri;
        --logoShape: 100px;
        --logoSize: 100px;
        --footerNoteColor : #000000;

        --fontSizeTitle : 18px;
        --fontSizeDescription : 14px;

        --CategoryWidth: 190px;
        --CategoryHeight: 100px;

    }
</style>

<script>
    function phone_code() {
        return '966';
    }
</script>
<style>
    </style>

    
  <script>
    var restaurant_id = "";

      // showing preloader logo
      function showPreloaderLogo()
    {

    // try{
    //       let searchParams = new URLSearchParams(window.location.search)
    //         if(searchParams.has('logoPath'))
    //         {
    //           let param = searchParams.get('logoPath')
    //           alert(document.getElementsById("preloaderImg"))
    //           document.getElementsById("preloaderImg").src = "/"+param

    //         }
    //     }
    //     catch(err)
    //     {

    //     }

    }
    showPreloaderLogo()

$(document).ready(function() {
//Preloader
 $("#preloader").hide();
});

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyBBtM8Ka6r5C2qtBMXS9Ezck0dAKYd-tsE",
      authDomain: "menus-75bde.firebaseapp.com",
      projectId: "menus-75bde",
      storageBucket: "menus-75bde.appspot.com",
      databaseURL: "https://menus-75bde-default-rtdb.firebaseio.com",
      messagingSenderId: "350124085483",
      appId: "1:350124085483:web:73605ac8149bc26536eeae",
      measurementId: "G-T6SNSCMGFD"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    //   get orders count listner
    
    var dbRef = firebase.database();
    var ordersCountRef = dbRef.ref('new_orders/' + restaurant_id);
    var waitingListCountRef = dbRef.ref('waiting_list/' + restaurant_id);


    waitingListCountRef.on('child_added', function(snapshot) {

if (snapshot.Xn.repo.dataUpdateCount > 0) {

  var d = waitingListCountRef.child(snapshot.key);

  if(snapshot.exists()){

  var name = snapshot.val()["name"];
  var phone = snapshot.val()["phone"];
  var waitingList_id = snapshot.val()["waitingList_id"];
  playSoundWaitingList(name,phone,waitingList_id);
  d.remove();

 }


}
});


    ordersCountRef.on('child_added', function(snapshot) {


      var stop_place_order = "";

      if(stop_place_order == "on")
      {
          return;
      }
      
      if (snapshot.Xn.repo.dataUpdateCount > 0) {

        var d = ordersCountRef.child(snapshot.key);
        if(snapshot.exists()){
        Object.keys(snapshot.val()).map(k => {
            var order_id = snapshot.val()[k];
            try
            {
              saveNotification(order_id);
            }
            catch
            {

            }
        });
        }

        
        try
            {
              ordersCountRef.remove();
              
              playSound();
            }
            catch
            {

            }

      }
    });

    function saveOrder(order_id) {
      var restaurant_id = "183";
      var dbRef = firebase.database();
      var contactsRef = dbRef.ref('new_orders/' + restaurant_id);

      contactsRef.push({
        order_id: order_id
      });

    }

    function saveWaitingList(restaurant_id,name ,mobile,waitingList_id) {

      var restaurant_id = restaurant_id;
      var waitingList_id = waitingList_id;
      var dbRef = firebase.database();
      var contactsRef = dbRef.ref('waiting_list/' + restaurant_id);

      contactsRef.push({
        name: name,
        phone: mobile,
        waitingList_id : waitingList_id
      });

    }


    // get current domain
    function getDomain()
    {
                var pathname = window.location.pathname;
                var domain = pathname.split("/")[1];
                return domain;
    }

    function showAD()
    {

        isADShown = sessionStorage.getItem('isADShown')
        imageAD = "off"

        if(isADShown == null)
        {

          if(imageAD == "on")
          {
            $("#containerADS").slideDown('fast')
            sessionStorage.setItem('isADShown' , true)
          }

        }
       }

    function closeAD()
    {
        $("#containerADS").slideUp('fast')
    }


    function setColoring()
    {
      var colors = "{&quot;shop_name&quot;:&quot;#050901&quot;}";
        if (colors != '') {
            colors = colors.replace(/&quot;/g, '"');
            colors = JSON.parse(colors.replace(/&quot;/g, '"'));

            $.map(colors, function(value, key) {
                $("." + key).css({
                    'color': value
                });
            });
        }
    }
    $(function() {
      getIpAddress();
      setColoring();
      showAD()
      getLiveNotifications()
    });
    function getIpAddress()
    {
          $.getJSON("https://jsonip.com?callback=?", function (data) {
            ip=data.ip
            $.ajax({
              type : 'GET',
              url : '/save-views/'+ip,
              success : function(e)
              {

              }
            })

        });
    }



    // slider for restaurant background images at the top

    var slideIndex = 0;
    window.setInterval(function() {

      //  try{
      //     var i;
      //   var slides = document.getElementsByClassName("slide");
      //   for (i = 0; i < slides.length; i++) {
      //       slides[i].style.display = "none";
      //   }
      //   slideIndex++;
      //   if (slideIndex > slides.length) {
      //       slideIndex = 1
      //   }

      //   slides[slideIndex-1].style.display = "block";
      //   }
      //   catch(err)
      //   {
      //     console.log("error in background images")
      //   }

      }, 3000);

      // get unseen notifcations count
  function getLiveNotifications()
  {
       try
        {
          $.ajax({
              url: "/dashboard/orders/get-unseen-nofitications-count?restaurant_id="+restaurant_id,
              type: "get",
              success: function (response) {


               setLiveOrdersCount(response.notifications_count);


              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
              }
          });
        }
        catch(err)
        {  //We can also throw from try block and catch it here

        }

      }

  </script>

  <style>
.input-checkbox {
    --primary: #cac4c4;
    --secondary: #FAFBFF;
    --duration: .50s;
    -webkit-appearance: none;
    -moz-appearance: none;
    -webkit-tap-highlight-color: transparent;
    -webkit-mask-image: -webkit-radial-gradient(white, black);
    outline: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transform-style: preserve-3d;
    perspective: 240px;
    border-radius: 25%;
    width: 15px;
    height: 15px;
    background-size: 300% 300%;
    transition: transform .3s;
    transform: scale(var(--scale, 1)) translateZ(0);
    animation: var(--name, unchecked) var(--duration) ease forwards;
}

    
    @media  only screen and (min-width: 600px) {

    }

    .preloader
    {
        position: absolute;
    top: 30%;
    right: 30%;
    right: 30%;
    text-align: center;
    z-index: -1;
    }
    .preloader img
    {
        border-radius:10px;
    }
  </style>


 <style>

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
   background:#000;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: #ddd;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #fff;
}

.closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-right: 50px;
}

#main {
    transition: margin-right .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


<style type="text/css">
    .product-title {
   
  color: #448256;
  font-size: 25px;
}

.category {
  background-color:#2D503C !important;
  
  padding: 4px !important;
  border: none;
  position: relative;
  overflow: hidden;
  display: inline-table !important;
  margin: 0 0.3rem;
  
  color: #ffffff;
}


.img-category 
{
  border-radius: 10px;
  background: #2D503C;
  width: 150px;
  height: 28px;
  opacity: 1;
}

.box-categories a 
{
  white-space: nowrap;
  margin: 3px;
  border-radius: 10px;
  text-decoration: none;
  color: black;
  font-size: larger;
  font-weight: bold;
}
</style>


<style type="text/css">
    @media (max-width: 576px) 
    { 
   .mtgood
   {
     margin-top: -41px;
   }
    }

    .item-image {
 
  box-shadow: #888888 0px 0px 10px 1px;
  background-color: #C0D1A0;
  padding: 0px;
  width: 110px;
  height: 300px;
  object-fit: cover;
  width: 101%;
  text-align: center;
}

.image-content {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 700px;
}
    
   
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600;700;800&display=swap" rel="stylesheet"> 


      <style type="text/css">
          .logo img {
  z-index: 1;
 
}
      </style>

      <style type="text/css">
          .
          *{
            font-family: 'Cairo', sans-serif !important;
          }
      </style>
</head>

<body style="    font-family: 'Cairo', sans-serif !important;">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

    
        <div style="    display: flex">      
   <a href="{{url('/')}}/admin/lang/ar" class="mr-1">
       {{trans('admin.Arabic')}}
       <!--img src="{{url('/')}}/forentend/ar-ar.png" title="ar" style="width:30px;height:30px" -->
    </a>


       <a href="{{url('/')}}/admin/lang/en" class="mr-1">
      English <!--!--img src="{{url('/')}}/forentend/en-gb.png" title="en"  style="width:30px;height:30px" !-!--->
    </a>

</div>


   <a style="color: #ddd;" href="{{settings()->maintenance}}">
                     {{trans('admin.H')}}
                     
               </a>

               <a href="{{settings()->TwitterLink}}">
 {{trans('admin.twitter')}}
                        

                        

                    </a>
   <a href="{{settings()->instagramLink}}">
 {{trans('admin.instagram')}}

                       

                        

                    </a>

                        <a href="{{settings()->GmailLink}}" >
 {{trans('admin.youtube')}}

                     

                        

                    </a>

                     <a href="{{settings()->facebookLink}}">
 {{trans('admin.facebook')}}

                       

                    </a>



  <!--a href="#">
     <i style="cursor:pointer;" class="fa fa-thumbs-up open-rating-box" data-toggle="modal" data-target="#ratingModal" >
                       {{trans('admin.Rate now')}}
</i >
  </a -->   


  

             
                    

                     
         

 


            
<a href="">
    <abbr title="Phone">{{trans('admin.phone')}}</abbr>: {{settings()->phone}}
</a>
 



</div>

 



<div class="preloader collapse" id="preloader" >
    <img src="/images/website_fixed_logo.jpg" width="70" height="70"  id="preloaderImg" alt="">
    <br>
    <h5 class="mt-3" for=""> @if(session('lang')=='ar')

                {{settings()->namear}}

                @endif

                @if(session('lang')=='en')

                {{settings()->nameaen}}

                @endif  </h5>
</div>
  

<div id="app_main" style="background-color: #315440;">




<div class="container">
    <div class="row">
        <div class="col-lg-4">
           <span style="font-size:30px;cursor:pointer;color: #fff;" onclick="openNav()">☰  </span> 
        </div>
        
 
 <div class="col-lg-4">
        
    </div>
    <div class="col-lg-4 mtgood" style="text-align: left;">

                @if(session('lang')=='en')

         <a style="color:#fff;text-decoration: none;" href="{{url('/')}}/admin/lang/ar" class="mr-1">
       {{trans('admin.Arabic')}} <!--img src="{{url('/')}}/forentend/ar-ar.png" title="ar" style="width:30px;height:30px" -->
    </a>
                @endif   

                @if(session('lang')=='ar')

       <a style="color:#fff;text-decoration: none;" href="{{url('/')}}/admin/lang/en" class="mr-1">
      English <!--img src="{{url('/')}}/forentend/en-gb.png" title="en"  style="width:30px;height:30px"!-->
    </a> 
                @endif   

    </div>
    
</div>

<div id="app" v-cloak>
    <div class="d-flex-center" style="margin-top: -4%;">
        <div class="col-lg-6 col-md-12 col-sm-12 items-container" >
            <div class="back-images" >
                <i class="language"> <style>
        .selected 
        {
             color:white !important;
             background-color:brown !important;
        }
        .btn-lang 
        {
            text-decoration:none;
             color:black;
        }

   </style> </i>

         <div class="logo" id="containertitle" >


                 <div class="d-flex  px-2  py-2   align-items-center justify-content-center"  >

                    <div    >

                    <img loading="lazy" src="{{url('/')}}/forentend/logo.png" 
                     style="  
  height: 70px;
"  style="" style="margin-bottom: 5px;">
                    </div>

                 </div>


                </div>
                <br>
 

                <div class="rating" >
                 
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">نسعد بتقييمكم  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <input type="text" name="rater_name" class="form-control" placeholder="الاسم / الايميل" >
         <textarea name="rater_note" id="" rows="3" class="form-control my-2 width-100" placeholder="الملاحظات" ></textarea>
         <div class="rating-container" >
             <div class="text-center my-2" >
                   <label class="font-size-30 rate-symbol" onclick="saveRating('128543')" >
                       &#128543;
                   </label>

                   <label class="font-size-30 rate-symbol" onclick="saveRating('128577')" >
                       &#128577;
                   </label>
                   
                   <label class="font-size-30 rate-symbol" onclick="saveRating('128528')" >
                       &#128528;
                   </label>
                   
                   <label class="font-size-30 rate-symbol" onclick="saveRating('128522')" >
                       &#128522;
                   </label>
                   
                   <label class="font-size-30 rate-symbol" onclick="saveRating('128525')" >
                       &#128525;
                   </label>
                   
             </div>  
             <div class="alert alert-success rating-in-progress collapse" >
            شكرا لتقييمكم   
             </div> 
             <div class="alert alert-success rating-done collapse" >
                 شكرا لتقييمكم             
            </div> 
         </div>
      </div>
    </div>
  </div>
</div>


<script>
   function saveRating(val)
   {

      var rater_name=$('input[name="rater_name"]').val();
      var rater_note=$('textarea[name="rater_note"]').val();
      var restaurant_id = "183";
     
      if(rater_name == "")
            {
                alert("الرجاء اضافه الاسم او الايميل")
            }
            else 
            {
                $('.rating-in-progress').toggleClass('collapse')
                            $.ajax({
                            type: "GET",
                            url: "/set-rating",
                            data: {
                              "restaurant_id" : restaurant_id,
                              "name":rater_name , "rating":val, "rater_note" : rater_note},
                            success: function(data){
                                $('.rating-in-progress').toggleClass('collapse')
                                $('.rating-done').toggleClass('collapse')
                                window.setTimeout(function() {
                                    $('.rating-done').toggleClass('collapse');
                                }, 3000);

                                }
                            });      
            }
   }
    $(document).ready(function()
    {
       $('.rate-symbol').on('click',function()
       {
        $('.rate-symbol').removeClass('border');
        $(this).addClass('border');
       })
    })
</script>
                </div>
                                
            </div>
           
          
         
             
            <div class="text-center" >
                             
                            </div>
                            <div class="text-center">
                    <div class=" col-lg-12 col-md-12 col-sm-12 " >
<div class="my-2 contact-us-label" style="background-color:white;font-size: 1.3rem;text-align:center;box-shadow: rgb(0 0 0 / 18%) 0px 6px 15px;border-radius: 10px;display:inline-block">
    <label class="px-2  lbl-contacts"  style="margin:0px;color: black;" for=""> <b>تواصل معنا</b> </label>
</div>

  <br>
                   
               
<div class="my-2 contact-us" style="font-size:17px;color:#fff;">
     <br>  
    <span style="font-weight: bold;">
        @if(session('lang')=='ar')

                {{settings()->namear}}

                @endif

                @if(session('lang')=='en')

                {{settings()->nameaen}}

                @endif 
    </span>    
   
   
    <!-------------------------->
                 <div style="text-align: start;
display: grid;
position: absolute;
margin-top: -91px;
 
margin-right: -9px">
                        <a href="https://www.tiktok.com/@rolllandscoffee?_t=8ZdFNQ32Ul7&_r=1" class="mr-1">
        <i style="color: rgb(240, 240, 240);font-size: 17px;" class="fab fa-tiktok fa-2x"></i>
    </a>
                        <a href="https://www.instagram.com/rolllandscoffee/" class="mr-1"><i style="color: rgb(240, 240, 240);font-size: 17px;" class="fab fa-2x fa-instagram instagram"></i></a>

                          <a href="{{settings()->TwitterLink}}" class="mr-1"><i style="color: rgb(240, 240, 240);font-size: 17px;" class="fab fa-2x fa-twitter twitter"></i></a>

                            <a href="https://t.snapchat.com/Axq24cLK" class="mr-1"><i style="color: rgb(240, 240, 240);font-size: 17px;" class="fab fa-2x fa-snapchat snapchat"></i></a>
                 </div>
                 <br>
   
        
</div>
</div>
  
<script>
$(function() {
    var cn = $(".contact-us").children().length;
    if(cn == 0)
    {
        $('.contact-us-label').hide();
    }
});
</script>    
<div class="contacts">



        



    




</div>


<script>
    $(document).ready(function() {
        $('.contacts button').on('click', function() {
            var id = $(this).attr('id');
            $('.' + id).slideToggle();
        });
    });
</script>

<style>
    .mr-1 {
        font-size: 20px;
    }
</style>
                </div>

            <div>
            <div>

</div>

<script>
var intervalId = window.setInterval(function(){
  



}, 2000);
</script>            </div>

            <!-- showign slider images ended -->

            <!-- shwowing categories -->

            <div id="containerCategories" >



              <div class="box-categories">

           @foreach($departments as $department)
                                                                                          

                                                      <a class="no-padding flatted-well category" @click="chooseActiveCategory({{$department->id }})" 
                                                      id="{{$department->id }}">

    <img   class="img-category" >

                            <div class="lbl-category" >
                                   <div class="width-100 d-grid-inline" >
                                                                            <label class="no-margin word-category-lbl"  for="">
                                           @if(session('lang')=='ar')

{{$department->dep_name_ar }}



@endif



  @if(session('lang')=='en')

{{$department->dep_name_en }}



@endif 
                                        </label>

                                                                           </div>
                            </div>

                  </a>

           @endforeach
                                                                                                                                                                                                      

                                                       
                                                                                                                              
              </div>
            </div>

            <!-- showing categories ended  -->


        </div>


    </div>




    <div class="main-content">
        <div class="container-fluid  justify-content-center  flex-column" id="items-container" v-cloak>

<div class="justify-content-center  text-center">
                       <div class="items-container col-lg-12 col-md-12 col-sm-12">

<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1" style="position: initial;">
<div class="ws_images"><ul>
                             @foreach(App\Maincategories::get() as  $key =>   $slider)

        <li><img src="{{url('/')}}/{{$slider->photo}}" alt="{{ $key}}" title="{{$key}}" id="wows1_{{$key}}"/></li>
                    @endforeach
       
    </ul></div>
    <div class="ws_bullets"><div>
                             @foreach(App\Maincategories::get()  as $key =>   $slider)

        <a href="#" title="{{$key}}"><span><img src="{{url('/')}}/{{$slider->photo}}" style="width:127px;height:48px" alt="{{$key}}"/>{{$key}}</span></a>
                    @endforeach
       
    </div></div>

<div class="ws_shadow"></div>
</div>  



                         
                        </div>
                            
                       </div>
              
         
            
                                                  @foreach($departments as $department)
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a{{$department->id}}">
          
            

                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
        

 

        
                 
                     @foreach(
                     App\product::
                     where('department_id',$department->id)
                    ->orderBy('order','ASC')->where('status','active')->get() as $product)
                    <div  class="mx-2 {'': true, 'added': typeof cart[14307] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div  >

                                <div style="display:contents;" class="position-relative align-items-center item-image-box">


                                 


<!-- Button trigger modal -->
<a    data-toggle="modal" data-target="#exampleModal{{$product->id }}">
    <img  src="{{url('/')}}/{{$product->photo}}" alt=" @if(session('lang')=='ar')

{{$product->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$product->title_name_en }}



@endif "  class="item-image" aria-view="true">

 <h4 class="text-center" @if(session('lang')=='ar') style="position: absolute;
top: 83%;
color: #fff;margin-right: 7%;color: #fff;" @endif   

 @if(session('lang')=='en') style="position: absolute;
top: 83%;
color: #fff;margin-right: 39%;color: #fff;" @endif

>
                 @if(session('lang')=='ar')

{{$product->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$product->title_name_en }}



@endif
         </h4>


</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#18291f !important">
      <div class="modal-header">
       
        <button style="color: #fff;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div  >
  
    <img  src="{{url('/')}}/{{$product->photo}}" class="image-content">

    <div style="color:#fff ;text-align: center;">
         <h4 class="text-center">
                 @if(session('lang')=='ar')

{{$product->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$product->title_name_en }}



@endif
         </h4>

         <p class="text-center" style="text-align:center !important;">

                    @if(session('lang')=='ar')

 

{!! \Illuminate\Support\Str::limit($product->content_name_ar, 100, $end='...') !!}

@endif



  @if(session('lang')=='en')
{!! \Illuminate\Support\Str::limit($product->content_name_en, 100, $end='...') !!}
 


@endif 
             
         </p>

         <p class="text-center"   @if(session('lang')=='en')
style="direction: ltr;margin-left: 14%;" 
@endif  >
 <span class="fs-12 d-block mt-2 price-tag" style="font-size:17px;color:#fff">  {{$product->price }}   {{trans('admin.SA')}}   
        @if(session('lang')=='ar')

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endif

 @if(session('lang')=='en')

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endif

    <span style="text-align: right !important;color:#fff">

         {{$product->calories }}  {{trans('admin.calories')}}
    </span>

     @if(session('lang')=='en')

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endif
 </span>


                                                                           </p> 


                                                                             <span class="text-center">

                 {{-- trans('admin.Allergens') --}} 
             
         </span>



        
    </div>


</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close')}}</button>
        
      </div>
    </div>
  </div>
</div>


                                                                    </div>

                               
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14307').children().length == 0 )
        {
            $('#a14307').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14307').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14307').removeClass('collapse');
                    $('#sub_details_item_14307').css({'display' : 'initial'});
                    $('#sub_details_item_14307').animate({height: '100%'});
                    $('#sub_details_item_14307').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14307').animate({height: '0%'});
                $('#sub_details_item_14307').css({'display' : 'initial'});
                $('#sub_details_item_14307').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                     @endforeach
                                    </div>
          

            </div>

           @endforeach

          
                        
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a2157">




                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[14299] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div   >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/7F033730-E79C-4E40-8AA5-BE608F5CA4D91667069382.jpeg" alt="Pollo baked chicken"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        Pollo baked chicken
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">31 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl14299" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14299').children().length == 0 )
        {
            $('#a14299').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14299').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14299').removeClass('collapse');
                    $('#sub_details_item_14299').css({'display' : 'initial'});
                    $('#sub_details_item_14299').animate({height: '100%'});
                    $('#sub_details_item_14299').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14299').animate({height: '0%'});
                $('#sub_details_item_14299').css({'display' : 'initial'});
                $('#sub_details_item_14299').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[14300] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/B29760A2-4527-4396-9CCF-7BD043CEA7881667069475.jpeg" alt="Chicken pesto"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        Chicken pesto
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">36 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl14300" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14300').children().length == 0 )
        {
            $('#a14300').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14300').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14300').removeClass('collapse');
                    $('#sub_details_item_14300').css({'display' : 'initial'});
                    $('#sub_details_item_14300').animate({height: '100%'});
                    $('#sub_details_item_14300').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14300').animate({height: '0%'});
                $('#sub_details_item_14300').css({'display' : 'initial'});
                $('#sub_details_item_14300').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[14301] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/3B40EA16-A8F2-4C3E-84C6-C9DC44AEF72A1667069546.jpeg" alt="Turky club"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        Turky club
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">27 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl14301" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14301').children().length == 0 )
        {
            $('#a14301').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14301').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14301').removeClass('collapse');
                    $('#sub_details_item_14301').css({'display' : 'initial'});
                    $('#sub_details_item_14301').animate({height: '100%'});
                    $('#sub_details_item_14301').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14301').animate({height: '0%'});
                $('#sub_details_item_14301').css({'display' : 'initial'});
                $('#sub_details_item_14301').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[14302] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/B474BB37-0392-463D-865E-72125BFE48F31667069620.jpeg" alt="ITalian tuna"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ITalian tuna
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">30 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl14302" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14302').children().length == 0 )
        {
            $('#a14302').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14302').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14302').removeClass('collapse');
                    $('#sub_details_item_14302').css({'display' : 'initial'});
                    $('#sub_details_item_14302').animate({height: '100%'});
                    $('#sub_details_item_14302').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14302').animate({height: '0%'});
                $('#sub_details_item_14302').css({'display' : 'initial'});
                $('#sub_details_item_14302').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[14303] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/21B17CE8-D7D1-4A09-86A2-612DCA219D701667069675.jpeg" alt="Halloumi cheese"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        Halloumi cheese
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">27 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl14303" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14303').children().length == 0 )
        {
            $('#a14303').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14303').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14303').removeClass('collapse');
                    $('#sub_details_item_14303').css({'display' : 'initial'});
                    $('#sub_details_item_14303').animate({height: '100%'});
                    $('#sub_details_item_14303').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14303').animate({height: '0%'});
                $('#sub_details_item_14303').css({'display' : 'initial'});
                $('#sub_details_item_14303').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[14304] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/B83FEF5B-A53A-4E46-A3B2-21C02D8D159C1667069728.jpeg" alt="Cheese club"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        Cheese club
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">27 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl14304" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl14304').children().length == 0 )
        {
            $('#a14304').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a14304').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_14304').removeClass('collapse');
                    $('#sub_details_item_14304').css({'display' : 'initial'});
                    $('#sub_details_item_14304').animate({height: '100%'});
                    $('#sub_details_item_14304').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_14304').animate({height: '0%'});
                $('#sub_details_item_14304').css({'display' : 'initial'});
                $('#sub_details_item_14304').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                                    </div>
            </div>
                        
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a1986">
                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12772] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/1105C973-7C6B-4E69-A993-31CAD2D1BFDC1663804551.jpeg" alt="سولتد كراميل كيك"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        سولتد كراميل كيك
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">35 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12772" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12772').children().length == 0 )
        {
            $('#a12772').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12772').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12772').removeClass('collapse');
                    $('#sub_details_item_12772').css({'display' : 'initial'});
                    $('#sub_details_item_12772').animate({height: '100%'});
                    $('#sub_details_item_12772').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12772').animate({height: '0%'});
                $('#sub_details_item_12772').css({'display' : 'initial'});
                $('#sub_details_item_12772').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12774] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/2863D8CE-E0A8-4F70-A461-BB0CFA38B2EC1663804608.jpeg" alt="كرانشي شوكلت كيك"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        كرانشي شوكلت كيك
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">35 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12774" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12774').children().length == 0 )
        {
            $('#a12774').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12774').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12774').removeClass('collapse');
                    $('#sub_details_item_12774').css({'display' : 'initial'});
                    $('#sub_details_item_12774').animate({height: '100%'});
                    $('#sub_details_item_12774').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12774').animate({height: '0%'});
                $('#sub_details_item_12774').css({'display' : 'initial'});
                $('#sub_details_item_12774').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12776] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A54F1D55-D3B2-4D20-88A2-6C0EA24F72321663804378.jpeg" alt="سانسباستيان تشيز كيك"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        سانسباستيان تشيز كيك
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">35 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12776" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12776').children().length == 0 )
        {
            $('#a12776').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12776').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12776').removeClass('collapse');
                    $('#sub_details_item_12776').css({'display' : 'initial'});
                    $('#sub_details_item_12776').animate({height: '100%'});
                    $('#sub_details_item_12776').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12776').animate({height: '0%'});
                $('#sub_details_item_12776').css({'display' : 'initial'});
                $('#sub_details_item_12776').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12777] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/FCFB9841-BD9B-4AA9-9271-861B8604B85C1663804439.jpeg" alt="تشيز كيك اللوتس"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        تشيز كيك اللوتس
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">35 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12777" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12777').children().length == 0 )
        {
            $('#a12777').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12777').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12777').removeClass('collapse');
                    $('#sub_details_item_12777').css({'display' : 'initial'});
                    $('#sub_details_item_12777').animate({height: '100%'});
                    $('#sub_details_item_12777').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12777').animate({height: '0%'});
                $('#sub_details_item_12777').css({'display' : 'initial'});
                $('#sub_details_item_12777').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                                    </div>
            </div>
                        
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a1488">
                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9478] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A20D4A0F-8EB4-413F-A7F4-1A4315B9DD641656552921.jpeg" alt="قهوة لوز مثلجة"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        قهوة لوز مثلجة
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9478" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9478').children().length == 0 )
        {
            $('#a9478').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9478').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9478').removeClass('collapse');
                    $('#sub_details_item_9478').css({'display' : 'initial'});
                    $('#sub_details_item_9478').animate({height: '100%'});
                    $('#sub_details_item_9478').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9478').animate({height: '0%'});
                $('#sub_details_item_9478').css({'display' : 'initial'});
                $('#sub_details_item_9478').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[13609] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A7E44C64-F7B4-4E8F-9DE9-5505604F9AE81665687161.jpeg" alt="ايس كركديه"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ايس كركديه
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">18 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl13609" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl13609').children().length == 0 )
        {
            $('#a13609').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a13609').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_13609').removeClass('collapse');
                    $('#sub_details_item_13609').css({'display' : 'initial'});
                    $('#sub_details_item_13609').animate({height: '100%'});
                    $('#sub_details_item_13609').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_13609').animate({height: '0%'});
                $('#sub_details_item_13609').css({'display' : 'initial'});
                $('#sub_details_item_13609').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[13892] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/C5C825D7-5AC1-4DE2-8AB2-B7B53E9A6A351666115764.jpeg" alt="موهيتو اناناس"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        موهيتو اناناس
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">22 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl13892" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl13892').children().length == 0 )
        {
            $('#a13892').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a13892').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_13892').removeClass('collapse');
                    $('#sub_details_item_13892').css({'display' : 'initial'});
                    $('#sub_details_item_13892').animate({height: '100%'});
                    $('#sub_details_item_13892').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_13892').animate({height: '0%'});
                $('#sub_details_item_13892').css({'display' : 'initial'});
                $('#sub_details_item_13892').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[13893] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/9DACCBA2-1C14-44D2-8498-DA63BDE226121666116279.jpeg" alt="ايس شوكلت"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ايس شوكلت
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">18 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl13893" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl13893').children().length == 0 )
        {
            $('#a13893').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a13893').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_13893').removeClass('collapse');
                    $('#sub_details_item_13893').css({'display' : 'initial'});
                    $('#sub_details_item_13893').animate({height: '100%'});
                    $('#sub_details_item_13893').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_13893').animate({height: '0%'});
                $('#sub_details_item_13893').css({'display' : 'initial'});
                $('#sub_details_item_13893').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9479] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/4806FBE5-0075-4258-9681-08E8B1381D971656527397.jpeg" alt="آيس لاتيه"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        آيس لاتيه
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9479" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9479').children().length == 0 )
        {
            $('#a9479').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9479').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9479').removeClass('collapse');
                    $('#sub_details_item_9479').css({'display' : 'initial'});
                    $('#sub_details_item_9479').animate({height: '100%'});
                    $('#sub_details_item_9479').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9479').animate({height: '0%'});
                $('#sub_details_item_9479').css({'display' : 'initial'});
                $('#sub_details_item_9479').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9480] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/8EECB99B-FD89-413B-BF30-4F6FDE6408241656555674.jpeg" alt="آيس كاراميل ميكاتو"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        آيس كاراميل ميكاتو
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9480" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9480').children().length == 0 )
        {
            $('#a9480').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9480').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9480').removeClass('collapse');
                    $('#sub_details_item_9480').css({'display' : 'initial'});
                    $('#sub_details_item_9480').animate({height: '100%'});
                    $('#sub_details_item_9480').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9480').animate({height: '0%'});
                $('#sub_details_item_9480').css({'display' : 'initial'});
                $('#sub_details_item_9480').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12611] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/D58FEEEA-674B-4BE6-A044-AB06DA70833B1667923545.jpeg" alt="ايس شيكن وايت موكا"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ايس شيكن وايت موكا
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12611" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12611').children().length == 0 )
        {
            $('#a12611').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12611').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12611').removeClass('collapse');
                    $('#sub_details_item_12611').css({'display' : 'initial'});
                    $('#sub_details_item_12611').animate({height: '100%'});
                    $('#sub_details_item_12611').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12611').animate({height: '0%'});
                $('#sub_details_item_12611').css({'display' : 'initial'});
                $('#sub_details_item_12611').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12634] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/C0A4380F-82E8-4FC6-B41D-1E894B1535FC1667924785.jpeg" alt="موهيتو"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        موهيتو
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        جميع النكهات

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">22 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12634" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12634').children().length == 0 )
        {
            $('#a12634').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12634').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12634').removeClass('collapse');
                    $('#sub_details_item_12634').css({'display' : 'initial'});
                    $('#sub_details_item_12634').animate({height: '100%'});
                    $('#sub_details_item_12634').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12634').animate({height: '0%'});
                $('#sub_details_item_12634').css({'display' : 'initial'});
                $('#sub_details_item_12634').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12612] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/9EEC675A-530B-4D4E-B2B4-C2E952595CCE1667924674.jpeg" alt="ايس تي"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ايس تي
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">22 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12612" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12612').children().length == 0 )
        {
            $('#a12612').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12612').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12612').removeClass('collapse');
                    $('#sub_details_item_12612').css({'display' : 'initial'});
                    $('#sub_details_item_12612').animate({height: '100%'});
                    $('#sub_details_item_12612').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12612').animate({height: '0%'});
                $('#sub_details_item_12612').css({'display' : 'initial'});
                $('#sub_details_item_12612').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12613] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/AF12D995-4E4C-431E-8548-589F573307E71667924263.jpeg" alt="باشن فروت"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        باشن فروت
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">22 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12613" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12613').children().length == 0 )
        {
            $('#a12613').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12613').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12613').removeClass('collapse');
                    $('#sub_details_item_12613').css({'display' : 'initial'});
                    $('#sub_details_item_12613').animate({height: '100%'});
                    $('#sub_details_item_12613').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12613').animate({height: '0%'});
                $('#sub_details_item_12613').css({'display' : 'initial'});
                $('#sub_details_item_12613').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9482] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A1A80287-4BB8-4E5C-8A21-9F4E5195A6C91656554099.jpeg" alt="لوز شامبين"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        لوز شامبين
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9482" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9482').children().length == 0 )
        {
            $('#a9482').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9482').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9482').removeClass('collapse');
                    $('#sub_details_item_9482').css({'display' : 'initial'});
                    $('#sub_details_item_9482').animate({height: '100%'});
                    $('#sub_details_item_9482').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9482').animate({height: '0%'});
                $('#sub_details_item_9482').css({'display' : 'initial'});
                $('#sub_details_item_9482').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9481] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/44FB5233-6627-4A7D-950F-2B27CFD3B0F31656553274.jpeg" alt="عصائر طبيعيه"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        عصائر طبيعيه
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        ليمون

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                        ليمون نعناع

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         بطيخ

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9481" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9481').children().length == 0 )
        {
            $('#a9481').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9481').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9481').removeClass('collapse');
                    $('#sub_details_item_9481').css({'display' : 'initial'});
                    $('#sub_details_item_9481').animate({height: '100%'});
                    $('#sub_details_item_9481').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9481').animate({height: '0%'});
                $('#sub_details_item_9481').css({'display' : 'initial'});
                $('#sub_details_item_9481').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9483] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/9D5296DC-16DA-4903-9DA0-08E4D4933F7B1656555270.jpeg" alt="مشروبات غازية"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        مشروبات غازية
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        بيبسي

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         ميرندا

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         سڤن آب

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">10 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9483" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9483').children().length == 0 )
        {
            $('#a9483').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9483').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9483').removeClass('collapse');
                    $('#sub_details_item_9483').css({'display' : 'initial'});
                    $('#sub_details_item_9483').animate({height: '100%'});
                    $('#sub_details_item_9483').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9483').animate({height: '0%'});
                $('#sub_details_item_9483').css({'display' : 'initial'});
                $('#sub_details_item_9483').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12293] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/8F12E8E5-0286-4850-AAF9-258B48086FA01667923631.jpeg" alt="ريد بول"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ريد بول
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">20 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12293" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12293').children().length == 0 )
        {
            $('#a12293').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12293').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12293').removeClass('collapse');
                    $('#sub_details_item_12293').css({'display' : 'initial'});
                    $('#sub_details_item_12293').animate({height: '100%'});
                    $('#sub_details_item_12293').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12293').animate({height: '0%'});
                $('#sub_details_item_12293').css({'display' : 'initial'});
                $('#sub_details_item_12293').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12760] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/2551DFE4-06A7-4106-A67A-1C08CE1CFA791663694913.jpeg" alt="ماء غازيه"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ماء غازيه
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">14 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12760" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12760').children().length == 0 )
        {
            $('#a12760').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12760').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12760').removeClass('collapse');
                    $('#sub_details_item_12760').css({'display' : 'initial'});
                    $('#sub_details_item_12760').animate({height: '100%'});
                    $('#sub_details_item_12760').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12760').animate({height: '0%'});
                $('#sub_details_item_12760').css({'display' : 'initial'});
                $('#sub_details_item_12760').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9484] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/9135440C-2EE1-448B-A444-0A5DCB256F381667924143.jpeg" alt="ماء"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ماء
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">10 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9484" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9484').children().length == 0 )
        {
            $('#a9484').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9484').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9484').removeClass('collapse');
                    $('#sub_details_item_9484').css({'display' : 'initial'});
                    $('#sub_details_item_9484').animate({height: '100%'});
                    $('#sub_details_item_9484').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9484').animate({height: '0%'});
                $('#sub_details_item_9484').css({'display' : 'initial'});
                $('#sub_details_item_9484').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                                    </div>
            </div>
                        
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a1487">
                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9473] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A3CCDAC9-9363-47AC-8993-3C2C214E0EBC1656552982.jpeg" alt="قهوة لوز"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        قهوة لوز
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9473" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9473').children().length == 0 )
        {
            $('#a9473').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9473').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9473').removeClass('collapse');
                    $('#sub_details_item_9473').css({'display' : 'initial'});
                    $('#sub_details_item_9473').animate({height: '100%'});
                    $('#sub_details_item_9473').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9473').animate({height: '0%'});
                $('#sub_details_item_9473').css({'display' : 'initial'});
                $('#sub_details_item_9473').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12608] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/DA521CA5-C69B-4DAF-B49E-99C76A6596981667925207.jpeg" alt="ميكاتو"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ميكاتو
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">24 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12608" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12608').children().length == 0 )
        {
            $('#a12608').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12608').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12608').removeClass('collapse');
                    $('#sub_details_item_12608').css({'display' : 'initial'});
                    $('#sub_details_item_12608').animate({height: '100%'});
                    $('#sub_details_item_12608').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12608').animate({height: '0%'});
                $('#sub_details_item_12608').css({'display' : 'initial'});
                $('#sub_details_item_12608').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12610] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A04F69C2-5549-4307-875F-27EF88E558EA1667946570.jpeg" alt="فلايت وايت"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        فلايت وايت
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12610" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12610').children().length == 0 )
        {
            $('#a12610').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12610').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12610').removeClass('collapse');
                    $('#sub_details_item_12610').css({'display' : 'initial'});
                    $('#sub_details_item_12610').animate({height: '100%'});
                    $('#sub_details_item_12610').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12610').animate({height: '0%'});
                $('#sub_details_item_12610').css({'display' : 'initial'});
                $('#sub_details_item_12610').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9467] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/8B3548C6-932E-4888-BF9A-A6EC146AC2911656512397.jpeg" alt="كابتشينو"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        كابتشينو
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9467" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9467').children().length == 0 )
        {
            $('#a9467').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9467').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9467').removeClass('collapse');
                    $('#sub_details_item_9467').css({'display' : 'initial'});
                    $('#sub_details_item_9467').animate({height: '100%'});
                    $('#sub_details_item_9467').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9467').animate({height: '0%'});
                $('#sub_details_item_9467').css({'display' : 'initial'});
                $('#sub_details_item_9467').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9465] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/613253BC-6853-4640-A2AE-D4878EB16AE01656512760.jpeg" alt="لاتيه"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        لاتيه
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">28 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9465" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9465').children().length == 0 )
        {
            $('#a9465').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9465').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9465').removeClass('collapse');
                    $('#sub_details_item_9465').css({'display' : 'initial'});
                    $('#sub_details_item_9465').animate({height: '100%'});
                    $('#sub_details_item_9465').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9465').animate({height: '0%'});
                $('#sub_details_item_9465').css({'display' : 'initial'});
                $('#sub_details_item_9465').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[12614] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/78792458-1E19-46A2-A007-200DDEF7D8791667946843.jpeg" alt="اسبرسو دبل"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        اسبرسو دبل
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl12614" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl12614').children().length == 0 )
        {
            $('#a12614').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a12614').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_12614').removeClass('collapse');
                    $('#sub_details_item_12614').css({'display' : 'initial'});
                    $('#sub_details_item_12614').animate({height: '100%'});
                    $('#sub_details_item_12614').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_12614').animate({height: '0%'});
                $('#sub_details_item_12614').css({'display' : 'initial'});
                $('#sub_details_item_12614').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9469] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/EA85B01A-0614-49AA-AABB-B5003BC643EA1656525395.jpeg" alt="اسبريسو سنقل"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        اسبريسو سنقل
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">14 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9469" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9469').children().length == 0 )
        {
            $('#a9469').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9469').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9469').removeClass('collapse');
                    $('#sub_details_item_9469').css({'display' : 'initial'});
                    $('#sub_details_item_9469').animate({height: '100%'});
                    $('#sub_details_item_9469').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9469').animate({height: '0%'});
                $('#sub_details_item_9469').css({'display' : 'initial'});
                $('#sub_details_item_9469').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9470] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/4A591B4B-F4AA-459F-B429-599101E0F8871656525585.jpeg" alt="قهوة فرنسي"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        قهوة فرنسي
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">24 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9470" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9470').children().length == 0 )
        {
            $('#a9470').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9470').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9470').removeClass('collapse');
                    $('#sub_details_item_9470').css({'display' : 'initial'});
                    $('#sub_details_item_9470').animate({height: '100%'});
                    $('#sub_details_item_9470').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9470').animate({height: '0%'});
                $('#sub_details_item_9470').css({'display' : 'initial'});
                $('#sub_details_item_9470').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9472] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A73868EC-2518-4371-BACE-F87F0BC8A83A1656525880.jpeg" alt="قهوة امريكي"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        قهوة امريكي
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">24 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9472" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9472').children().length == 0 )
        {
            $('#a9472').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9472').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9472').removeClass('collapse');
                    $('#sub_details_item_9472').css({'display' : 'initial'});
                    $('#sub_details_item_9472').animate({height: '100%'});
                    $('#sub_details_item_9472').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9472').animate({height: '0%'});
                $('#sub_details_item_9472').css({'display' : 'initial'});
                $('#sub_details_item_9472').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9471] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/6AAB68A0-94B9-4A17-8362-B736EE292A691656525739.jpeg" alt="قهوة تركي"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        قهوة تركي
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">18 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9471" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9471').children().length == 0 )
        {
            $('#a9471').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9471').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9471').removeClass('collapse');
                    $('#sub_details_item_9471').css({'display' : 'initial'});
                    $('#sub_details_item_9471').animate({height: '100%'});
                    $('#sub_details_item_9471').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9471').animate({height: '0%'});
                $('#sub_details_item_9471').css({'display' : 'initial'});
                $('#sub_details_item_9471').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9466] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/C7AA60C0-B657-4A0D-A0DB-BE91F74E86111667947015.jpeg" alt="دلة قهوة سعودية"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        دلة قهوة سعودية
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">45 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9466" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9466').children().length == 0 )
        {
            $('#a9466').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9466').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9466').removeClass('collapse');
                    $('#sub_details_item_9466').css({'display' : 'initial'});
                    $('#sub_details_item_9466').animate({height: '100%'});
                    $('#sub_details_item_9466').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9466').animate({height: '0%'});
                $('#sub_details_item_9466').css({'display' : 'initial'});
                $('#sub_details_item_9466').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9468] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/4575F03F-1060-487E-A83E-82574969E4341656513083.jpeg" alt="شوكولاته ساخنة"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        شوكولاته ساخنة
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9468" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9468').children().length == 0 )
        {
            $('#a9468').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9468').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9468').removeClass('collapse');
                    $('#sub_details_item_9468').css({'display' : 'initial'});
                    $('#sub_details_item_9468').animate({height: '100%'});
                    $('#sub_details_item_9468').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9468').animate({height: '0%'});
                $('#sub_details_item_9468').css({'display' : 'initial'});
                $('#sub_details_item_9468').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9474] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/5DE85927-517B-4728-91F1-B2CA013F255A1656527700.jpeg" alt="كمون ليمون"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        كمون ليمون
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9474" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9474').children().length == 0 )
        {
            $('#a9474').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9474').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9474').removeClass('collapse');
                    $('#sub_details_item_9474').css({'display' : 'initial'});
                    $('#sub_details_item_9474').animate({height: '100%'});
                    $('#sub_details_item_9474').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9474').animate({height: '0%'});
                $('#sub_details_item_9474').css({'display' : 'initial'});
                $('#sub_details_item_9474').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9475] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/D4E4BB2A-0393-4359-8887-C073F74E80181656526728.jpeg" alt="يانسون"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        يانسون
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9475" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9475').children().length == 0 )
        {
            $('#a9475').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9475').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9475').removeClass('collapse');
                    $('#sub_details_item_9475').css({'display' : 'initial'});
                    $('#sub_details_item_9475').animate({height: '100%'});
                    $('#sub_details_item_9475').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9475').animate({height: '0%'});
                $('#sub_details_item_9475').css({'display' : 'initial'});
                $('#sub_details_item_9475').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9476] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A588A5A2-4570-4257-8E84-B61DCCD9E22F1656527319.jpeg" alt="شاي أحمر"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        شاي أحمر
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9476" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9476').children().length == 0 )
        {
            $('#a9476').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9476').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9476').removeClass('collapse');
                    $('#sub_details_item_9476').css({'display' : 'initial'});
                    $('#sub_details_item_9476').animate({height: '100%'});
                    $('#sub_details_item_9476').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9476').animate({height: '0%'});
                $('#sub_details_item_9476').css({'display' : 'initial'});
                $('#sub_details_item_9476').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9477] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/5BB128CA-6151-4B63-8E34-D7EDF7D86D3F1656527672.jpeg" alt="شاي أخضر"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        شاي أخضر
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9477" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9477').children().length == 0 )
        {
            $('#a9477').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9477').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9477').removeClass('collapse');
                    $('#sub_details_item_9477').css({'display' : 'initial'});
                    $('#sub_details_item_9477').animate({height: '100%'});
                    $('#sub_details_item_9477').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9477').animate({height: '0%'});
                $('#sub_details_item_9477').css({'display' : 'initial'});
                $('#sub_details_item_9477').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                                    </div>
            </div>
                        
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a1486">
                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9485] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/6E9BFA45-45CB-4140-B2F5-5EEA09C11F771656511234.jpeg" alt="الشيش"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        الشيش
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        عنب

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         عنب توت

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                        عنب نعناع

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                        تفاحتين

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         
بطيخ

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         مستكة

                                                                    </label>

                                                                                                                                    <label  class="product-description no-margin" >

                                                                         ليمون نعناع.

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">110 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9485" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9485').children().length == 0 )
        {
            $('#a9485').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9485').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9485').removeClass('collapse');
                    $('#sub_details_item_9485').css({'display' : 'initial'});
                    $('#sub_details_item_9485').animate({height: '100%'});
                    $('#sub_details_item_9485').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9485').animate({height: '0%'});
                $('#sub_details_item_9485').css({'display' : 'initial'});
                $('#sub_details_item_9485').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9486] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/12F8338D-77D9-4152-8DE7-24BB84B88B901656511259.jpeg" alt="شيشه سبيشل"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        شيشه سبيشل
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">145 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9486" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9486').children().length == 0 )
        {
            $('#a9486').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9486').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9486').removeClass('collapse');
                    $('#sub_details_item_9486').css({'display' : 'initial'});
                    $('#sub_details_item_9486').animate({height: '100%'});
                    $('#sub_details_item_9486').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9486').animate({height: '0%'});
                $('#sub_details_item_9486').css({'display' : 'initial'});
                $('#sub_details_item_9486').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                                    </div>
            </div>
                        
            
                                                            <div class="mt-4 justify-content-center item collapse text-center"  id="a1485">
                <div class="items-container col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9460] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/9DF578FB-97FC-42D3-AE46-2D46A57B010C1656509619.jpeg" alt="ترمس"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        ترمس
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">15 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9460" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9460').children().length == 0 )
        {
            $('#a9460').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9460').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9460').removeClass('collapse');
                    $('#sub_details_item_9460').css({'display' : 'initial'});
                    $('#sub_details_item_9460').animate({height: '100%'});
                    $('#sub_details_item_9460').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9460').animate({height: '0%'});
                $('#sub_details_item_9460').css({'display' : 'initial'});
                $('#sub_details_item_9460').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9461] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/FE1A0ADE-FB71-4603-8D8F-17771C2AE8C61656509765.jpeg" alt="مكسرات"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        مكسرات
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9461" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9461').children().length == 0 )
        {
            $('#a9461').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9461').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9461').removeClass('collapse');
                    $('#sub_details_item_9461').css({'display' : 'initial'});
                    $('#sub_details_item_9461').animate({height: '100%'});
                    $('#sub_details_item_9461').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9461').animate({height: '0%'});
                $('#sub_details_item_9461').css({'display' : 'initial'});
                $('#sub_details_item_9461').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9462] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/6DAFEAFB-E724-45BB-9CD0-A2BA153B93751656509800.jpeg" alt="لوز"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        لوز
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">16 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9462" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9462').children().length == 0 )
        {
            $('#a9462').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9462').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9462').removeClass('collapse');
                    $('#sub_details_item_9462').css({'display' : 'initial'});
                    $('#sub_details_item_9462').animate({height: '100%'});
                    $('#sub_details_item_9462').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9462').animate({height: '0%'});
                $('#sub_details_item_9462').css({'display' : 'initial'});
                $('#sub_details_item_9462').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9463] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/CB53FBE6-8BB2-4F1B-83C9-0E6B1F3C6C241656510383.jpeg" alt="فشار"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        فشار
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">10 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9463" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9463').children().length == 0 )
        {
            $('#a9463').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9463').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9463').removeClass('collapse');
                    $('#sub_details_item_9463').css({'display' : 'initial'});
                    $('#sub_details_item_9463').animate({height: '100%'});
                    $('#sub_details_item_9463').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9463').animate({height: '0%'});
                $('#sub_details_item_9463').css({'display' : 'initial'});
                $('#sub_details_item_9463').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[9464] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/A7DB9F4B-C14B-4FD7-A914-C954139016131656510410.jpeg" alt="فصفص"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        فصفص
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        مجاناً

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl9464" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl9464').children().length == 0 )
        {
            $('#a9464').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a9464').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_9464').removeClass('collapse');
                    $('#sub_details_item_9464').css({'display' : 'initial'});
                    $('#sub_details_item_9464').animate({height: '100%'});
                    $('#sub_details_item_9464').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_9464').animate({height: '0%'});
                $('#sub_details_item_9464').css({'display' : 'initial'});
                $('#sub_details_item_9464').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[11845] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/73A115F8-93CD-4C39-A06F-D410A078E2991667947807.jpeg" alt="صحن فواكة موسمية"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        صحن فواكة موسمية
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">50 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl11845" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl11845').children().length == 0 )
        {
            $('#a11845').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a11845').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_11845').removeClass('collapse');
                    $('#sub_details_item_11845').css({'display' : 'initial'});
                    $('#sub_details_item_11845').animate({height: '100%'});
                    $('#sub_details_item_11845').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_11845').animate({height: '0%'});
                $('#sub_details_item_11845').css({'display' : 'initial'});
                $('#sub_details_item_11845').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[11846] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/9245A083-89EB-4850-A4F6-3FF7D8B9088A1661261142.jpeg" alt="صحن قهوة لوز المشكل"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        صحن قهوة لوز المشكل
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">30 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl11846" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl11846').children().length == 0 )
        {
            $('#a11846').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a11846').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_11846').removeClass('collapse');
                    $('#sub_details_item_11846').css({'display' : 'initial'});
                    $('#sub_details_item_11846').animate({height: '100%'});
                    $('#sub_details_item_11846').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_11846').animate({height: '0%'});
                $('#sub_details_item_11846').css({'display' : 'initial'});
                $('#sub_details_item_11846').css({'border' : 'none'});
            });
    });
</script>

                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div  class="mx-2 {'': true, 'added': typeof cart[13593] !== 'undefined'}">
                        <div class="item-wrapper px-2">


                            <div class="d-flex" >

                                <div class="position-relative align-items-center item-image-box">
                                    <img  src="public/items_images/0F293D4A-CC2C-4768-9884-56040CDA2AA61665524770.jpeg" alt="دونات بايتس"  class="item-image" aria-view="true">
                                                                    </div>

                                <div class="d-flex flex-grow-1 justify-content-space-between" >
                                        <div>
                                                <div class="text-right" >
                                                            <div class="text-right mt-2" >
                                                                                                                                    <label  class="product-title no-margin ">
                                                                        دونات بايتس
                                                                    </label>
                                                                    <br>
                                                                                                                            </div>
                                                            <div class="text-right" >
                                                                                                                                    <label  class="product-description no-margin" >

                                                                        

                                                                    </label>

                                                                                                                            </div>

                                                            
                                                </div>
                                                <div>

                                                </div>
                                        </div>


                                        <div class="price position-relative">

                                                                                        <span class="fs-12 d-block mt-2 price-tag">15 ريال</span>
                                            

                                                                                        <br>


                                            <div id="add_to_cart_avl13593" class=" container-add-cart" >
                                                                                            </div>


                                        </div>

                                </div>
                            </div>
                                <script>
$(function () {

       // check add to cart availability
       if ( $('#add_to_cart_avl13593').children().length == 0 )
        {
            $('#a13593').siblings('.btn-open_details').css({'display' : 'block'});
        }
        else
        {
            $('#a13593').siblings('.btn-open_details').css({'display' : 'none'});
        }
})
    function toggleSubItemsList(e)
    {
        $(e).toggle('slow');
    }
    product_sub_details = {};
    function addSubDetailsNotes(e,product_id)
    {
            var value = $(e).val();
            selectedItems = getIfSubDetailsAlreadyExists(product_id);
            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[2] != "note";
            });

            item = []
            item.push(value);
            item.push(0);
            item.push("note");
            selectedItems.push(item);
            product_sub_details[product_id] = selectedItems;
            app.changeSubDetailsItems(product_id)
    }
    function getSubDetailsData(product_id)
    {
        return product_sub_details[product_id];
    }
    function getAllSubDetailsData(product_id)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        $.each(getREQUIRED_SUB_DETAILS(),function(a,b) {
            if(b[6] == product_id)
            {
                selectedItems.push(b)
            }
        });
        console.log(selectedItems)
        product_sub_details[product_id] = selectedItems
        return product_sub_details[product_id];
    }
    function getItemCurrentQuantity(product_id)
    {
        return parseInt($("#lblQuantity"+product_id).text())
    }
    function resetSubDetailsData(product_id)
    {
        unCheckAllSubItems(product_id);
    }

    function unCheckAllSubItems(product_id)
    {
            if(product_sub_details[product_id] != undefined)
            {
                if(product_sub_details[product_id].length > 0)
                {
                    jQuery.grep(product_sub_details[product_id], function(value) {
                        $("#checkbox"+product_id+value[3]).css({"background-color" : "white"});
                        $("#checkbox"+product_id+value[3]).prop('checked',false);
                    });
                    product_sub_details[product_id] = [];

                }
                $("#txtareaSubDetailsNote"+product_id).val("")
            }

    }
    function getIfSubDetailsAlreadyExists(product_id) {
        selectedItems = [];
        if(product_sub_details[product_id] != undefined)
        {
            selectedItems = product_sub_details[product_id];
        }
        return selectedItems;
    }

    function setQuantitySubDetailItem(id,quantity,product_id,name)
    {
        var currentQuantity = parseInt($("#"+id).text())

        if(currentQuantity == 1 && quantity == -1)
        {
            return;
        }

        newQuantity = currentQuantity+quantity
        $("#"+id).text(newQuantity)


        var dataSubDetails=getSubDetailsData(product_id)

        dataSubDetailsItem = jQuery.grep(dataSubDetails, function(value) {
            return value[0] == name;
            });

        // as array
        dataSubDetailsItem[0][4] =  newQuantity

        // removing existing item from selecteditems
        dataSubDetails=jQuery.grep(dataSubDetails, function(value) {
            return value[0] != name;
            });

        dataSubDetails.push(dataSubDetailsItem[0])
        product_sub_details[product_id] = dataSubDetails;
        app.changeSubDetailsItems(product_id)
    }

    var REQUIRED_SUB_DETAILS = {}
    function getREQUIRED_SUB_DETAILS()
    {
        return REQUIRED_SUB_DETAILS;
    }
    function addRequiredSubDetailsItem(tag , name , price , product_id,item_id,index,subject,isStart)
    {

        var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())

            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            item.push(product_id);

            REQUIRED_SUB_DETAILS[product_id+index] = item

            if(isStart == false)
            {
                $("#containerSubDetails"+product_id+index).find(".input-radio").removeClass("bg-red");
                $(tag).addClass("bg-red");
            }


    }
    function toggleSelect(tag , name , price , product_id,item_id,index,subject)
    {

        selectedItems = getIfSubDetailsAlreadyExists(product_id)
        if(tag.checked)
        {
            // enable quantity of this sub detail item

            var currentQuantity = parseInt($("#lblQuantitySubDetailItem"+product_id+index+item_id).text())
            $(tag).addClass("bg-red")
            item = []
            item.push(name);
            item.push(price == 'null' ? 0 : price);
            item.push("item");
            item.push(item_id);
            item.push(currentQuantity);
            item.push(subject);
            selectedItems.push(item);
        }
        else
        {
            $(tag).removeClass("bg-red")
            $("#containerQuantitySubDetails"+product_id+index+item_id).addClass("collapse")

            selectedItems = jQuery.grep(selectedItems, function(value) {
            return value[0] != name;
            });
        }

        product_sub_details[product_id] = selectedItems;
        app.changeSubDetailsItems(product_id)
    }

    $(document).ready(function()
    {
            $('.btn-open_details').on('click' , function()
            {
                    $('#sub_details_item_13593').removeClass('collapse');
                    $('#sub_details_item_13593').css({'display' : 'initial'});
                    $('#sub_details_item_13593').animate({height: '100%'});
                    $('#sub_details_item_13593').css({'border' : 'border solid 1px'});
            });
            $('.btn-close-sub-details').on('click' , function()
            {
                $('#sub_details_item_13593').animate({height: '0%'});
                $('#sub_details_item_13593').css({'display' : 'initial'});
                $('#sub_details_item_13593').css({'border' : 'none'});
            });
    });
</script>





                                <div class="container allergens" >
                                                                            </div>

                        </div>
                    </div>
                    
                    
                                    </div>
            </div>
                        
                    </div>


                    <div class="container">
                        <div class="col-lg-12 text-center"  >
                            <p style="font-weight: bold;color: #fff;">
                {{trans('admin.Prices include value added tax')}}
                               
                            </p>
                            
            <p style="font-weight: bold;color: #fff;">
                 {{trans('admin.Adults need 2,000 calories per day')}}
                
            </p>

                        </div>
                        
                    </div>

                      

                   <div id="title-company" class="d-flex justify-content-center mb-5 text-black-50">
<b style="color:#fff">
      {{trans('admin.The menu was designed by')}} 
      <a style="color: #fff;" href="https://hullol.net/">{{trans('admin.hullol solutions')}}</a>
</b>
</div>
        
            </div>
    </div>
</div>
  <script src="https://qahwat-luz.menuspages.com/js/menu.js"></script>
<script src="https://qahwat-luz.menuspages.com/js/script-8.js"></script>

<script>
    function expandTitle(event) {
        $(event.target).removeClass('extensable').removeClass('cursor-pointer').closest('div.item-wrapper').first().addClass('expanded scrollable-hidden-bar');
    }
</script>



<script src="https://qahwat-luz.menuspages.com/js/imageViewer.js"></script>

  <script>

    function setBackElementsThisTheme() {
        try
        {
            var data = "{&quot;type&quot;:0,&quot;value&quot;:&quot;EDE7E1&quot;,&quot;input_ele_id&quot;:&quot;#back_theme_color_code_text&quot;}";
            data = JSON.parse(data.replace(/&quot;/g,'"'));
            if(data["type"] == 1)
            {
                $("#app_main").css({
                    "background-image" : "url('"+data["value"]+"')" ,
                    "background-size" : "cover"
                });
            }
            else
            {
                $("#app_main").css({
                    "background-color" : "#315440" ,
                    "background-size" : "cover"
                });

                $("#containertitle").css({
                    "background-color" : "#"+data["value"] ,
                });
            }
        }
        catch(err)
        {  //We can also throw from try block and catch it here

        }
    }
  </script>

     <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "{{settings()->phone}}", // WhatsApp number
            call_to_action: "{{trans('admin.For support or inquiries')}}", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'right'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

  

<script>

var myIndex = 0;

carousel();



function carousel() {

  var i;

  var x = document.getElementsByClassName("mySlides");

  for (i = 0; i < x.length; i++) {

    x[i].style.display = "none";  

  }

  myIndex++;

  if (myIndex > x.length) {myIndex = 1}    

  x[myIndex-1].style.display = "block";  

  setTimeout(carousel, 2000); // Change image every 2 seconds

}

</script>



<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "335px";
    document.getElementById("app_main").style.marginright = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("app_main").style.marginright= "0";
    document.body.style.backgroundColor = "white";
}
</script>
     

<script type="text/javascript" src="{{url('/')}}/forentend/sliders/engine1/wowslider.js"></script>
<script type="text/javascript" src="{{url('/')}}/forentend/sliders/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

</body>

</html>
