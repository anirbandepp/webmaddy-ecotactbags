@extends('layouts.front-layout')
@section('title', 'Ecotact | Refund and Return policy')
@section('description', 'Explore the refund policy and return policy of Ecotact for cancellations and refund and more ')
@section('keywords', 'Refund policy, Return policy, ecotact')
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
          <div class="title-caption center">Ecotact</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{!! __('return.title') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section _100-0">
    <div class="main-wrapper">
      <div class="terms-container">
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('return.First') !!}</div>
        </div>
        <ul role="list">
          <li class="list-item">
            <div class="body-text">{!! __('return.You') !!}</div>
          </li>
          <li class="list-item">
            <div class="body-text">{!! __('return.you2') !!}
            </div>
          </li>
          <li class="list-item">
            <div class="body-text">{!! __('return.As') !!}</div>
          </li>
          <li class="list-item">
            <div class="body-text">{!! __('return.When') !!}</div>
          </li>
          <li class="list-item">
            <div class="body-text"><strong>{!! __('return.For') !!}</strong></div>
          </li>
        </ul>
        <ul role="list" class="char-list details">
          <li class="list-item">
            <div class="body-text">{!! __('return.As') !!}<br></div>
          </li>
          <li class="list-item">
            <div class="body-text">{!! __('return.Once') !!}</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@stop