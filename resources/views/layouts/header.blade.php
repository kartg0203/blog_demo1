  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container-fluid px-4 px-lg-5">
          <a class="navbar-brand" href="{{ route('index') }}">Start Bootstrap</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              Menu
              <i class="fas fa-bars"></i>
          </button>
          @isset($categories)
              <form action="{{ route('index') }}" method="GET" class="d-flex">
                  <input type="text" class="form-control form-control-sm rounded" style="width: 190px;"
                      placeholder="請輸入搜索名稱" name="keyword" value="{{ request()->query('keyword') }}">
                  <select class="form-select form-select-sm ms-1 rounded" aria-label="Default select example"
                      name="category_id" style="width: 120px;">
                      <option value="0">請選擇分類</option>
                      @foreach ($categories as $id => $categories);
                          <option value="{{ $id }}" @if (request()->query('category_id') == $id) selected @endif>
                              {{ $categories }}</option>
                      @endforeach
                  </select>
                  <button class="btn btn-sm" type="submit"><i class="fas fa-search"></i></button>
              </form>
          @endisset
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ms-auto py-4 py-lg-0">
                  <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('index') }}">Home</a>
                  </li>
                  <li class="nav-item mt-3">
                      @auth
                          <div class="dropdown">
                              <a href="#" class="" id="dropdownMenuLink" data-bs-toggle="dropdown">
                              <img src="@if (auth()->user()->avatar) {{ asset('storage/' . auth()->user()->avatar) }} @else
                                  https://fakeimg.pl/250x100/ @endif" class="rounded-circle"
                                  style="width: 30px;height: 30px;">
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                  <li>
                                  <img src="@if (auth()->user()->avatar) {{ asset('storage/' . auth()->user()->avatar) }} @else
                                      https://fakeimg.pl/250x100/ @endif"
                                      class="rounded-circle mt-1 mx-3" style="width: 50px;height: 50px;">
                                      <span>{{ auth()->user()->name }}</span>
                                  </li>
                                  <li>
                                      <hr>
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('blogs.create') }}">發表文章</a></li>
                                  <li><a class="dropdown-item" href="{{ route('user.info') }}">個人中心</a></li>
                                  <li><a class="dropdown-item" href="{{ route('user.avatar') }}">修改頭像</a></li>
                                  <li><a class="dropdown-item" href="{{ route('user.blog') }}">我的所有文章</a></li>
                                  <li>
                                      <hr>
                                  </li>
                                  <li>
                                      <form action="{{ route('logout') }}" method="POST" id="logout">
                                          @csrf
                                          <a class="dropdown-item text-danger"
                                              onclick="document.getElementById('logout').submit()" type="submit">登出</a>
                                      </form>
                                  </li>
                                  <li>
                              </ul>
                          </div>
                      @else
                          <a href="{{ route('login') }}" class="btn btn-sm btn-primary rounded">登入</a>
                          <a href="{{ route('register') }}" class="btn btn-sm btn-success rounded">註冊</a>
                      @endauth
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  {{-- header --}}
  <header class="masthead" style="background-image: url({{ $img }})">
      <div class="container position-relative px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                      <h2>{{ $heading }}</h2>
                      <div>
                          @isset($view)
                              <span class="me-4"><i class="far fa-eye me-2"></i>{{ $view }}</span>
                          @endisset
                          @isset($comment)
                              <span><i class="far fa-comments me-2"></i>{{ $comment }}</span>
                          @endisset
                      </div>
                      <p class="subheading fs-5">
                          {{ $subheading }}
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </header>
