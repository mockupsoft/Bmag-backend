@extends('admin.parent')

@section('sidebar')
    @include('admin.sidebar', ['page' => 'news'])
@endsection

@section('css')

@endsection

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Haber Düzenle</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="index.html" class="text-muted text-hover-primary">Gösterge Paneli</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.news.index') }}" class="text-muted text-hover-primary">Haberler</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Haber Düzenle
                            </li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form class="form" method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title fs-3 fw-bold">Genel Bilgiler</div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="fv-row">
                                                <label for="" class="form-label required">İç Başlık</label>
                                                <input type="text" class="form-control form-control-solid @error('in_title') is-invalid @enderror" name="in_title" value="{{ old('in_title', $news->in_title) }}" />
                                                @error('in_title')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="fv-row">
                                                <label for="" class="form-label required">Dış Başlık</label>
                                                <input type="text" class="form-control form-control-solid @error('out_title') is-invalid @enderror" name="out_title" value="{{ old('out_title', $news->out_title) }}" />
                                                @error('out_title')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="fv-row">
                                                <label for="" class="form-label required">Kısa Özet</label>
                                                <textarea name="summary" id="" cols="30" rows="5" class="form-control form-control-solid @error('summary') is-invalid @enderror" style="resize: none">{!! old('summary', $news->summary) !!}</textarea>
                                                @error('summary')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="fv-row">
                                                <label for="" class="form-label required">İçerik</label>
                                                <textarea name="content" id="content" cols="30" rows="10" class="form-control form-control-solid @error('content') is-invalid @enderror" style="resize: none">{!! old('content', $news->content) !!}</textarea>
                                                @error('content')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--end:Form-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Card-->
                                <div class="card"  style="margin-top: 35px">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title fs-3 fw-bold">Görseller</div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="fv-row">
                                                    <label for="" class="form-label required">Büyük Görsel (1300 x 720)</label>
                                                    <input type="file" class="form-control" name="large_image">
                                                    @error('large_image')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    @if($news->large_image)
                                                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative" style="margin-top: 10px">
                                                            <img src="{{ $news->large_image }}" alt="">
                                                        </div>
                                                        <input type="checkbox" name="delete_cover_image" id="delete_cover_image">
                                                        <label for="delete_cover_image">Görseli sil</label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fv-row">
                                                    <label for="" class="form-label required">Haber Detay Görseli (650 x 360)</label>
                                                    <input type="file" class="form-control" name="news_detail_image">
                                                    @error('news_detail_image')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    @if($news->news_detail_image)
                                                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative" style="margin-top: 10px">
                                                            <img src="{{ $news->news_detail_image }}" alt="">
                                                        </div>
                                                        <input type="checkbox" name="delete_cover_image" id="delete_cover_image">
                                                        <label for="delete_cover_image">Görseli sil</label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fv-row">
                                                    <label for="" class="form-label required">Liste Görseli (426 x 240)</label>
                                                    <input type="file" class="form-control" name="list_image">
                                                    @error('list_image')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    @if($news->list_image)
                                                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative" style="margin-top: 10px">
                                                            <img src="{{ $news->list_image }}" alt="">
                                                        </div>
                                                        <input type="checkbox" name="delete_cover_image" id="delete_cover_image">
                                                        <label for="delete_cover_image">Görseli sil</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                    <!--end:Form-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Card-->
                                <div class="card" style="margin-top: 35px">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title fs-3 fw-bold">Meta Bilgileri</div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Başlık (Meta Title)</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <input type="text" class="form-control form-control-solid @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title', $news->meta_title) }}" />
                                                @error('meta_title')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Açıklama (Meta Description)</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <input type="text" class="form-control form-control-solid @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description', $news->meta_description) }}" />
                                                @error('meta_description')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Anahtar Kelimeler (Meta Keywords)</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <input type="text" class="form-control form-control-solid @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ old('meta_keywords', $news->meta_keywords) }}" />
                                                @error('meta_keywords')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Meta Robots</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <select name="meta_robots" id="meta_robots_id" class="form-control form-control-solid">
                                                    <option value="">Seçiniz</option>
                                                    <option value="index, robots" @selected(old('meta_robots') === "index, robots")>index, robots</option>
                                                    <option value="noindex, follow" @selected(old('meta_robots') === "noindex, follow")>noindex, follow</option>
                                                    <option value="noindex, nofollow" @selected(old('meta_robots') === "noindex, nofollow")>noindex, nofollow</option>
                                                </select>
                                                @error('meta_robots')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Card footer-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <a href="{{ route('admin.news.index') }}" class="btn btn-light btn-active-light-primary me-2">Vazgeç</a>
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </div>
                                    <!--end::Card footer-->
                                    <!--end:Form-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-md-3">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title fs-3 fw-bold">Yayın Bilgileri</div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="fv-row">
                                                <label for="" class="form-label required">Yayın Zamanı</label>
                                                <input type="date" class="form-control" name="published_at">
                                                @error('published_at')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <div class="col-md-6">
                                                <!--begin::Col-->
                                                <div class="fv-row">
                                                    <label for="" class="form-label required">Kategori</label>
                                                    <select name="category_id" id="category_id" class="form-control form-control-solid">
                                                        <option value="">Seçiniz</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" @selected(old('category_id') ? old('category_id') == $category->id : $news->category_id == $category->id)>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!--begin::Col-->
                                                <div class="fv-row">
                                                    <label for="" class="form-label required">Dergi</label>
                                                    <select name="magazine_id" id="magazine_id" class="form-control form-control-solid">
                                                        <option value="">Seçiniz</option>
                                                        @foreach($magazines as $magazine)
                                                            <option value="{{ $magazine->id }}"  @selected(old('magazine_id') ? old('magazine_id') == $magazine->id : $news->magazine_id == $magazine->id)>{{ $magazine->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('magazine_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-8">
                                            <div class="fv-row">
                                                <label for="" class="form-label required">Yayın Durumu</label>
                                                <select name="is_published" id="is_published_id" class="form-control form-control-solid">
                                                    <option value="1" @selected(old('is_published') ? old('is_published') == 1 : $news->is_published == 1)>Aktif</option>
                                                    <option value="0" @selected(old('is_published') ? old('is_published') == 0 : $news->is_published == 0)>Pasif</option>
                                                </select>
                                                @error('is_published_id')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <div class="col-md-12">
                                                <!--begin::Col-->
                                                <div class="fv-row">
                                                    <label class="form-label">Etiketler</label>
                                                    <input class="form-control" name="tags" value="{{ $news->tags }}" id="kt_tagify_1"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--end:Form-->
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="javascript:void(0);" class="text-gray-800 text-hover-primary">Big Medya</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="javascript:void(0);" onclick="alert('Yakında')" class="menu-link px-2">Destek</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection

@section('js')
    <script>
        var input1 = document.querySelector("#kt_tagify_1");
        const tagify = new Tagify(input1, {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });
    </script>
@endsection
