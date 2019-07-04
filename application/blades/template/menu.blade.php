<li>
  <a href="{{ base_url() }}opd">
    <i class="fa fa-address-book"></i> <span>OPD</span>
  </a>
</li>

<li>
  <a href="{{ base_url() }}user">
    <i class="fa fa-address-book"></i> <span>User</span>
  </a>
</li>

{{-- @if(ci()->session->login && getUserData()->level == 'u')
<li>
  <a href="{{ base_url() }}nasabahtanyajawab">
    <i class="fa fa-address-book"></i> <span>Nasabah Tanya/Jawab</span>
  </a>
</li>
@endif

<li>
  <a href="{{ base_url() }}profilpt">
    <i class="fa fa-address-book"></i> <span>Profil</span>
  </a>
</li>

<li>
  <a href="{{ base_url() }}produkasuransi">
    <i class="fa fa-address-book"></i> <span>Produk Asuransi</span>
  </a>
</li>

<li>
  <a href="{{ base_url() }}berita">
    <i class="fa fa-address-book"></i> <span>Berita/Informasi Terbaru</span>
  </a>
</li>

<li>
  <a href="{{ base_url() }}agen">
    <i class="fa fa-address-book"></i> <span>Data Agen</span>
  </a>
</li>

<li>
  <a href="{{ base_url() }}syaratasuransi">
    <i class="fa fa-address-book"></i> <span>Syarat Asuransi</span>
  </a>
</li>

<li>
  <a href="{{ base_url() }}kontak">
    <i class="fa fa-address-book"></i> <span>Kontak Alamat</span>
  </a>
</li>

@if(ci()->session->login && getUserData()->level == 'a')
<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i>
    <span>Admin</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

    <li>
      <a href="{{ base_url() }}produkasuransiadmin">
        <i class="fa fa-address-book"></i> <span>Produk Asuransi</span>
      </a>
    </li>

    <li>
      <a href="{{ base_url() }}beritaadmin">
        <i class="fa fa-address-book"></i> <span>Berita/Informasi Terbaru</span>
      </a>
    </li>

    <li>
      <a href="{{ base_url() }}agenadmin">
        <i class="fa fa-address-book"></i> <span>Data Agen</span>
      </a>
    </li>

  </ul>
</li>
@endif --}}