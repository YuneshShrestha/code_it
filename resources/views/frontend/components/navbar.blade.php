<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="{{ asset($company->logo) }}" width="40px" height="40px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          @foreach ($categories as $category)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $category->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    {{-- <p>{{ $category->course }}</p> --}}
                    <p class="d-none">{{ $count=0 }}</p>
                   @foreach ($category->course as $course)
                        @if ($category->id == $course->category_id)
                         
                            <li><a class="dropdown-item" href="#">{{ $course->name }}</a></li>
                            <p class="d-none">{{ ++$count }}</p>
                        @endif
                    
                   @endforeach
                   @if ($count==0)
                    <li class="text-center"><p>No Data</p></li>
                   @endif
                </ul>
               
            </li>
          @endforeach
          {{-- Contact Us --}}
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>