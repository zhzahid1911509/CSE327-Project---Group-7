
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
      <style type="text/css">
          label
          {
              display: inline-block;
              width: 200px;
          }

      </style>
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
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
     <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- partial -->
      <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center" style="padding-top: 100px;">

            
                <?php if(session()->has('message')): ?>

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                         x
                    </button>

                        <?php echo e(session()->get('message')); ?>


                </div>
                
                <?php endif; ?>

                <form action="<?php echo e(url('sendemail',$data->id)); ?>" method="POST" >
                    <?php echo csrf_field(); ?>
                    <div style="padding:15px">
                        <label>Greeting</label>
                        <input type="text" style="color:black" name="greeting"  required="">
                    </div>

                    <div style="padding:15px">
                        <label> Mail Body </label>
                        <input type="text" style="color:black" name="body"  required="">
                    </div>

                    <div style="padding:15px">
                        <label> Action Text</label>
                        <input type="text" style="color:black" name="actiontext" required="">
                    </div>

                    

                    <div style="padding:15px">
                        <label> Action Url</label>
                        <input type="text" style="color:black" name="actionurl" required="">
                    </div>

                    <div style="padding:15px">
                        <label>End part</label>
                        <input type="text" style="color:black" name="endpart" required="">
                    </div>


                    <div style="padding:15px">
                       <input type="submit"  class="btn btn-success" >
                    </div>

                </form>
            </div>
        </div>  
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End custom js for this page -->
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\cse327project\resources\views/admin/email_view.blade.php ENDPATH**/ ?>