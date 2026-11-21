@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fa fa-check-circle"></i>

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

        @endif

        <form action="{{ route('settings.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- IDENTITAS --}}
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fa fa-globe"></i>
                        Identitas Website
                    </h4>

                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Nama Website</label>

                                <input type="text"
                                    name="site_name"
                                    class="form-control"
                                    value="{{ old('site_name', $setting->site_name) }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Tagline</label>

                                <input type="text"
                                    name="tagline"
                                    class="form-control"
                                    value="{{ old('tagline', $setting->tagline) }}">

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{-- KONTAK --}}
            <div class="card mt-4">

                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fa fa-envelope"></i>
                        Kontak
                    </h4>

                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Email</label>

                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email', $setting->email) }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Telepon</label>

                                <input type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone', $setting->phone) }}">

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Alamat</label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control">{{ old('address', $setting->address) }}</textarea>

                    </div>

                </div>

            </div>

            {{-- SOSIAL MEDIA --}}
            <div class="card mt-4">

                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fa fa-share-alt"></i>
                        Sosial Media
                    </h4>

                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="url"
                                    name="facebook_url"
                                    class="form-control"
                                    value="{{ old('facebook_url', $setting->facebook_url) }}">
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="url"
                                    name="instagram_url"
                                    class="form-control"
                                    value="{{ old('instagram_url', $setting->instagram_url) }}">
                            </div>

                            <div class="form-group">
                                <label>LinkedIn</label>
                                <input type="url"
                                    name="linkedin_url"
                                    class="form-control"
                                    value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                            </div>

                            <div class="form-group">
                                <label>YouTube</label>
                                <input type="url"
                                    name="youtube_url"
                                    class="form-control"
                                    value="{{ old('youtube_url', $setting->youtube_url) }}">
                            </div>

                            <div class="form-group">
                                <label>TikTok</label>
                                <input type="url"
                                    name="tiktok_url"
                                    class="form-control"
                                    value="{{ old('tiktok_url', $setting->tiktok_url) }}">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Twitter / X</label>
                                <input type="url"
                                    name="twitter_url"
                                    class="form-control"
                                    value="{{ old('twitter_url', $setting->twitter_url) }}">
                            </div>

                            <div class="form-group">
                                <label>Threads</label>
                                <input type="url"
                                    name="threads_url"
                                    class="form-control"
                                    value="{{ old('threads_url', $setting->threads_url) }}">
                            </div>

                            <div class="form-group">
                                <label>Telegram</label>
                                <input type="url"
                                    name="telegram_url"
                                    class="form-control"
                                    value="{{ old('telegram_url', $setting->telegram_url) }}">
                            </div>

                            <div class="form-group">
                                <label>WhatsApp</label>
                                <input type="url"
                                    name="whatsapp_url"
                                    class="form-control"
                                    value="{{ old('whatsapp_url', $setting->whatsapp_url) }}">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- SEO --}}
            <div class="card mt-4">

                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fa fa-line-chart"></i>
                        SEO & Analytics
                    </h4>

                    <hr>

                    <div class="form-group">

                        <label>Meta Title</label>

                        <input type="text"
                            name="meta_title"
                            class="form-control"
                            value="{{ old('meta_title', $setting->meta_title) }}"
                            placeholder="Golekerjo - Portal Lowongan Kerja Indonesia">

                    </div>

                    <div class="form-group">

                        <label>Meta Description</label>

                        <textarea
                            name="meta_description"
                            rows="4"
                            class="form-control"
                            placeholder="Temukan lowongan kerja terbaru di Indonesia...">{{ old('meta_description', $setting->meta_description) }}</textarea>

                    </div>

                    <div class="form-group">

                        <label>Google Search Console Verification</label>

                        <textarea
                            name="google_verification"
                            rows="3"
                            class="form-control"
                            placeholder="google-site-verification=xxxxxxxx">{{ old('google_verification', $setting->google_verification) }}</textarea>

                        <small class="text-muted">
                            Tempel kode verifikasi dari Google Search Console.
                        </small>

                    </div>

                    <div class="form-group">

                        <label>Google Analytics (GA4 ID)</label>

                        <input type="text"
                            name="ga4_id"
                            class="form-control"
                            value="{{ old('ga4_id', $setting->ga4_id) }}"
                            placeholder="G-XXXXXXXXXX">

                    </div>

                    <div class="form-group">

                        <label>Statcounter Code</label>

                        <textarea
                            name="statcounter_code"
                            rows="6"
                            class="form-control"
                            placeholder="<script>...</script>">{{ old('statcounter_code', $setting->statcounter_code) }}</textarea>

                        <small class="text-muted">
                            Tempel script Statcounter lengkap di sini.
                        </small>

                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card mt-4">

                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fa fa-columns"></i>
                        Footer
                    </h4>

                    <hr>

                    <div class="form-group">

                        <label>Footer Text</label>

                        <textarea
                            name="footer_text"
                            rows="4"
                            class="form-control">{{ old('footer_text', $setting->footer_text) }}</textarea>

                        <small class="text-muted">
                            Contoh:
                            © 2026 Golekerjo.com - Semua Hak Dilindungi
                        </small>

                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card mt-4">

                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fa fa-columns"></i>
                        Branding
                    </h4>
                    
                    <hr>

                    <div class="form-group">

                        <label>Logo Besar</label>

                        <input type="file"
                            name="logo"
                            class="form-control">

                    </div>
                    @if($setting->logo)

                    <div class="mb-3">

                        <img src="{{ asset('storage/'.$setting->logo) }}"
                            style="max-height:80px">

                    </div>

                    @endif
                    <div class="form-group">

                        <label>Logo Kecil</label>

                        <input type="file"
                            name="logo_small"
                            class="form-control">

                    </div>

                    @if($setting->logo_small)

                    <div class="mb-3">

                        <img src="{{ asset('storage/'.$setting->logo_small) }}"
                            style="max-height:60px">

                    </div>

                    @endif

                    <div class="form-group">

                        <label>Favicon</label>

                        <input type="file"
                            name="favicon"
                            class="form-control">

                    </div>

                    @if($setting->favicon)

                    <div class="mb-3">

                        <img src="{{ asset('storage/'.$setting->favicon) }}"
                            style="max-height:32px">

                    </div>

                    @endif

                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="card mt-4">

                <div class="card-body text-center">

                    <button type="submit"
                            class="btn btn-primary px-5">

                        <i class="fa fa-save"></i>
                        Simpan Pengaturan

                    </button>

                </div>

            </div>

        </form>

    </div>
</div>

@endsection