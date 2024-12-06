@extends('layouts.new_frontlayout')

@if (config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Ecotact Green Coffee Bags | Coffee Packaging Supplier | Bolsas Cafe')
    @section('description',
        'Ecotact is a coffee packaging supplier providing reusable green coffee bags with
        eco-friendly packaging for beans &amp; grains. comprar bolsas de almacenamiento de café.')
    @section('keywords',
        'green coffee bags,eco friendly coffee packaging,reusable coffee bags,coffee packaging
        bags,coffee packaging supplier,coffee packaging,green coffee packaging,green coffee bean bags,bolsas
        packaging,bolsas cafe,bolsas para packaging')
    @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Ecotact Green Coffee Bags | Coffee Packaging Supplier | Bolsas Cafe')
    @section('description', 'bags with eco-friendly packaging for beans & grains. comprar bolsas de')
    @section('keywords',
        'green coffee bags,eco friendly coffee packaging,reusable coffee bags,coffee packaging
        bags,coffee packaging supplier,coffee packaging,green coffee packaging,green coffee bean bags,bolsas
        packaging,bolsas cafe,bolsas para packaging')
    @else
    @section('title', 'Ecotact Green Coffee Bags | Coffee Packaging Supplier | Bolsas Cafe')
    @section('description', 'almacenamiento de café.')
    @section('keywords',
        'green coffee bags,eco friendly coffee packaging,reusable coffee bags,coffee packaging
        bags,coffee packaging supplier,coffee packaging,green coffee packaging,green coffee bean bags,bolsas
        packaging,bolsas cafe,bolsas para packaging')
    @endif

@section('content')
    <style>
        .logos-award img {
            max-width: 90px;
            display: inline-block;
            margin: 0px 15px 15px 0px;
        }

        @media only screen and (max-width : 768px) {
            .owl-123 {
                width: 100%;
            }
        }

        .logos-award img {
            max-width: 140px;
        }
    </style>

    <div class="banner">
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('assets/front/img/homebanner.mp4') }}" type="video/mp4">
        </video>
        <div class="banner-content">
            <div class="container">
                <div class="banner-text">
                    <h1>{{ __('home.bannerText') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="section about-section" style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <span class="prakashdanewlogo"><a target="_blank"
                            href="https://allianceforcoffeeexcellence.org/blog/2022/06/13/cup-of-excellence-alliance-for-coffee-excellence-team-up-with-ecotact/"><img
                                src="{{ asset('assets/front/img/ecotag-logo-package.png') }}"></a></span>
                    <div class="common-header mt30 mb30">
                        <h2>{!! __('home.globally') !!}</h2>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="about-text pad-right60 mb30">
                                <p>{!! __('home.inbriefText') !!}</p>
                                <a href="{{ route('about-us') }}" class="btn btn-primary">{!! __('home.Know More') !!}</a>
                            </div>

                            <div class="logos-award">
                                <a
                                    href="{{ route('productFullView', ['category' => 'packaging', 'slug' => 'troiseal-bags']) }}"><img
                                        src="{{ asset('awards/sca-logo.jpg') }}?v=0.1" class="img-responsive"
                                        alt="ecotactbags"></a>
                                <a
                                    href="{{ route('productFullView', ['category' => 'storage', 'slug' => 'ship-shield-hermetic-container-liners']) }}"><img
                                        src="{{ asset('awards/scaj-logo.jpg') }}" class="img-responsive"
                                        alt="ecotactbags"></a>
                            </div>


                        </div>
                        <div class="col-md-5">
                            <div class="about-image">
                                <img src="{{ asset('assets/front/img/about1.jpg') }}" class="img-responsive"
                                    alt="ecotactbags">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section funded-section pt0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="funded-bg">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="funded-head mb50">
                                    <p class="green-color mb5">{!! __('home.Here for Good') !!}</p>
                                    <h2 class="black-color">{!! __('home.FOUNDED WITH A MISSION') !!}</h2>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="funded-info mb30">
                                    <h2>2</h2>
                                    <span class="mb10">{!! __('home.DECADES') !!}</span>
                                    <p>{!! __('home.Founded in 2005 to protect the value of your products during storage and transit.') !!}</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="funded-info mb30">
                                    <h2>45+</h2>
                                    <span class="mb10">{!! __('home.COUNTRIES') !!}</span>
                                    <p>{!! __('home.Global presence of our packaging solutions.') !!}</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="funded-info mb30">
                                    <h2>18m+</h2>
                                    <span class="mb10">{!! __('home.BAGS SOLD') !!}</span>
                                    <p>{!! __('home.Maintained freshness with variety and value.') !!}</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="funded-info mb30">
                                    <h2>100%</h2>
                                    <span class="mb10">{!! __('home.RECYCLABLE') !!}</span>
                                    <p>{!! __('home.Our step to a sustainable future.') !!}</p>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{ route('contact') }}#enquiry-form"
                                    class="btn btn-primary btn-primary2 margin-top-minus">{!! __('home.ENQUIRE NOW') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section beifit-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb50">
                    <h2>{!! __('home.Benefits') !!}</h2>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-6 mb30">
                            <div class="benifit-box">
                                <img src="{{ asset('assets/front/img/benifit1.svg') }}" alt="ecotactbags"
                                    class="benifit-img">
                                <div class="benifit-info">
                                    <h3>{!! __('home.Diversity') !!}</h3>
                                    <p>{!! __('home.Diversity.text') !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb30">
                            <div class="benifit-box">
                                <img src="{{ asset('assets/front/img/benifit2.svg') }}" alt="ecotactbags"
                                    class="benifit-img">
                                <div class="benifit-info">
                                    <h3>{!! __('home.Affordability') !!}</h3>
                                    <p>{!! __('home.Affordability.text') !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb30">
                            <div class="benifit-box">
                                <img src="{{ asset('assets/front/img/benifit3.svg') }}" alt="ecotactbags"
                                    class="benifit-img">
                                <div class="benifit-info">
                                    <h3>{!! __('home.Delivery') !!}</h3>
                                    <p>{!! __('home.Delivery.text') !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb30">
                            <div class="benifit-box">
                                <img src="{{ asset('assets/front/img/benifit4.svg') }}" alt="ecotactbags"
                                    class="benifit-img">
                                <div class="benifit-info">
                                    <h3>{!! __('home.Shelf-life') !!}</h3>
                                    <p>{!! __('home.Shelf-life.text') !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb30">
                            <div class="benifit-box last-benifit-box">
                                <img src="{{ asset('assets/front/img/benifit5.svg') }}" alt="ecotactbags"
                                    class="benifit-img">
                                <div class="benifit-info">
                                    <h3>{!! __('home.Sustainability') !!}</h3>
                                    <p>{!! __('home.Sustainability.text') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section who-am-i">
        <div class="container">
            <div class="row card mb50" id="exporter">
                <div class="col-md-12 text-center mb30 iam-area">
                    <h2 class="who-am-h2">
                        <img src="{{ asset('assets/front/img/iam1.svg') }}" alt="ecotactbags" class="nav-tab-img">
                        {!! __('home.i') !!}
                        <!-- <select>
                        <option>Exporter</option>
                        <option>Farmer / Processor</option>
                        <option>Importer / Roaster</option>
                        <option>Explorer</option>
                      </select> -->
                        <div class="dropdown who-select show ">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {!! __('home.exporter') !!} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" onclick="changeDiv('exporter','exporterProducts')"
                                    href="javascript:void(0)">{!! __('home.exporter') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('importer','importerProducts')"
                                    href="javascript:void(0)">{!! __('home.importer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('farmer','farmerProducts')"
                                    href="javascript:void(0)">{!! __('home.farmer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('explorer','explorerProducts')"
                                    href="javascript:void(0)">{!! __('home.explorer') !!}</a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="col-md-12  tab-content">
                    <div class="tab-contents">
                        <h2><img src="{{ asset('assets/front/img/h2-decor.svg') }}" alt="ecotactbags"
                                class="img-responsive">{!! __('home.Perfect') !!}</h2>
                        <p>{!! __('home.Perfect.text') !!}</p>
                        <ul>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point1') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point2') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point3') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point4') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point5') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point6') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point7') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point8') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point9') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point10') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point11') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.exporter.point12') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row card mb50" id="farmer">
                <div class="col-md-12 text-center mb30 iam-area">
                    <h2 class="who-am-h2">
                        <img src="{{ asset('assets/front/img/iam2.svg') }}" alt="ecotactbags" class="nav-tab-img">
                        {!! __('home.i') !!}
                        <!-- <select>
                        <option>Farmer / Processor</option>
                        <option>Exporter</option>
                        <option>Importer / Roaster</option>
                        <option>Explorer</option>
                      </select> -->
                        <div class="dropdown who-select show  Farmer-Processor">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{!! __('home.farmer') !!}<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" onclick="changeDiv('exporter','exporterProducts')"
                                    href="javascript:void(0)">{!! __('home.exporter') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('importer','importerProducts')"
                                    href="javascript:void(0)">{!! __('home.importer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('farmer','farmerProducts')"
                                    href="javascript:void(0)">{!! __('home.farmer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('explorer','explorerProducts')"
                                    href="javascript:void(0)">{!! __('home.explorer') !!}</a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="col-md-12  tab-content">
                    <div class="tab-contents">
                        <h2><img src="{{ asset('assets/front/img/h2-decor.svg') }}" alt="ecotactbags"
                                class="img-responsive">{!! __('home.farmer.Perfect') !!}</h2>
                        <p>{!! __('home.farmer.Perfect.text') !!}</p>
                        <ul>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point1') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point2') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point3') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point7') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point4') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point5') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.farmer.point6') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row card mb50" id="importer">
                <div class="col-md-12 text-center mb30 iam-area">
                    <h2 class="who-am-h2">
                        <img src="{{ asset('assets/front/img/iam3.svg') }}" alt="ecotactbags" class="nav-tab-img">
                        {!! __('home.i') !!}
                        <!-- <select>
                        <option>Importer / Roaster</option>
                        <option>Farmer / Processor</option>
                        <option>Exporter</option>
                        <option>Explorer</option>
                      </select> -->
                        <div class="dropdown who-select show  Farmer-Processor">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{!! __('home.importer') !!}<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" onclick="changeDiv('exporter','exporterProducts')"
                                    href="javascript:void(0)">{!! __('home.exporter') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('importer','importerProducts')"
                                    href="javascript:void(0)">{!! __('home.importer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('farmer','farmerProducts')"
                                    href="javascript:void(0)">{!! __('home.farmer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('explorer','explorerProducts')"
                                    href="javascript:void(0)">{!! __('home.explorer') !!}</a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="col-md-12  tab-content">
                    <div class="tab-contents">
                        <h2><img src="{{ asset('assets/front/img/h2-decor.svg') }}" alt="ecotactbags"
                                class="img-responsive">{!! __('home.importer.Perfect') !!}</h2>
                        <p>{!! __('home.importer.Perfect.text') !!}</p>
                        <ul>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}" alt="ecotactbags">
                                {!! __('home.importer.point1') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.importer.point2') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.importer.point3') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.importer.point4') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.importer.point5') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.importer.point6') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row card mb50" id="explorer">
                <div class="col-md-12 text-center mb30 iam-area">
                    <h2 class="who-am-h2">
                        <img src="{{ asset('assets/front/img/iam4.svg') }}" alt="ecotactbags" class="nav-tab-img">
                        {!! __('home.i') !!}
                        <!-- <select>
                        <option>Explorer</option>
                        <option>Importer / Roaster</option>
                        <option>Farmer / Processor</option>
                        <option>Exporter</option>
                      </select> -->
                        <div class="dropdown who-select show ">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {!! __('home.explorer') !!}<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" onclick="changeDiv('exporter','exporterProducts')"
                                    href="javascript:void(0)">{!! __('home.exporter') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('importer','importerProducts')"
                                    href="javascript:void(0)">{!! __('home.importer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('farmer','farmerProducts')"
                                    href="javascript:void(0)">{!! __('home.farmer') !!}</a>
                                <a class="dropdown-item" onclick="changeDiv('explorer','explorerProducts')"
                                    href="javascript:void(0)">{!! __('home.explorer') !!}</a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="col-md-12  tab-content">
                    <div class="tab-contents">
                        <h2><img src="{{ asset('assets/front/img/h2-decor.svg') }}" alt="ecotactbags"
                                class="img-responsive">{!! __('home.explorer.Perfect') !!}</h2>
                        <p>{!! __('home.explorer.Perfect.text') !!}</p>
                        <ul>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.explorer.point1') !!} </li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.explorer.point2') !!} </li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.explorer.point3') !!} </li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.explorer.point4') !!}</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.explorer.point5') !!} Customized branding available</li>
                            <li><img src="{{ asset('assets/front/img/bullet-check.svg') }}"
                                    alt="ecotactbags">{!! __('home.explorer.point6') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section ideal-products pt0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 headings text-center mb50">
                    <h2 class="mb30">{!! __('home.ideal') !!}</h2>
                    <h3>{!! __('home.idealtext1') !!}</h3>
                </div>
                <div class="col-md-12">
                    <div class="all-products" id="exporterProducts">
                        @foreach ($exporters as $product)
                            <div class="singel-product">
                                <a
                                    href="{{ route('productFullView', ['category' => $product->categories()->first()->slug, 'slug' => $product->slug]) }}">
                                    <img src="{{ $product->base_img? asset('product_images/large/' .$product->productImages()->where('ideal', 1)->first()->url): asset('front-end/images/Mask-Group.png') }}"
                                        alt="Hermetic packaging solutions Ecotact Bags" class="img-responsive">
                                    <div class="product-name">
                                        <p>{{ @$product->productDetails[0]['product_name'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="all-products" id="farmerProducts">
                        @foreach ($farmers as $product)
                            <div class="singel-product">
                                <a
                                    href="{{ route('productFullView', ['category' => $product->categories()->first()->slug, 'slug' => $product->slug]) }}">
                                    <img src="{{ $product->base_img? asset('product_images/large/' .$product->productImages()->where('ideal', 1)->first()->url): asset('front-end/images/Mask-Group.png') }}"
                                        alt="Hermetic packaging solutions Ecotact Bags" class="img-responsive">
                                    <div class="product-name">
                                        <p>{{ @$product->productDetails[0]['product_name'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="all-products" id="importerProducts">
                        @foreach ($importers as $product)
                            <div class="singel-product">
                                <a
                                    href="{{ route('productFullView', ['category' => $product->categories()->first()->slug, 'slug' => $product->slug]) }}">
                                    <img src="{{ $product->base_img? asset('product_images/large/' .$product->productImages()->where('ideal', 1)->first()->url): asset('front-end/images/Mask-Group.png') }}"
                                        alt="Hermetic packaging solutions Ecotact Bags" class="img-responsive">
                                    <div class="product-name">
                                        <p>{{ @$product->productDetails[0]['product_name'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="all-products" id="explorerProducts">
                        @foreach ($explorers as $product)
                            <div class="singel-product">
                                <a
                                    href="{{ route('productFullView', ['category' => $product->categories()->first()->slug, 'slug' => $product->slug]) }}">
                                    <img src="{{ $product->base_img? asset('product_images/large/' .$product->productImages()->where('ideal', 1)->first()->url): asset('front-end/images/Mask-Group.png') }}"
                                        alt="Hermetic packaging solutions Ecotact Bags" class="img-responsive">
                                    <div class="product-name">
                                        <p>{{ @$product->productDetails[0]['product_name'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 headings text-center mb50">
                    <h2 class="mb30">Testimonials - Happy Clients</h2>
                    <!--<h3>{!! __('home.idealtext1') !!}</h3>-->
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-md-12 text-center mb50">
                    <h2>Testimonials</h2>
                  </div> -->
                <div class="col-md-10 col-md-offset-1">
                    <div id="testimonial-slider" class="owl-carousel">
                        <div class="item">
                            <div class="testimonial-box">
                                <p>{!! __('home.testi1') !!}</p>
                                <h4>JJ, RTC, {{ __('home.Rwanda') }}</h4>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-box">
                                <p>{!! __('home.testi2') !!}</p>
                                <h4>Carlos Melen, Good Coffee Farms, {{ __('home.Japan-Guatemala') }}</h4>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-box">
                                <p>{!! __('home.testi3') !!}</p>
                                <h4>Stasi Baranoff, Uncommon Cacao, {{ __('home.USA') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section instra-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row row-flex">
                        <div class="col-md-4">
                            <a href="https://www.instagram.com/ecotact/"><img
                                    src="{{ asset('assets/front/img/instagram-icon.png') }}" alt="ecotactbags"
                                    class="img-responsive" style="width:50px"></a>
                            <h2>{!! __('home.insta') !!}</h2>
                        </div>
                        <div class="col-md-8">
                            <!--<div id="w-node-_3c16a67a-799d-5f21-27cc-92850faddf86-e97b72a1"></div>-->
                            <div class="grid-insta" id="w-node-_3c16a67a-799d-5f21-27cc-92850faddf86-e97b72a1">
                            </div>
                        </div>
                    </div>
                    <!--<div class="instra-head">-->
                    <!--  <img src="{{ asset('assets/front/img/instagram-icon.png') }}" alt="ecotactbags" class="img-responsive">-->
                    <!--  <div class="clear-fix"></div>-->
                    <!--  <h2>{!! __('home.insta') !!}</h2>-->
                    <!--  <div id="w-node-_3c16a67a-799d-5f21-27cc-92850faddf86-e97b72a1" ></div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>

    <style>
        .row-flex {
            display: flex;
            align-items: center;
        }

        .grid-insta {
            display: grid;
            grid-gap: 15px;
            grid-template-columns: repeat(3, 1fr);
            width: 100%;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
    <script type="text/javascript">
        var userFeed = new Instafeed({
            get: 'user',
            target: "w-node-_3c16a67a-799d-5f21-27cc-92850faddf86-e97b72a1",
            resolution: 'low_resolution',
            accessToken: 'IGQVJVVkFfUTdJalZAXZAUQtWHBTS0daaTJCMXRuOE9GUTRIQU1JbXpwZAXl2cjB2azNBbjNCWnZAYRHB5NWwzOVFLaUZAoY1hPQW94WGpDVlZANVk1zNjJPTGlNSFJ6XzlWSFNGYjFjVGN1YkV2R1NpZAERidQZDZD',
            limit: 9,
            templateBoundaries: ['{', '}'],
            template: '<div class="items"><a href="{link}"><img title="{caption}" src="{image}" class="insta-images img-responsive items" style="border-radius: 4px;"/></a></div>',

        });
        userFeed.run();
    </script>
@stop
