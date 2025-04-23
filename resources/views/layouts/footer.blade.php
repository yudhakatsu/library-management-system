<style>
    .footer {
            background-color: #EFD4A0;
            color: #000;
            padding: 20px;
            text-align: center;
            font-size: 18px;
        }
</style>

<!-- Footer -->
<footer class="kontak" id="kontak" style="background-color: #3f366b; color: white; padding: 30px 60px; margin: 20px 30px; border-radius: 20px; box-shadow: 5px 5px 4px 0px #2E2751; margin-bottom: 50px">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
        <!-- Hubungi Kami -->
        <div style="flex: 1; min-width: 500px; margin-bottom: 20px; line-height: 20px;">
            <h3 style="color: #fff; margin-bottom: 20px; font-size: 20px; font-weight: bold;">HUBUNGI KAMI</h3>
            <p><img src="{{asset('images/icon-whatsapp.png')}}" alt="" style="padding-right: 10px; width: 33px"> +62 858-4257-7753</p>
            <p><img src="{{asset('images/icon-email.png')}}" alt="" style="padding-right: 10px; width: 33px"> perpustakaansmkbaitussalam@gmail.com</p>
            <p><img src="{{asset('images/icon-instagram.png')}}" alt="" style="padding-right: 10px; width: 33px"> @perpus_smkbaitussalam</p>
        </div>

        <!-- Jam Operasional -->
        <div style="flex: 1; min-width: 300px; margin-bottom: 20px; justify-self: center; margin-right: 100px;">
            <h3 style="color: #fff; margin-bottom: 20px; font-size: 20px; font-weight: bold;" >JAM OPERASIONAL</h3>
            <p><img src="{{asset('images/icon-jam.png')}}" alt="" style="padding-right: 10px; width: 33px"> Senin - Jum'at: 07:00 - 14:00 WIB</p>
        </div>

        <!-- Halaman -->
        <div style="flex: 1; min-width: 200px; margin-bottom: 20px; justify-self: end;">
            <h3 style="color: #fff; margin-bottom: 20px; font-size: 20px; font-weight: bold;">HALAMAN</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="padding-bottom: 5px;"><a href="{{ route('homepage') }}" style="color: white; text-decoration: none"><img src="{{asset('images/icon-arrow.png')}}" alt="" style="padding-right: 10px;"> Dasboard</a></li>
                <li style="padding-bottom: 5px;"><a href="{{ route('homepage') }}#carouselExampleControlsNoTouching" style="color: white; text-decoration: none"><img src="{{asset('images/icon-arrow.png')}}" alt="" style="padding-right: 10px;"> Tentang</a></li>
                <li style="padding-bottom: 5px;"><a href="{{ route('homepage') }}#layanan" style="color: white; text-decoration: none"><img src="{{asset('images/icon-arrow.png')}}" alt="" style="padding-right: 10px;"> Layanan</a></li>
                <li style="padding-bottom: 5px;"><a href="{{ route('homepage') }}#struktur" style="color: white; text-decoration: none"><img src="{{asset('images/icon-arrow.png')}}" alt="" style="padding-right: 10px;"> Organisasi</a></li>
                <li style="padding-bottom: 5px;"><a href="#kontak" style="color: white; text-decoration: none"><img src="{{asset('images/icon-arrow.png')}}" alt="" style="padding-right: 10px;"> Kontak</a></li>
            </ul>
        </div>
    </div>

    <!-- Alamat -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
        <h3 style="color: #fff;">ALAMAT</h3>
        <div style="display: flex; flex-direction: row;">
            <img src="{{asset('images/icon-lokasi.png')}}" alt="" style="padding-right: 20px; width: 45px; height: 45px; padding-top: 3px;">
            <p> Jl. Darma Bakti No.3, Medono,<br>
                Kec. Pekalongan Barat, Kota Pekalongan, Jawa Tengah 51111
            </p>
        </div>
    </div>
</footer>

<footer class="footer">
    © 2024 All Rights Reserved.
</footer>