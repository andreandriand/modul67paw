<nav class="navbar navbar-expand-lg bg-danger text-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Simple Siakad</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }}" href="/">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Tambah Data' || $title === 'Edit Data') ? 'active' : '' }}" href="/tambah">{{ ($title === 'Edit Data') ? 'Edit Data' : 'Input Data' }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'About Me') ? 'active' : '' }}" href="/about">About Me</a>
        </li>
      </ul>
    </div>
  </div>
</nav>