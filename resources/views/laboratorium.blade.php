@extends('layout.main')

@section('content')
<link href="{{URL::asset('/aset/css/custom-vid.css')}}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">LABORATORIUM</span>
    </div>
</nav>
<!-- List Kegiatan Himamera -->
<div class="container mb-4">
  <?php foreach ($laboratorium as $project): ?>
  <div class="row mt-4">
      <div class="col-md-5">
          <a href="#">
              <img class="img-fluid rounded mb-3 mb-md-0" src="{{ URL::asset('aset/img/' . $project->images) }}" alt="{{ $project->images }}">
          </a>
      </div>
      <div class="col-md-6">
          <h4><?php echo $project->lab_name; ?></h4>
          <p><?php echo $project->content; ?></p>
      </div>
  </div>
  <?php endforeach; ?>
</div>

@endsection
