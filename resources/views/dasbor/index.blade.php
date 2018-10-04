<div class="row">

  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-4">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $jmlNPWP }}</h3>
            <p>DATA NPWP</p>
          </div>
          <div class="icon">
            <i class="fa fa-list-alt"></i>
          </div>
          <a href="{{ route('wajib-pajak.index') }}" class="small-box-footer">
            Selengkapnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      @include('dasbor.kalender')
      {{-- <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $jmlBelumBayar }}</h3>
            <p>BELUM BAYAR PAJAK</p>
          </div>
          <div class="icon">
            <i class="fa fa-warning"></i>
          </div>
          <a href="{{ route('wajib-pajak.index') }}" class="small-box-footer">
            Selengkapnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>{{ $jmlSebagian }}</h3>
            <p>BAYAR SEBAGIAN</p>
          </div>
          <div class="icon">
            <i class="fa fa-print"></i>
          </div>
          <a href="{{ route('wajib-pajak.index') }}" class="small-box-footer">
            Selengkapnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>{{ $jmlSudahBayar }}</h3>
            <p>SUDAH BAYAR PAJAK</p>
          </div>
          <div class="icon">
            <i class="fa fa-print"></i>
          </div>
          <a href="{{ route('wajib-pajak.index') }}" class="small-box-footer">
            Selengkapnya <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div> --}}
    </div>
  </div>

  {{-- <div class="col-lg-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Pembayaran Pajak Bulanan</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">
              <strong>Pajak: 1 Januari, {{ date('Y') }} - 31 Desember, {{ date('Y') }}</strong>
            </p>

            <div class="chart">
              <canvas id="salesChart" style="height: 180px;"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="description-block border-right">
              <h5 class="description-header">{{ $jmlNPWP }}</h5>
              <span class="description-text">DATA NPWP</span>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="description-block border-right">
              <h5 class="description-header">{{ $jmlBelumBayar }}</h5>
              <span class="description-text">BELUM BAYAR</span>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="description-block border-right">
              <h5 class="description-header">{{ $jmlSebagian }}</h5>
              <span class="description-text">BAYAR SEBAGIAN</span>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="description-block">
              <h5 class="description-header">{{ $jmlSudahBayar }}</h5>
              <span class="description-text">SUDAH BAYAR</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>