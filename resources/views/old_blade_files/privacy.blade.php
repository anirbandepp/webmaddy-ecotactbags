@extends('layouts.front-layout')
@section('title', 'Ecotact | Privacy policy')
@section('description', 'Privacy policy of Ecotact describes how your personal information is collected, used, and shared when you visit or make a purchase ')
@section('keywords', 'Privacy policy, ecotact')
@section('content')
<style>
    .green-text{
        color:#0c6a35;
        font-weight: 500;
    }
</style>
  @include('hamburger-dropdown')
  <div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{{ __('privacy.ecotact') }}</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{{ __('privacy.Privacy') }}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section _100-0">
    <div class="main-wrapper">
      <div class="terms-container">
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.text1') !!}</a>
          </div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.personal') !!} </h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.personal') !!}<br><br>{!! __('privacy.pertext2') !!}<br></div>
          <ul role="list" class="bullete-list">
            <li class="list-item">
              <div class="body-text">{!! __('privacy.pertext3') !!}</a></div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.pertext4') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.pertext5') !!}</div>
            </li>
          </ul>
          <div class="body-text"><br>{!! __('privacy.Additionally') !!}<br></div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.USAGE') !!}</h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.We') !!}<br><br></div>
          <ul role="list" class="bullete-list">
            <li class="list-item">
              <div class="body-text">{!! __('privacy.Communicate') !!}<br></div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.Screen') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.when') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.Weuse') !!}</div>
            </li>
          </ul>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.SHARING') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.SHARINGTxt') !!}</div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.DO') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.doTxt') !!}</div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.RIGHTS') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.RIGHTSTxt1') !!}<br></div>
          <ul role="list" class="char-list">
            <li class="list-item">
              <div class="body-text"><b>2.</b>{!! __('privacy.RIGHTSTxt2') !!}<br></div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt3') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt4') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt5') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt6') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt7') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt8') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt9') !!}</div>
            </li>
            <li class="list-item" @if(config('app.lang')->slug == 'sp') style="list-style-type: upper-alpha;" @endif>
              <div class="body-text">{!! __('privacy.RIGHTSTxt10') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.RIGHTSTxt11') !!}</div>
            </li>
          </ul>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.changes') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.changesTxt1') !!}</div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.our') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <ul role="list" class="number-list">
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt1') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt2') !!}</div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt3') !!}</div>
            </li>
          </ul>
          <ul role="list" class="char-list details">
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt4') !!}<br></div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt5') !!}<br></div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt6') !!}<br></div>
            </li>
            <li class="list-item">
              <div class="body-text">{!! __('privacy.ourTxt7') !!}<br></div>
            </li>
          </ul>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('privacy.contact') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('privacy.conText') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@stop