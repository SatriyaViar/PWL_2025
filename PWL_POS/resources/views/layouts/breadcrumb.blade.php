<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blank Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @foreach ($breadcrumb ->list as $key)
                @if ($key== count($breadcrumb->list))
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                @else 
                    <li class="breadcrumb-item active">Blank Page</li>
                @endif
            @endforeach
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>