<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Procure</title>

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/modern-business.cs') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation --><nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
 <a href="#" class="pull-left"><img src="/Procure_Logo/Procurelogo.png" width="100" height="70" ></a>             

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @if(Auth::user()->role == "Admin" )
          <li class="nav-item">
            <a class="nav-link text-dark" href="/Administrator/list-of-categories">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/Administrator/list-of-clients">Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Manage Accounts</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="/Administrator/profile">Profile</a>
              <a class="dropdown-item" href="/Logout">Log Out</a>
            </div>
          </li>

          @endif

          @if(Auth::user()->role == "Pharmacist" )
          <li class="nav-item">
            <a class="nav-link" href="/Pharmacist/item-list">Item List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Pharmacist/sales-list">Sale List</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {!! Auth::user()->userinfo->pharma_name !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="/Pharmacist/profile/{!! Auth::user()->id !!}">Profile</a>
              <a class="dropdown-item" href="/Logout">Log Out</a>
            </div>
          </li>
          @endif

          @if(Auth::user()->role == "Normal User" )  
          
          <li class="nav-item">
            <a class="nav-link" href="/Normal-User/list-of-medicine">List Of Medicine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Normal-User/my-cart">My Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Normal-User/history-purchase-list">History</a>
          </li>
          <li class="nav-item">
            {!! Form::open(array('url' => '/Normal-User/list-of-searched-medicine-brand','files'=>true)) !!}

          <div class="input-group">
            <input type="text" class="form-control" name="search_medicine" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
          </div>
            {!! Form::close()!!}
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->userinfo->lname !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="/Normal-User/profile/{!! Auth::user()->id !!}">Profile</a>
              <a class="dropdown-item" href="/Logout">Log Out</a>
            </div>
          </li>         

          <!-- Nav Item - Alerts -->

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">{!! $lists !!}+</span>
              
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>


              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>

              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>


          @endif

          @if(Auth::user()->role == "PWD" )
                    <li class="nav-item">
            <a class="nav-link" href="/PWD/list-of-medicine">List Of Medicine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/PWD/my-cart">My Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/PWD/history-purchase-list">History</a>
          </li>
          <li class="nav-item">
            {!! Form::open(array('url' => '/PWD/list-of-searched-medicine-brand','files'=>true)) !!}

          <div class="input-group">
            <input type="text" class="form-control" name="search_medicine" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
          </div>
            {!! Form::close()!!}
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->userinfo->lname !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="/Normal-User/profile/{!! Auth::user()->id !!}">Profile</a>
              <a class="dropdown-item" href="/Logout">Log Out</a>
            </div>
          </li>         

          <!-- Nav Item - Alerts -->

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">{!! $lists !!}+</span>
              
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>


              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>

              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>


          @endif



          @if(Auth::user()->role == "Senior Citizen" )

                    <li class="nav-item">
            <a class="nav-link" href="/SeniorCitizen/list-of-medicine">List Of Medicine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/SeniorCitizen/my-cart">My Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/SeniorCitizen/history-purchase-list">History</a>
          </li>
          <li class="nav-item">
            {!! Form::open(array('url' => '/SeniorCitizen/list-of-searched-medicine-brand','files'=>true)) !!}

          <div class="input-group">
            <input type="text" class="form-control" name="search_medicine" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
          </div>
            {!! Form::close()!!}
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->userinfo->lname !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="/Normal-User/profile/{!! Auth::user()->id !!}">Profile</a>
              <a class="dropdown-item" href="/Logout">Log Out</a>
            </div>
          </li>         

          <!-- Nav Item - Alerts -->

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">{!! $lists !!}+</span>
              
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>


              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>

              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>


          @endif

          @if(Auth::user()->role == "Courier" )

          <li class="nav-item">
            <a class="nav-link" href="/PWD/history-purchase-list">Nav 1</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="/PWD/history-purchase-list">Nav 2</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->userinfo->lname !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="/Normal-User/profile/{!! Auth::user()->id !!}">Profile</a>
              <a class="dropdown-item" href="/Logout">Log Out</a>
            </div>
          </li>         

          <!-- Nav Item - Alerts -->

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">{!! $lists !!}+</span>
              
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>


              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>

              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>


          @endif


        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
  <div class="container">
    @yield('contents')
    <br><br>
  </div>

  <br>
  <footer class="footer  bg-light">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Procure 2018</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

<script type="text/javascript">
  $('#edit').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 
    var price = button.data('myprice') 
    var quantity = button.data('myquantity') 
    var mid_id = button.data('myid')
    var med_cat = button.data('md_cat'); 
    var modal = $(this)

    modal.find('.modal-body #pri').val(price);
    modal.find('.modal-body #quan').val(quantity);
    modal.find('.modal-body #mid_id').val(mid_id);
    modal.find('.modal-body #med_category').val(med_cat);
  })
</script>

<script type="text/javascript">
  function readURL(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(event.target)
    .closest('form-group') //Target parent form control div
    .next() //Target sibling of parent form control 
    .find('img') //Target Ima
    .attr('src', e.target.result); //Set image
    $('#image').attr('src', e.target.result);
    // $('#logo').attr('src', e.target.result);
  } 
  reader.readAsDataURL(input.files[0]);
}
}
$("#medicine_image").change(readURL);
</script>







<!-- 

<script type="text/javascript">
// Save data to sessionStorage 
if(!sessionStorage.getItem('firstVisit')){ 
  sessionStorage.setItem('firstVisit', '1'); 
}else{ 
  sessionStorage.setItem('firstVisit', '0'); 
} 
/* Fix size on document ready.*/ 
$(function(){ 
  if (sessionStorage.getItem('firstVisit') === "1"){ 
    $(".message").css('display', 'inline') 
} // Aizver POPUP 
$("#message").click(function(){ 
  $(".message").hide(); 
}); 
});
</script> -->
</html>