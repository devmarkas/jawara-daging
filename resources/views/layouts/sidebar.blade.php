<div class="main-sidebar" id="sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand" style="padding-bottom: 30px;">
        <img class="logo" src="{{ asset('template') }}/assets/img/logo.svg" alt="logo">
        <span>
          <hr>
          <p>Manage Your Apps</p>
          <hr>
      </span>

      </div>

      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">JD</a>
        <hr style="width: 41px; margin-top: 0px;">
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Request::is('banner*') ? 'active' : '' }}">
          <a class="nav-link" href="/banner">
            <span>Banner</span>
            @if (Request::is('banner*'))
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-banner-active.svg" alt="">
            @else
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-banner.svg" alt="">
            @endif
          </a>
        </li>

        <li class="{{ Request::is('push-notification*') ? 'active' : '' }}">
          <a class="nav-link" href="/push-notification">
            <span>Push Notification</span>
            @if (Request::is('push-notification*'))
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
            @else
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif.svg" alt="">
            @endif
          </a>
        </li>

        <li class="{{ Request::is('term-condition*') ? 'active' : '' }}">
          <a class="nav-link" href="/term-condition">
            <span>Term & Condition</span>
            @if (Request::is('term-condition*'))
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
            @else
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif.svg" alt="">
            @endif
          </a>
        </li>

        <li class="{{ Request::is('faq*') ? 'active' : '' }}">
          <a class="nav-link" href="/faq">
            <span>FAQ</span>
            @if (Request::is('faq*'))
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
            @else
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif.svg" alt="">
            @endif
          </a>
        </li>

        <li class="{{ Request::is('contact-center*') ? 'active' : '' }}">
          <a class="nav-link" href="/contact-center">
            <span>Contact Center</span>
            @if (Request::is('contact-center*'))
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
            @else
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif.svg" alt="">
            @endif
          </a>
        </li>

        <li class="{{ Request::is('pop-up-banner*') ? 'active' : '' }}">
          <a class="nav-link" href="/pop-up-banner">
            <span>Pop Up Banner</span>
            @if (Request::is('pop-up-banner*'))
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
            @else
              <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif.svg" alt="">
            @endif
          </a>
        </li>

        <li class="{{ Request::is('footer-banner*') ? 'active' : '' }} mb-4">
            <a class="nav-link" href="{{ route('footer-banner.index') }}">
              <span>Banner Footer</span>
              @if (Request::is('footer-banner*'))
                <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif-active.svg" alt="">
              @else
                <img class="icon" src="{{ asset('template') }}/assets/img/icon-notif.svg" alt="">
              @endif
            </a>
          </li>

      </ul>
    </aside>
  </div>
