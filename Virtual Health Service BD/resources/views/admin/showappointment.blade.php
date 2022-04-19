<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css') 
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div align="center"  style="padding:100px; ">
                <table>
                    <tr style="background-color:aquamarine;">
                        <th style="padding:30px; font-size:20px; color:black">Customer Name</th>
                        <th style="padding:30px; font-size:20px; color:black">Email</th>
                        <th style="padding:30px; font-size:20px; color:black">Phone</th>
                        <th style="padding:30px; font-size:20px; color:black">Doctor Name</th>
                        <th style="padding:30px; font-size:20px; color:black">Date</th>
                        <th style="padding:30px; font-size:20px; color:black">Message</th>
                        <th style="padding:30px; font-size:20px; color:black">Status</th>
                        <th style="padding:30px; font-size:20px; color:black">Approved</th>
                        <th style="padding:30px; font-size:20px; color:black">Cancelled</th>
                        <th style="padding:30px; font-size:20px; color:black">Send mail</th>

                    </tr>
                    @foreach($data as $appoint)
                    <tr style="background-color:#99ffcc;" align="center">
                        <td style="padding:20px; color:black">{{$appoint->name}}</td>
                        <td style="padding:20px; color:black">{{$appoint->email}}</td>
                        <td style="padding:20px; color:black">{{$appoint->phone}}</td>
                        <td style="padding:20px; color:black">{{$appoint->doctor}}</td>
                        <td style="padding:20px; color:black">{{$appoint->date}}</td>
                        <td style="padding:20px; color:black">{{$appoint->message}}</td>
                        <td style="padding:20px; color:black">{{$appoint->status}}</td>
                        <td style="padding:20px;"><a class="btn btn-success" onclick="return confirm('Are you sure to approve the appointment')" href="{{url('approved',$appoint->id)}}">Approved</td>
                        <td style="padding:20px;"><a class="btn btn-danger" onclick="return confirm('Are you sure to cancel the appointment')" href="{{url('canceled',$appoint->id)}}">Cancel Appointment</td>

                        <td style="padding:15px;"><a class="btn btn-primary" onclick="return confirm('Are you sure to send Mail')" href="{{url('emailview',$appoint->id)}}">Send Mail</td>

                    </tr>
                    @endforeach
                </table>
            </div>

        </div>

  
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>