<!DOCTYPE html>
<html lang="en">
  <head>
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
            <div align="center"  style="padding:100px; ">
                <table>
                    <tr style="background-color:aquamarine;">
                        <th style="padding:40px; font-size:20px; color:black">Doctor Name</th>
                        <th style="padding:40px; font-size:20px; color:black">Phone</th>
                        <th style="padding:40px; font-size:20px; color:black">Speciality</th>
                        <th style="padding:40px; font-size:20px; color:black">Room</th>
                        <th style="padding:40px; font-size:20px; color:black">Image</th>
                        <th style="padding:40px; font-size:20px; color:black">Delete</th>
                        <th style="padding:40px; font-size:20px; color:black">Update</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="background-color:#99ffcc;" align="center">
                        <td style="padding:20px; color:black"><?php echo e($doctor->name); ?></td>
                        <td style="padding:20px; color:black"><?php echo e($doctor->phone); ?></td>
                        <td style="padding:20px; color:black"><?php echo e($doctor->speciality); ?></td>
                        <td style="padding:20px; color:black"><?php echo e($doctor->room); ?></td>
                        <td><img height="100" width="100"src="doctorimage/<?php echo e($doctor->image); ?>"></td>

                        <td style="padding:20px;"><a class="btn btn-danger" onclick="return confirm('Are you sure want to delete the data?')" href="<?php echo e(url('deletedoctor',$doctor->id)); ?>">Delete</td>

                        <td style="padding:20px;"><a class="btn btn-primary" onclick="return confirm('Confirm update')" href="<?php echo e(url('updatedoctor',$doctor->id)); ?>">Update</td>
                
                        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                   
                </table>
            </div>
 
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End custom js for this page -->
  </body>
</html><?php /**PATH C:\xampp\htdocs\cse327project\resources\views/admin/showdoctor.blade.php ENDPATH**/ ?>