<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-4">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="/">Photo Gallary</a>
        
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class='{{Request::is('/') ? "nav-link active":'nav-link '}}' href="/">Home</a>
          </li>
          <li class="nav-item">
            <a  class='{{Request::is('album/create') ? "nav-link active":'nav-link '}}' href="/album/create">Create</a>
          </li>
        </ul>
      </nav>