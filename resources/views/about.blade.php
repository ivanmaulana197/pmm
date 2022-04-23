@extends('layouts.master')

@section('content')
 
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Tentang Web</h5>
                </div>
                <div class="card-body">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem assumenda repellendus corporis ex explicabo doloribus deserunt adipisci animi nulla obcaecati quas et ullam officia fugit suscipit aliquam at, voluptas, cupiditate quia esse accusantium atque alias. A iusto aspernatur eaque quia dolorum similique perferendis laudantium omnis, dignissimos, ducimus distinctio sequi natus. Distinctio ut ipsa beatae dicta, odit itaque nihil perspiciatis numquam culpa maiores laboriosam, veritatis error maxime cumque ea saepe natus in quo, alias odio nobis non! Deleniti cum culpa vitae voluptatem! Ducimus fugit ipsam esse provident. Distinctio laboriosam ut iusto. Soluta unde quam consequatur debitis saepe quae dolores delectus laboriosam.</p>
                </div>
            </div>
        </div>
        {{-- sebelah kanan --}}
        <div class="col-lg-4">

            {{-- identitas desa & pemerintahan desa --}}
            @include('home.identitas-desa')

            {{-- aparatur desa --}}
            @include('home.aparatur-desa')

            {{-- lokasi desa --}}
            @include('home.lokasi-desa')

            {{-- lokasi kantor desa --}}
            @include('home.lokasi-kantor-desa')

            
        </div>
    </div>
@endsection
