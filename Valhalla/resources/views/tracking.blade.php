{{-- Author @BM786 = Basit Ali Mohammad --}}
<x-app-layout>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    body {
      font-family: 'Open Sans', sans-serif;
    }
    .container {
      margin-top: 50px;
      margin-bottom: 50px;
      
    }
    .card {
      @apply relative flex flex-col min-w-0 break-words bg-clip-border border border-solid rounded-sm;
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
      @apply py-3 px-5 mb-0 border-b border-solid;
      padding: 0.75rem 1.25rem;
      margin-bottom: 0;
      background-color: #6b46c1;
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
      background: #6b46c1;
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
      background: #6b46c1;
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
      @apply block mb-5 text-white;
      display: block;
      margin-bottom: 5px;
      color: #FFFFFF;
    }
    p {
      @apply mt-0 mb-4;
      margin-top: 0;
      margin-bottom: 1rem;
    }
    .btn-warning {
      @apply text-white bg-purple-700 border border-purple-700 rounded;
      color: #ffffff;
      background-color: #5B21B6;
      border-color: #5B21B6;
      border-radius: 1px;
    }
    .btn-warning:hover {
      @apply text-white bg-purple-700 border border-purple-700 rounded;
      color: #ffffff;
      background-color: #4713A2;
      border-color: #ff2b00;
      border-radius: 1px;
    }
  </style>
  
  
  <div class="container mx-auto p-5 my-5 bg-purple-900 rounded-xl text-white">
    <article class="card text-white">
        <header class="card-header pl-2 font-bold text-white"> My Orders / Tracking </header>
        <div class="card-body mt-6 text-white">
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
                <div class="step"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text">Delivered</span> </div>
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
            <div class="items-center justify-start mt-8">
              <a href="{{route('dashboard')}}">
              <x-primary-button>
                  {{ __('Back To Orders') }}
              </x-primary-button>
          </a>
          </div>
        </div>
    </article>
  </div>
</x-app-layout>

