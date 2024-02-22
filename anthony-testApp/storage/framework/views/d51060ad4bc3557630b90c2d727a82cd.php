

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    
      <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        body {
          background-color: #5B21B6;
          font-family: 'Open Sans', sans-serif;
        }
        .container {
          margin-top: 50px;
          margin-bottom: 50px;
        }
        .card {
          @apply relative flex flex-col min-w-0 break-words bg-violet-700 bg-clip-border border border-solid border-gray-300 rounded-sm;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          border: 1px solid rgba(0, 0, 0, 0.1);
          border-radius: 0.1rem;
        }
        .card-header:first-child {
          border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
        }
        .card-header {
          @apply py-3 px-5 mb-0 bg-violet-700 border-b border-solid border-gray-300;
          padding: 0.75rem 1.25rem;
          margin-bottom: 0;
          background-color: #1E3A8A;
          border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .track {
          @apply relative bg-violet-700 h-7 flex mb-60 mt-50;
          position: relative;
          background-color: #ddd;
          height: 7px;
          display: flex;
          margin-bottom: 60px;
          margin-top: 50px;
        }
        .track .step {
          @apply flex-grow-1 w-1/4 mt-18 text-center relative;
          position: relative;
          width: 25%;
          margin-top: -18px;
          text-align: center;
        }
        .track .step.active:before {
          background: #1E3A8A;
        }
        .track .step::before {
          height: 7px;
          position: absolute;
          content: "";
          width: 100%;
          left: 0;
          top: 18px;
        }
        .track .step.active .icon {
          background: #1E3A8A;
          color: #fff;
        }
        .track .icon {
          @apply inline-block w-10 h-10;
          display: inline-block;
          width: 40px;
          height: 40px;
          line-height: 40px;
          position: relative;
          border-radius: 100%;
          background: #ddd;
        }
        .track .step.active .text {
          @apply font-normal;
          font-weight: 400;
          color: #fbf6f6;
        }
        .track .text {
          @apply block mt-7;
          display: block;
          margin-top: 7px;
        }
        .itemside {
          @apply relative flex;
          position: relative;
          display: flex;
          width: 100%;
        }
        .itemside .aside {
          @apply relative flex-shrink-0;
          position: relative;
          flex-shrink: 0;
        }
        .img-sm {
          @apply w-20 h-20 p-2;
          width: 80px;
          height: 80px;
          padding: 7px;
        }
        ul.row, ul.row-sm {
          @apply list-none p-0;
          list-style: none;
          padding: 0;
        }
        .itemside .info {
          @apply pl-4 pr-2;
          padding-left: 15px;
          padding-right: 7px;
        }
        .itemside .title {
          @apply block mb-5 text-gray-800;
          display: block;
          margin-bottom: 5px;
          color: #212529;
        }
        p {
          @apply mt-0 mb-4;
          margin-top: 0;
          margin-bottom: 1rem;
        }
        .btn-warning {
          @apply text-white bg-violet-700 border border-violet-700 rounded;
          color: #ffffff;
          background-color: #5B21B6;
          border-color: #5B21B6;
          border-radius: 1px;
        }
        .btn-warning:hover {
          @apply text-white bg-blue-700 border border-blue-700 rounded;
          color: #ffffff;
          background-color: #4713A2;
          border-color: #ff2b00;
          border-radius: 1px;
        }
      </style>
      
<class>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-violet-800 text-white">
                    <?php echo e(__("You're logged in!")); ?>

                </div>
            </div>
             
                    <div class="home_buton">
                        <div class="p-2 m-2 w-16 rounded bg-blue-900 hover:bg-blue-800 ">
                        <a class= "text-center align-middle text-white" href="<?php echo e(route('index')); ?>">Home</a>
                        </div>

                        <div class="padding: 5px, marging: 5px">
                          
                          
                          <?php                                        // Orders

//include('functions/userfunctions.php');
//include('includes/header.php');
//include('auth.php');
?>

<div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">
      <a href="#" class="text-white">Home</a> / 
      <a href="#" class="text-white">My Orders</a>
    </h6>
  </div>
</div>

<div class="py-5">
  <div class="container mx-auto">
    <div class="flex">
      <div class="w-full">
        <table class="table-auto w-full border-collapse border border-gray-800">
          <thead>
            <tr>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Product</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">ID</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Tracking Number</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Price</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">Order Date</th>
              <th class="px-4 py-2 border-gray-800 border bg-gray-200">View</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //$orders = getOrders();

            //if(mysqli_num_rows($orders) > 0)
            //{
            //foreach($orders as $item)
            if (!empty($orders)) {
              foreach ($orders as $item) {
            ?>
            <tr>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['id']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['tracking_number']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['total_price']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200"><?= $item['created_at']; ?></td>
              <td class="px-4 py-2 border-gray-800 border bg-gray-200">
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Track</button>
              </td>
            </tr>
            <?php
              }
            } else {
            ?>
            <tr>
              <td colspan="5" class="px-4 py-2">No orders yet</td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container mx-auto p-5 my-5 bg-violet-700">
  <article class="card text-white">
      <header class="card-header pl-2 font-bold text-white"> My Orders / Tracking </header>
      <div class="card-body mt-6">
          <h6>Order ID: </h6>
          <article class="card mt-2">
              <div class="card-body flex flex-row">
                  <div class="flex-1"> <strong>Estimated Delivery time:</strong> <br>25 Mar 2024 </div>
                  <div class="flex-1"> <strong>Shipping BY:</strong> <br> Royal Mail </div>
                  <div class="flex-1"> <strong>Status:</strong> <br> Picked by the courier </div>
                  <div class="flex-1"> <strong>Tracking Number:</strong> <br> #1234567 </div>
              </div>
          </article>
          <div class="track mt-11">
              <div class="step active"> <span class="icon"> <i class="fas fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
              <div class="step active"> <span class="icon"> <i class="fas fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
              <div class="step"> <span class="icon"> <i class="fas fa-truck"></i> </span> <span class="text"> On the way </span> </div>
              <div class="step"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
          </div>
          <hr>
          <ul class="flex flex-row">
              <li class="w-1/4">
                  <figure class="itemside mb-3">
                      <div class="aside"><img src="IMAGE" class="w-16 h-16 border"></div>
                      <figcaption class="info align-self-center">
                          <p class="title"> PRODUCT NAME <br> RAM</p> <span class="text-muted"> PRICE </span>
                      </figcaption>
                  </figure>
              </li>
          </ul>
          <hr>
          <a href="#" class="bg-blue-900 hover:bg-blue-800 text-white font-bold mt-16 py-2 px-4 rounded" data-abc="true"> <i class="fas fa-chevron-left"></i> Back to orders</a>
      </div>
  </article>
</div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>


<?php /**PATH C:\Users\aliba\Documents\Git\team-29\anthony-testApp\resources\views/dashboard.blade.php ENDPATH**/ ?>