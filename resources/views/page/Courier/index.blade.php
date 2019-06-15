@extends('layouts.user')
@section('contents')

<div class="container">
  <h2 class="my-4">List of Deliveries</h2>
  <div class="row">
    <div class="col-lg-12">
      <div class="accordion" id="accordionExample">
        <div class="card z-depth-0 bordered">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5>Delivery Information</h5>
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>  
                    <th scope="col" class="text-center">Column1</th>
                    <th scope="col" class="text-center">Column2</th>
                    <th scope="col" class="text-center">Column3</th>
                    <th scope="col" class="text-center">Column4</th>
                    <th scope="col" class="text-center">Column5</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td class="text-center">

                    </td>
                    <td class="text-center"> <p>Testing Info</p></td>
                    <td class="text-center"><p>Testing Info</p></td>
                    <td class="text-center"><p>Testing Info</p></td>
                    <td class="text-center">
                      <a href="#"><button type="button" class="btn btn-primary btn-sm">Action</button></a>

                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card z-depth-0 bordered">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5>Delivered</h5>
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>  
                    <th scope="col" class="text-center">Column1</th>
                    <th scope="col" class="text-center">Column2</th>
                    <th scope="col" class="text-center">Column3</th>
                    <th scope="col" class="text-center">Column4</th>
                    <th scope="col" class="text-center">Column5</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td class="text-center">

                    </td>
                    <td class="text-center"> <p>Testing Info</p></td>
                    <td class="text-center"><p>Testing Info</p></td>
                    <td class="text-center"><p>Testing Info</p></td>
                    <td class="text-center">
                      <a href="#"><button type="button" class="btn btn-primary btn-sm">Action</button></a>

                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="card z-depth-0 bordered">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <h5>Failed to Deliver</h5>
              </button>
            </h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>  
                    <th scope="col" class="text-center">Column1</th>
                    <th scope="col" class="text-center">Column2</th>
                    <th scope="col" class="text-center">Column3</th>
                    <th scope="col" class="text-center">Column4</th>
                    <th scope="col" class="text-center">Column5</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td class="text-center">

                    </td>
                    <td class="text-center"> <p>Testing Info</p></td>
                    <td class="text-center"><p>Testing Info</p></td>
                    <td class="text-center"><p>Testing Info</p></td>
                    <td class="text-center">
                      <a href="#"><button type="button" class="btn btn-primary btn-sm">Action</button></a>

                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection