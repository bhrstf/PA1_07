@extends('layout.main')

@section('content')
<link href="{{URL::asset('/aset/css/custom-vid.css')}}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">MR CLUB</span>
    </div>
</nav>
<!-- Text -->
<section class="py-2">
    <div class="container my-4">
        <?php foreach ($mrclub as $item): ?>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-12">
                <h6 class="text-lg-start mt-15 text-justify"><strong><?php echo $item->name; ?></strong></h6>
                <p class="text-lg-start mt-10 text-justify"><?php echo $item->description; ?></p>
                <div class="text-center"> 
                    <img src="<?php echo URL::asset('aset/img/'. $item->images ); ?>" class="img-fluid" >
                </div>
            </div>
        </div>
        <?php endforeach; ?>        
    </div>
</section>
@endsection