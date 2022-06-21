@extends('layouts.app_martina')
<style>

    .contact-page {
        padding-top: 6.875rem;
        padding-bottom: 1rem; }
    .contact-page__short-title {
        display: inline-block;
        font-size: 1.25rem;
        color: #cccccc;
        font-weight: 300;
        margin: 0; }
    .contact-page__title {
        color: #333333;
        font-weight: 600;
        margin-bottom: 0.625px; }
    .contact-page__description {
        margin-bottom: 2rem; }

    .contact-map #mapSingle {
        height: 30rem; }

    /* Custom Zoom Buttons
------------------------------------- */
    .custom-zoom-in,
    .custom-zoom-out {
        background-color: #fff;
        color: #333;
        cursor: pointer;
        margin: 5px 8px;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        text-align: center;
        font-size: 14px;
        height: 34px;
        width: 34px; }

    .custom-zoom-in:hover,
    .custom-zoom-out:hover {
        background-color: #17286E;
        color: #fff; }

    .custom-zoom-in:before,
    .custom-zoom-out:before {
        font-family: "LineAwesome";
        width: 100%;
        line-height: 35px; }

    .zoomControlWrapper {
        position: absolute;
        top: 0;
        bottom: auto;
        width: 70px; }

    .custom-zoom-in:before {
        content: "\f2c2"; }

    .custom-zoom-out:before {
        content: "\f28e"; }

    /* Prev & Next Buttons
------------------------------------- */
    #mapnav-buttons {
        position: absolute;
        transform: translate(0, 0);
        z-index: 999;
        font-size: 14px;
        display: inline-block;
        bottom: 20px;
        right: 20px;
        list-style: none;
        padding: 0; }

    #mapnav-buttons.top {
        top: 20px;
        right: 20px;
        bottom: auto; }


    #streetView,
    #geoLocation,
    #scrollEnabling,




    #prevpoint:before,
    #nextpoint:after {
        font-family: "FontAwesome";
        position: relative;
        font-weight: 500;
        margin: 0 0 0 6px;
        font-size: 17px;
        top: 0px;
        line-height: 1px; }

    #prevpoint:before {
        content: "\f104";
        margin: 0 6px 0 0; }

    #nextpoint:after {
        content: "\f105";
        margin: 0 0 0 6px; }

    #streetView,
    #geoLocation,
    #scrollEnabling {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 999;
        font-size: 13px;
        line-height: 21px; }

    #streetView:before,
    #geoLocation:before,
    #scrollEnabling:before {
        content: "\e015";
        font-family: "FontAwesome";
        position: relative;
        top: 2px;
        margin: 0 6px 0 0;
        font-size: 15px;
        line-height: 1px; }

    #scrollEnabling:before {
        margin-left: -3px; }

    #streetView:before {
        content: "\f21d";
        font-family: "FontAwesome";
        font-size: 16px;
        top: 1px;
        margin-right: 8px; }

    #geoLocation {
        right: auto;
        left: 20px;
        padding: 8px 11px; }

    #geoLocation:before {
        content: "\f192";
        font-family: "FontAwesome";
        font-size: 16px;
        margin: 0;
        top: 2px; }



    header.white-header-style .navbar {
        background: #fff !important;
        border-bottom: 1px solid #f1f1f1;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
        -webkit-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
        -moz-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
        -o-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06); }

    header.white-header-style .navbar-nav > li > a {
        color: #333 !important; }
    header.white-header-style .navbar-nav .aa {
        color: #FFF !important;
        font-weight: bolder ;
    }
    header.white-header-style .navbar-nav .aa:hover {
        border-color: blue;
    }
    header.white-header-style .navbar-nav > li > a.active,
    header.white-header-style .navbar-nav > li > a:hover {
        border-color: #17286E; }

    header.white-header-style a.btn-default {
        border-color: #17286E;
        color: #17286E; }

    header.white-header-style a.btn-default:hover {
        background: #17286E;
        color: #fff; }

    @media (max-width: 1400px) {
        .navbar a.navbar-brand {
            margin-right: 1rem; }
        .navbar a.add-list-btn {
            margin-left: 0.5rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem; }
        .navbar a.add-list-btn i {
            display: none; }
        /*
    .navbar-nav > li > a {
        padding: 1.25rem 0.5rem !important; }*/
        .navbar-nav.right-list > li > a i {
            display: none; } }

    /* @media (max-height: 100px) {
      .navbar{
        background: #212529; }
       } */

    .search-form {
        margin: 0; }
    .search-form__input-holders {
        display: inline-block;
        width: 29.5rem;
        background: #fff;
        border: 0.125rem solid #e6e6e6;
        padding: 0.375rem 0.25rem;
        -webkit-border-radius: 1.6rem;
        -moz-border-radius: 1.6rem;
        -ms-border-radius: 1.6rem;
        border-radius: 1.6rem; }
    .search-form__input {
        border: none;
        width: 17rem;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 200;
        padding: 0.175rem 1rem;
        background: transparent;
        outline: none;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        margin-bottom: 0; }
    .search-form__input-location {
        width: 10.8rem; }
    .search-form__submit {
        background: transparent;
        outline: none;
        border: none;
        color: #17286E;
        font-size: 13px;
        cursor: pointer; }
    .search-form .select2-container--default {
        z-index: 2; }
    .search-form .select2-container--default .select2-selection--single {
        border-bottom: none;
        border-left: 1px solid #e8e8e8; }
    .search-form .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0.1rem 1rem; }
    .search-form .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 0.2rem;
        right: 0; }
    @media (max-width: 1400px) {
        .search-form__input-holders {
            width: 23rem; }
        .search-form__input {
            width: 13rem; }
        .search-form__input-location {
            width: 8rem; }
        .search-form__submit {
            display: none; } }

    .select2-container {
        z-index: 99999; }

    .dropdown {
        position: absolute;
        border-top: 2px solid #17286E;
        top: 100%;
        left: 0;
        background: #fff;
        width: 10rem;
        visibility: hidden;
        opacity: 0;
        margin-top: 12.5px;
        padding: 1rem 1.5rem 0.5rem;
        transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -webkit-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out; }
    .dropdown > li {
        position: relative;
        display: block;
        margin-bottom: 0.5rem; }
    .dropdown > li span {
        display: block;
        color: #666666;
        font-size: 0.9375rem;
        font-weight: 400;
        padding-bottom: 0.75rem;
        margin-bottom: 0.75rem;
        border-bottom: 1px solid #cccccc; }
    .dropdown > li a {
        display: block;
        color: #666;
        font-size: 0.9375rem;
        font-weight: 300; }
    .dropdown > li > a:hover {
        color: #17286E; }
    .dropdown > li .dropdown.level2 {
        top: -2px;
        left: 100%;
        border-left: 1px solid #292929; }

    li:hover > .dropdown {
        visibility: visible;
        opacity: 1;
        margin-top: -1px; }

    .megadropdown {
        border-top: 2px solid #17286E;
        position: absolute;
        top: 100%;
        left: -5.75rem;
        background: #f7f7f7;
        width: 55rem;
        visibility: hidden;
        opacity: 0;
        margin-top: 0.625rem;
        transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -webkit-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        display: flex;
        padding: 0 1rem; }
    .megadropdown .dropdown-box {
        padding: 0.75rem 1rem;
        width: 25%; }
    .megadropdown span {
        display: block;
        color: #666666;
        font-size: 0.9375rem;
        font-weight: 400;
        padding-bottom: 0.75rem;
        margin-bottom: 0.75rem;
        border-bottom: 1px solid #cccccc; }
    .megadropdown ul > li {
        display: block;
        margin-bottom: 0.5rem; }
    .megadropdown ul > li a {
        display: block;
        color: #666666;
        font-size: 0.9375rem;
        font-weight: 300; }
    .megadropdown ul > li > a:hover {
        color: #17286E; }

    li:hover > .megadropdown {
        visibility: visible;
        opacity: 1;
        margin-top: -1px; }

    @media (max-width: 1199px) {
        .megadropdown {
            width: 53rem;
            left: -7.25rem; } }

    @media (max-width: 991px) {
        .navbar a.navbar-brand {
            margin-left: 0.9375rem; }
        .navbar .navbar-toggler {
            margin-right: 15px;
            outline: none; }
        .navbar a.btn-default,
        .navbar .search-form {
            display: none; }
        .navbar-collapse {
            padding: 1rem 1.25rem;
            background: #fff;
            max-height: 260px;
            overflow-y: scroll; }
        .navbar-nav > li > a {
            padding: 0.25rem 0 !important;
            border: none !important;
            color: #363636 !important; }
        .dropdown {
            position: relative;
            width: 100%;
            top: initial;
            left: initial;
            margin-top: 0;
            background: transparent !important;
            border: none;
            opacity: 1;
            visibility: visible;
            padding-top: 0;
            padding-bottom: 0; }
        .dropdown li span {
            display: none; }
        .dropdown li {
            margin-bottom: 0.25rem; }
        .megadropdown {
            position: relative;
            width: 100%;
            top: initial;
            left: initial;
            margin-top: 0;
            background: transparent;
            border: none;
            opacity: 1;
            visibility: visible;
            padding: 0;
            display: block; }
        .megadropdown span {
            display: none; }
        .megadropdown .dropdown-box {
            padding: 0 1.5rem;
            width: 100%; } }

    /*------------------------------------------------- */
    /* =  Section header module
/*------------------------------------------------- */
    .section-header {
        margin-bottom: 2.5rem;
        position: relative; }
    .section-header__title {
        position: relative;
        padding-bottom: 1rem; }
    .section-header__title.white-style {
        color: #fff; }
    .section-header__title:after {
        content: '';
        position: absolute;
        bottom: 0.0625rem;
        left: 0;
        width: 1.9rem;
        height: 0.0625rem;
        background: #FFF; }
    .abc:after {
        content: '';
        position: absolute;
        bottom: 0.0625rem;
        left: 0;
        width: 1.9rem;
        height: 0.0625rem;
        background: #000; }
    .abcd:after{

        content: '';
        position: absolute;
        bottom: 0.0625rem;
        right: 0;
        width: 1.9rem;
        height: 0.0625rem;
        background: #000;

    }

    .section-header__description {
        max-width: 33.75rem;
        margin: 0;
        font-size: 1.0625rem; }
    .section-header__description.white-style {
        color: #fff; }

    /*------------------------------------------------- */
    /* =  Discover module
/*------------------------------------------------- */
    .discover {
        padding: 15rem 0 12.5rem;
        /*
   * Set a counter and get the length of the image path.
   */
        /*
   * Loop ver the image path and figure out the
   * position of the dot where the extension begins.
   */
        /*
   * If we were able to figure out where the extension is,
   * slice the path into a base and an extension. Use that to
   * calculate urls for different density environments. Set
   * values for different environments.
   */
        /*
     * Set a base background for 1x environments.
     */
        background: #111 url("../upload/fest5.jpg") center center no-repeat;
        background-size: cover;
        /*
     * Create an @2x-ish media query.
     */
        /*
     * Create media queries for all environments that the user has
     * provided images for.
     */
        /*
   * If anything went wrong trying to separate the file from its
   * extension, set a background value without doing anything to it.
   */
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    @media all and (-webkit-min-device-pixel-ratio: 1.5), all and (-o-min-device-pixel-ratio: 3 / 2), all and (min--moz-device-pixel-ratio: 1.5), all and (min-device-pixel-ratio: 1.5) {
        .discover {
            background: #111 url("../upload/fest5.jpg") center center no-repeat;
            background-size: cover;
            height: 800px;
        } }
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .discover {
            background: #111 url("../upload/fest5.jpg") center center no-repeat;
            background-size: cover;
            height: 800px;
        } }
    @media  (max-width: 1000px) {
        .discover {
            background: #111 url("../upload/fest5.jpg") center center no-repeat;
            background-size: cover;
            height: 900px;
        } }

    .discover__description {
        color: #fff;
        font-size: 1.25rem;
        margin-bottom: 0.9375rem; }
    .discover__title {
        color: #fff;
        font-size: 4.375rem;
        line-height: 5rem;
        font-weight: 600;
        margin-bottom: 1.875rem;
        margin-left: -4px; }
    .discover__title.events-tab {
        display: none; }
    .discover__list {
        overflow: hidden; }
    .discover__list-item {
        list-style: none;
        float: left;
        margin-right: 0.0625rem; }
    .discover__list-item a {
        padding: 0.9375rem 2.7rem;
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        font-size: 1.0625rem;
        font-weight: 600;
        -webkit-border-top-left-radius: 2px;
        -moz-border-top-left-radius: 2px;
        -o-border-top-left-radius: 2px;
        border-top-left-radius: 2px;
        -webkit-border-top-right-radius: 2px;
        -moz-border-top-right-radius: 2px;
        -o-border-top-right-radius: 2px;
        border-top-right-radius: 2px; }
    .discover__list-item a i {
        float: left;
        display: inline-block;
        margin-top: 0.125rem;
        font-size: 1.25rem;
        margin-right: 0.625rem; }
    .discover__list-item a.active-list {
        background: #fff;
        color: #17286E; }
    .discover__form {
        padding-left: 10px;
        padding-top: 10px;
        margin-bottom: 1.5rem;
        background: #fff;
        -webkit-border-bottom-left-radius: 2px;
        -moz-border-bottom-left-radius: 2px;
        -o-border-bottom-left-radius: 2px;
        border-bottom-left-radius: 2px;
        -webkit-border-bottom-right-radius: 2px;
        -moz-border-bottom-right-radius: 2px;
        -o-border-bottom-right-radius: 2px;
        border-bottom-right-radius: 2px;
        -webkit-border-top-right-radius: 2px;
        -moz-border-top-right-radius: 2px;
        -o-border-top-right-radius: 2px;
        border-top-right-radius: 2px; }
    .discover__form select {
        height: 3.3125rem; }
    .discover__form-favourite {
        padding: 1.875rem 0;
        background: transparent;
        margin-bottom: 5rem; }
    .discover__form-input {
        border: 1px solid transparent;
        border-bottom: 1px solid #adadad;
        width: 17.5rem;
        margin-right: 0.625rem;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 200;
        padding: 1rem 1.25rem;
        background: transparent;
        outline: none;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        margin-bottom: 0; }
    .discover__form-input-favourite {
        border-bottom: 1px solid #ffffff;
        width: 16rem;
        margin-right: 1.875rem;
        color: #ccc; }
    .discover__form-input:focus {
        background: #fafafa;
        border-top: 1px solid #ebebeb;
        border-left: 1px solid #ebebeb;
        border-right: 1px solid #ebebeb; }
    .discover__form-input-favourite:focus {
        background: transparent;
        border: 1px solid #17286E; }
    .discover__hashtags {
        color: #fff;
        font-size: 1.0625rem;
        font-weight: 300; }
    .discover__hashtags span {
        color: #cbd9df; }
    .discover__hashtags a {
        color: #fff; }
    .discover__hashtags a:hover {
        text-decoration: underline !important; }
    .discover__input-holders {
        display: inline-block;
        width: 48rem;
        background: #fff;
        padding: 0.625rem 1.5rem;
        -webkit-border-radius: 1.6rem;
        -moz-border-radius: 1.6rem;
        -ms-border-radius: 1.6rem;
        border-radius: 1.6rem; }
    .discover__box {
        max-width: 38.5rem;
        margin: 0 auto;
        overflow: hidden; }
    .discover__box .services-post3 {
        width: 16.66666%;
        float: left; }
    .discover__box-place {
        margin-left: -12.5rem;
        margin-right: -12.5rem;
        text-align: left; }
    .discover__box-place .item {
        padding: 3rem 0.9175rem 0; }
    @media (max-width: 1580px) {
        .discover__box-place {
            margin-left: -6.25rem;
            margin-right: -6.25rem; } }
    @media (max-width: 1400px) {
        .discover__box-place {
            margin-left: -0.9375rem;
            margin-right: -0.9375rem; } }
    @media (max-width: 1199px) {
        .discover__form-input {
            width: 13.75rem; }
        .discover__input-holders {
            width: 44rem; } }
    @media (max-width: 991px) {
        .discover__description {
            font-size: 1.15rem; }
        .discover__title {
            font-size: 3.8rem;
            line-height: 4.4rem;
            margin-left: -3px; }
        .discover__form-input {
            width: 18.913rem;
            margin-bottom: 1rem; }
        .discover__input-holders {
            width: 40rem;
            margin-bottom: 1rem; } }
    @media (max-width: 767px) {
        .discover__description {
            font-size: 1rem; }
        .discover__title {
            font-size: 3rem;
            line-height: 3.8rem;
            margin-left: -2px; }
        .discover__list-item a {
            font-size: 1rem; }
        .discover__list-item a i {
            font-size: 0.9375rem; }

        .discover__form-input {
            width: 100%;
            margin-right: 0; }
        .discover__hashtags {
            font-size: 1rem; }
        .discover__input-holders {
            width: 100%;
            -webkit-border-radius: 0.25rem;
            -moz-border-radius: 0.25rem;
            -ms-border-radius: 0.25rem;
            border-radius: 0.25rem; }
        .discover__box .services-post3 {
            width: 33.3333%; } }
    @media (max-width: 576px) {
        .discover__description {
            font-size: 1rem; }
        .discover__title {
            font-size: 2.5rem;
            line-height: 2.5rem;
            margin-left: 0px; }
        .discover__list-item a {
            font-size: 0.9375rem; }
        .discover__list-item a i {
            font-size: 0.9375rem; }
        .discover__hashtags {
            font-size: 0.9375rem; }
        .discover__box-place {
            margin-left: 0;
            margin-right: 0; } }

    .discover-events {
        /*
   * Set a counter and get the length of the image path.
   */
        /*
   * Loop ver the image path and figure out the
   * position of the dot where the extension begins.
   */
        /*
   * If we were able to figure out where the extension is,
   * slice the path into a base and an extension. Use that to
   * calculate urls for different density environments. Set
   * values for different environments.
   */
        /*
     * Set a base background for 1x environments.
     */
        background: #111 url("../upload/slide2.jpg") center center no-repeat;
        background-size: cover;
        /*
     * Create an @2x-ish media query.
     */
        /*
     * Create media queries for all environments that the user has
     * provided images for.
     */
        /*
   * If anything went wrong trying to separate the file from its
   * extension, set a background value without doing anything to it.
   */ }
    @media all and (-webkit-min-device-pixel-ratio: 1.5), all and (-o-min-device-pixel-ratio: 3 / 2), all and (min--moz-device-pixel-ratio: 1.5), all and (min-device-pixel-ratio: 1.5) {
        .discover-events {
            background: #111 url("../upload/slide2@2x.jpg") center center no-repeat;
            background-size: cover; } }
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .discover-events {
            background: #111 url("../upload/slide2@2x.jpg") center center no-repeat;
            background-size: cover; } }

    .discover-elegant {
        /*
   * Set a counter and get the length of the image path.
   */
        /*
   * Loop ver the image path and figure out the
   * position of the dot where the extension begins.
   */
        /*
   * If we were able to figure out where the extension is,
   * slice the path into a base and an extension. Use that to
   * calculate urls for different density environments. Set
   * values for different environments.
   */
        /*
     * Set a base background for 1x environments.
     */
        background: #111 url("../upload/slide3.jpg") center center no-repeat;
        background-size: cover;
        /*
     * Create an @2x-ish media query.
     */
        /*
     * Create media queries for all environments that the user has
     * provided images for.
     */
        /*
   * If anything went wrong trying to separate the file from its
   * extension, set a background value without doing anything to it.
   */
        text-align: center; }
    @media all and (-webkit-min-device-pixel-ratio: 1.5), all and (-o-min-device-pixel-ratio: 3 / 2), all and (min--moz-device-pixel-ratio: 1.5), all and (min-device-pixel-ratio: 1.5) {
        .discover-elegant {
            background: #111 url("../upload/slide3@2x.jpg") center center no-repeat;
            background-size: cover; } }
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .discover-elegant {
            background: #111 url("../upload/slide3@2x.jpg") center center no-repeat;
            background-size: cover; } }
    .discover-elegant__title {
        margin-bottom: 4rem; }
    .discover-elegant__form {
        padding: 0;
        margin-bottom: 4rem;
        background: transparent;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px; }
    .discover-elegant__form-input {
        border: none !important;
        background: transparent !important;
        padding: 0.175rem 1rem;
        text-align: left;
        width: 26.451rem; }
    .discover-elegant__form-input#location {
        border-left: 1px solid #ebebeb !important;
        width: 17rem; }
    .discover-elegant__form-submit {
        color: #fff;
        margin-left: 1.875rem; }
    @media (max-width: 1199px) {
        .discover-elegant__form-input {
            width: 22.451rem; } }
    @media (max-width: 991px) {
        .discover-elegant__form-input {
            width: 20.451rem;
            margin-bottom: 0; }
        .discover-elegant__form-input#location {
            width: 15rem; } }
    @media (max-width: 767px) {
        .discover-elegant__form-input {
            width: 100%;
            margin-bottom: 0.4rem; }
        .discover-elegant__form-input#location {
            width: 100%;
            margin-bottom: 0;
            padding-top: 0.5rem;
            border-left: 1px solid transparent !important;
            border-top: 1px solid #ebebeb !important; } }

    .discover-favourite {
        padding: 12.5rem 0 8rem;
        text-align: center;
        /*
   * Set a counter and get the length of the image path.
   */
        /*
   * Loop ver the image path and figure out the
   * position of the dot where the extension begins.
   */
        /*
   * If we were able to figure out where the extension is,
   * slice the path into a base and an extension. Use that to
   * calculate urls for different density environments. Set
   * values for different environments.
   */
        /*
     * Set a base background for 1x environments.
     */
        background: #111 url("../upload/slide4.jpg") center center no-repeat;
        background-size: cover;
        /*
     * Create an @2x-ish media query.
     */
        /*
     * Create media queries for all environments that the user has
     * provided images for.
     */
        /*
   * If anything went wrong trying to separate the file from its
   * extension, set a background value without doing anything to it.
   */ }
    @media all and (-webkit-min-device-pixel-ratio: 1.5), all and (-o-min-device-pixel-ratio: 3 / 2), all and (min--moz-device-pixel-ratio: 1.5), all and (min-device-pixel-ratio: 1.5) {
        .discover-favourite {
            background: #111 url("../upload/slide4@2x.jpg") center center no-repeat;
            background-size: cover; } }
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .discover-favourite {
            background: #111 url("../upload/slide4@2x.jpg") center center no-repeat;
            background-size: cover; } }
    .discover-favourite .select2-container--default {
        margin-right: 1.875rem; }
    .discover-favourite ::-webkit-input-placeholder {
        color: #dddddd; }
    .discover-favourite ::-moz-placeholder {
        color: #dddddd; }
    .discover-favourite :-ms-input-placeholder {
        color: #dddddd; }
    .discover-favourite :-moz-placeholder {
        color: #dddddd; }
    .discover-favourite .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #dddddd; }

    .discover-best {
        padding: 12rem 0 8rem;
        text-align: center;
        /*
   * Set a counter and get the length of the image path.
   */
        /*
   * Loop ver the image path and figure out the
   * position of the dot where the extension begins.
   */
        /*
   * If we were able to figure out where the extension is,
   * slice the path into a base and an extension. Use that to
   * calculate urls for different density environments. Set
   * values for different environments.
   */
        /*
     * Set a base background for 1x environments.
     */
        background: #111 url("../upload/slide5.jpg") center center no-repeat;
        background-size: cover;
        /*
     * Create an @2x-ish media query.
     */
        /*
     * Create media queries for all environments that the user has
     * provided images for.
     */
        /*
   * If anything went wrong trying to separate the file from its
   * extension, set a background value without doing anything to it.
   */ }
    @media all and (-webkit-min-device-pixel-ratio: 1.5), all and (-o-min-device-pixel-ratio: 3 / 2), all and (min--moz-device-pixel-ratio: 1.5), all and (min-device-pixel-ratio: 1.5) {
        .discover-best {
            background: #111 url("../upload/slide5@2x.jpg") center center no-repeat;
            background-size: cover; } }
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .discover-best {
            background: #111 url("../upload/slide5@2x.jpg") center center no-repeat;
            background-size: cover; } }
    .discover-best .owl-theme .owl-controls {
        position: absolute;
        width: 100%;
        top: initial;
        margin-top: 0;
        bottom: -4rem; }
    .discover-best .owl-theme .owl-controls .owl-pagination {
        display: block;
        width: 100%;
        text-align: center;
        margin: 0; }
    .discover-best .owl-theme .owl-controls .owl-page span {
        width: 0.625rem;
        height: 0.625rem;
        border: 1px solid #d8d8d8;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .discover-best .owl-theme .owl-controls .owl-page.active span {
        border-color: transparent;
        background: #17286E; }
    .discover-best .owl-theme .owl-controls .owl-buttons {
        display: none; }

    @media (max-width: 767px) {
        .discover {
            padding: 9rem 0 6.5rem; }
        .select2-container--default {
            margin-bottom: 1.875rem; }
        .select2-container--default {
            margin-right: 0 !important; } }

    .select2-container--default {
        margin-right: 0.625rem; }

    .select2-container--default .select2-selection--single {
        border: none;
        border-bottom: 1px solid #adadad;
        background: transparent;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px;
        height: auto;
        outline: none;
        text-align: left; }

    .discover-favourite .select2-container--default .select2-selection--single {
        border-bottom: 1px solid #ffffff; }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0.75rem 1.25rem;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 200; }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 0.9375rem;
        right: 0.9375rem; }

    .select2-container--open .select2-dropdown--below,
    .select2-container--open .select2-dropdown--above {
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px;
        border: 1px solid #adadad !important;
        margin: 1px 0 !important;
        background: #fff; }

    .select2-search--dropdown {
        padding: 0; }

    .select2-search--dropdown .select2-search__field {
        border: 1px solid transparent !important;
        border-bottom: 1px solid #adadad !important;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 200;
        padding: 0.75rem 0.9375rem;
        background: transparent;
        outline: none;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        margin-bottom: 0; }

    .select2-results__option {
        padding: 0.4rem 0.9375rem;
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 300; }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #17286E; }

    .discover-elegant__form .select2-container--default {
        margin-bottom: 0; }

    .discover-elegant__form .select2-container--default .select2-selection--single {
        border-bottom: none;
        border-left: 1px solid #e8e8e8; }

    .discover-elegant__form .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0.1rem 1rem; }

    .discover-elegant__form .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 0.2rem; }

    @media (max-width: 767px) {
        .discover-elegant__form .select2-container--default .select2-selection--single {
            width: 100%;
            margin-bottom: 0;
            border-left: 1px solid transparent !important;
            border-top: 1px solid #ebebeb !important; } }

    /*------------------------------------------------- */
    /* =  Place gal module
/*------------------------------------------------- */
    .place-gal {
        overflow: hidden;
        border: solid 1px black;
        position: relative;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        border-radius: 5px; }
    .place-gal__image {
        width: 100%;
        height: auto;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out; }
    .place-gal:hover .place-gal__image {
        transform: scale(1.1);
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1); }
    .place-gal__content {
        position: absolute;
        bottom: 3rem;
        left: 0;
        width: 100%;
        padding: 0 1.875rem; }
    .place-gal__title {
        font-size: 1.5rem;
        text-transform: uppercase;
        margin-bottom: 0.5rem; }
    .place-gal__title a {
        color: #fff; }
    .place-gal__title a img {
        display: inline-block;
        float: left;
        margin-right: 0.5rem;
        width: 1.25rem;
        height: 1.25rem;
        margin-top: 0.125rem;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .place-gal__title a:hover {
        color: #17286E; }
    .place-gal__list {
        margin-bottom: 1rem; }
    .place-gal__list-item {
        display: inline-block;
        margin-right: 0.25rem; }
    .place-gal__list-item a {
        color: #fff;
        font-size: 1.0625rem;
        font-weight: 300; }
    .place-gal__list-item a:hover {
        text-decoration: underline !important; }
    .place-gal__list-item:before {
        content: '';
        float: left;
        display: inline-block;
        width: 0.25rem;
        height: 0.25rem;
        background: #fff;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        margin-right: 0.35rem;
        margin-top: 0.65rem; }

    /*------------------------------------------------- */
    /* =  services post module
/*------------------------------------------------- */
    .services-post {
        display: block;
        background: #fff;
        border: 1px solid #e8edf0;
        padding: 0.625rem;
        margin-bottom: 1.875rem;
        -webkit-border-radius: 0.1875rem;
        -moz-border-radius: 0.1875rem;
        -ms-border-radius: 0.1875rem;
        border-radius: 0.1875rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        box-shadow: 0 0.3125rem 0.625rem #f6f6f6;
        -webkit-box-shadow: 0 0.3125rem 0.625rem #f6f6f6;
        -moz-box-shadow: 0 0.3125rem 0.625rem #f6f6f6;
        -o-box-shadow: 0 0.3125rem 0.625rem #f6f6f6; }
    .services-post__content {
        padding: 1.875rem 0.625rem 0rem;
        border: 1px solid transparent;
        text-align: center;
        -webkit-border-radius: 0.0625rem;
        -moz-border-radius: 0.0625rem;
        -ms-border-radius: 0.0625rem;
        border-radius: 0.0625rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post__content i {
        display: inline-block;
        color: #17286E;
        font-size: 2.875rem;
        margin-bottom: 1.25rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post__title {
        color: #17286E;
        margin-bottom: 0;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post__location {
        opacity: 0.8;
        color: #fff;
        margin-bottom: 0;
        font-weight: 200;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post:hover .services-post__content {
        border-color: rgba(255, 255, 255, 0.3); }
    .services-post:hover .services-post__content i {
        color: #fff;
        margin-bottom: 0.625rem; }
    .services-post:hover .services-post__title {
        color: #fff; }
    .services-post:hover .services-post__location {
        margin-bottom: 0.625rem; }

    .services-post:hover {
        background: #17286E;
        border-color: transparent;
        box-shadow: 0 0.75rem 1.5rem #e8e8e8;
        -webkit-box-shadow: 0 0.75rem 1.5rem #e8e8e8;
        -moz-box-shadow: 0 0.75rem 1.5rem #e8e8e8;
        -o-box-shadow: 0 0.75rem 1.5rem #e8e8e8; }

    .services-post2 {
        display: block;
        text-align: center;
        background: #fff;
        border: 1px solid transparent;
        padding: 2.5rem 0.625rem 2.25rem;
        margin-bottom: 1.25rem;
        -webkit-border-radius: 0.1875rem;
        -moz-border-radius: 0.1875rem;
        -ms-border-radius: 0.1875rem;
        border-radius: 0.1875rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post2 i {
        display: inline-block;
        color: #17286E;
        font-size: 2.875rem;
        margin-bottom: 1.25rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post2__title {
        margin-bottom: 0;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post2__location {
        margin-bottom: 0;
        font-weight: 200;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }

    .services-post2:hover {
        border: 1px solid #17286E; }

    .services-post3 {
        display: block;
        text-align: center;
        border: 1px solid transparent;
        padding: 1rem 0.5rem;
        margin-bottom: 1rem;
        -webkit-border-radius: 0.1875rem;
        -moz-border-radius: 0.1875rem;
        -ms-border-radius: 0.1875rem;
        border-radius: 0.1875rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post3 i {
        display: inline-block;
        color: #fff;
        font-size: 2.875rem;
        margin-bottom: 1rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post3__title {
        color: #fff;
        font-size: 0.9175rem;
        margin-bottom: 0;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .services-post3:hover .services-post3__title {
        color: #fb646f; }

    .services-post3:hover {
        border: 1px solid #fb646f; }
    .services-post3:hover i {
        color: #fb646f; }

    /*------------------------------------------------- */
    /* =  place post module
/*------------------------------------------------- */
    .place-post__gal-box {
        position: relative;
        margin-bottom: 0.625rem;
        overflow: hidden; }

    .place-post__image {
        width: 100%;
        height: auto;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out; }

    .place-post:hover .place-post__image {
        transform: scale(1.1);
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1); }

    .place-post__rating {
        display: inline-block;
        position: absolute;
        bottom: 1.25rem;
        left: 1.25rem;
        padding: 0.3rem 0.5rem;
        background: rgba(122, 201, 101, 0.9);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        color: #fff;
        font-size: 1rem;
        font-weight: 400; }

    .place-post__rating.average-rat {
        background: #bdbc60; }

    .place-post__rating.solid-rat {
        background: #cc9334; }

    .place-post__rating.low-rat {
        background: #fb646f; }

    .place-post__like {
        display: inline-block;
        position: absolute;
        top: 1.25rem;
        right: 1.25rem;
        color: #fff;
        font-size: 1.5rem; }

    .place-post__like.active, .place-post__like:hover {
        color: #fb646f; }

    .place-post__info {
        color: #bbb;
        margin-bottom: 0.25rem; }
    .place-post__info i {
        font-size: 0.9175rem;
        margin-right: 0.25rem; }
    .place-post__info span.open {
        color: #7ac965; }
    .place-post__info span.closed {
        color: #fb646f; }

    .place-post__title {
        margin-bottom: 0.25rem; }
    .place-post__title a {
        color: #363636; }
    .place-post__title a:hover {
        color: #fb646f; }

    .place-post__description {
        margin-bottom: 0.5rem;
        overflow: hidden; }
    .place-post__description span {
        margin-left: 0.5rem; }
    .place-post__description span i {
        color: #e2e2e2;
        font-size: 0.75rem; }
    .place-post__description span i.red-col {
        color: #fb646f;
        margin: 0; }

    .place-post__description-review {
        float: right; }
    .place-post__description-review i {
        font-size: 0.9175rem !important;
        margin-right: 0.25rem; }

    .place-post__text {
        margin-bottom: 1rem; }

    .place-post__address {
        padding-top: 0.5rem;
        border-top: 1px solid #eeeeee;
        color: #bbb; }
    .place-post__address i {
        margin-right: 0.25rem; }

    .place-post.list-style {
        display: flex;
        justify-content: space-between; }
    .place-post.list-style .place-post__gal-box {
        width: 50%;
        margin-right: 0.9375rem; }
    .place-post.list-style .place-post__content {
        width: 50%;
        padding-left: 0.9375rem; }

    .place-post.info-style {
        padding: 0.75rem;
        display: flex;
        justify-content: space-between; }
    .place-post.info-style .place-post__gal-box {
        width: 35%;
        margin-bottom: 0; }
    .place-post.info-style .place-post__gal-box img {
        width: 100%;
        height: auto;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        border-radius: 0px; }
    .place-post.info-style .place-post__title {
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.2rem;
        margin-bottom: 0; }
    .place-post.info-style .place-post__content {
        width: 65%;
        padding-left: 0.75rem;
        position: relative; }
    .place-post.info-style .place-post__info {
        color: #ccc;
        font-size: 0.8125rem;
        margin-bottom: 0; }
    .place-post.info-style .place-post__info span {
        position: relative;
        padding-left: 0.4rem;
        margin-right: 0.25rem;
        background: transparent; }
    .place-post.info-style .place-post__info span:before {
        content: '';
        position: absolute;
        width: 0.175rem !important;
        height: 0.175rem !important;
        background: #cccccc;
        left: 1px;
        top: 0.4rem;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .place-post.info-style .place-post__address {
        color: #aaa;
        font-size: 0.8125rem;
        line-height: 1rem;
        margin-bottom: 0;
        padding-top: 0;
        border-top: none;
        position: absolute;
        bottom: 3px; }
    .place-post.info-style .place-post__description {
        margin: 0 0 2.5rem; }
    .place-post.info-style .place-post__rating-2 {
        color: #76bd63;
        font-size: 0.8125rem;
        margin: 0; }

    @media (max-width: 767px) {
        .place-post.list-style {
            display: block; }
        .place-post.list-style .place-post__gal-box {
            width: 100%;
            margin-right: 0; }
        .place-post.list-style .place-post__content {
            width: 100%;
            padding-left: 0; } }

    /*------------------------------------------------- */
    /* =  event post module
/*------------------------------------------------- */
    .event-post__gal-box {
        position: relative;
        margin-bottom: 0.625rem;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        overflow: hidden; }

    .event-post__image {
        width: 100%;
        height: auto;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out; }

    .event-post:hover .event-post__image {
        transform: scale(1.1);
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1); }

    .event-post__date {
        display: inline-block;
        position: absolute;
        bottom: 1.25rem;
        left: 1.25rem;
        padding: 0.3rem 0.5rem;
        background: rgba(122, 201, 101, 0.9);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        color: #fff;
        font-size: 1rem;
        font-weight: 400; }

    .event-post__like {
        display: inline-block;
        position: absolute;
        top: 1.25rem;
        right: 1.25rem;
        color: #fff;
        font-size: 1.5rem; }

    .event-post__like:hover {
        color: #fb646f; }

    .event-post__info {
        color: #bbb;
        margin-bottom: 0.25rem; }
    .event-post__info i {
        font-size: 0.9175rem;
        margin-right: 0.25rem; }
    .event-post__info span.open {
        color: #7ac965; }

    .event-post__title {
        margin-bottom: 0.25rem; }
    .event-post__title a {
        color: #fb646f; }
    .event-post__title a:hover {
        color: #fb646f; }

    .event-post__description {
        margin-bottom: 0.5rem; }

    .event-post__description-review {
        float: right; }
    .event-post__description-review i {
        color: #e2e2e2;
        font-size: 0.9175rem !important;
        margin-right: 0.25rem; }

    .event-post__address {
        color: #bbb;
        padding-top: 0.5rem;
        border-top: 1px solid #eeeeee; }
    .event-post__address i {
        margin-right: 0.25rem; }

    /*------------------------------------------------- */
    /* =  how work post module
/*------------------------------------------------- */
    .how-work-post {
        text-align: center;
        margin-bottom: 1.875rem;
        padding-top: 1rem; }
    .how-work-post__icon {
        color: #fb646f;
        font-size: 3.5rem;
        display: inline-block;
        margin-bottom: 1rem; }
    .how-work-post__title {
        margin-bottom: 1rem; }
    .how-work-post__title-white {
        color: #ffffff; }
    .how-work-post__description {
        max-width: 22rem;
        margin: 0 auto; }
    .how-work-post__description-white {
        color: #ffffff; }

    .how-work-post2 {
        display: flex;
        margin-bottom: 1.875rem; }
    .how-work-post2__icon {
        color: #fb646f;
        font-size: 3.5rem;
        display: block;
        margin-top: -0.5rem; }
    .how-work-post2__title {
        margin-bottom: 1rem; }
    .how-work-post2__title-white {
        color: #ffffff; }
    .how-work-post2__description {
        max-width: 22rem;
        margin: 0 auto; }
    .how-work-post2__description-white {
        color: #ffffff; }
    .how-work-post2__content {
        padding-left: 2rem !important; }

    /*------------------------------------------------- */
    /* =  statistic post module
/*------------------------------------------------- */
    .statistic-post {
        margin-bottom: 1.875rem;
        display: flex; }
    .statistic-post__icon {
        color: #363636;
        font-size: 2.5rem;
        display: inline-block;
        margin-right: 1rem; }
    .statistic-post__icon-primary {
        color: #fb646f; }
    .statistic-post__title {
        font-weight: 600;
        margin-bottom: 0rem; }
    .statistic-post__title-white {
        color: #fff; }
    .statistic-post__description {
        font-size: 1.0625rem;
        margin-bottom: 0; }

    @media (max-width: 576px) {
        .statistic-post {
            max-width: 16.25rem;
            margin: 0 auto 1.875rem; } }

    /*------------------------------------------------- */
    /* =  testimonial post module
/*------------------------------------------------- */
    .testimonial-post {
        text-align: center; }
    .testimonial-post__content {
        display: flex;
        flex-direction: column;
        height: 15rem;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e7ea;
        -webkit-border-radius: 0.25rem;
        -moz-border-radius: 0.25rem;
        -ms-border-radius: 0.25rem;
        border-radius: 0.25rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.03);
        -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.03);
        -o-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.03);
        margin-bottom: -2.1875rem;
        background: #fff;
        padding: 0 1rem; }
    .testimonial-post__content-bottom {
        margin-bottom: 0;
        height: 15.5rem; }
    .testimonial-post__quote {
        color: #fb646f;
        font-size: 3.75rem;
        display: inline-block;
        font-family: "Permanent Marker", cursive;
        margin-bottom: -1rem;
        margin-top: -3.5rem; }
    .testimonial-post__title {
        font-size: 1.0625rem;
        font-weight: 300;
        margin-bottom: 0rem;
        letter-spacing: -0.0625rem; }
    .testimonial-post__title-white {
        color: #fff; }
    .testimonial-post__description {
        color: #666666;
        font-size: 1.0625rem;
        font-weight: 200;
        font-style: italic;
        margin-bottom: 0;}
    .testimonial-post__image {
        width: 4.375rem;
        height: 4.375rem;
        margin-bottom: 1rem;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .testimonial-post__image-top {
        margin-bottom: -2.1875rem; }

    /*------------------------------------------------- */
    /* =  news post module
/*------------------------------------------------- */
    .news-post {
        margin-bottom: 1.875rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .news-post__gal {
        position: relative; }
    .news-post__gal img {
        width: 100%;
        height: auto;
        -webkit-border-top-left-radius: 0.25rem;
        -moz-border-top-left-radius: 0.25rem;
        -o-border-top-left-radius: 0.25rem;
        border-top-left-radius: 0.25rem;
        -webkit-border-top-right-radius: 0.25rem;
        -moz-border-top-right-radius: 0.25rem;
        -o-border-top-right-radius: 0.25rem;
        border-top-right-radius: 0.25rem; }
    .news-post__date {
        position: absolute;
        display: inline-block;
        position: absolute;
        bottom: 1.25rem;
        left: 1.25rem;
        padding: 0.3rem 0.5rem;
        background: rgba(51, 153, 255, 0.9);
        -webkit-border-radius: 0.1875rem;
        -moz-border-radius: 0.1875rem;
        -ms-border-radius: 0.1875rem;
        border-radius: 0.1875rem;
        color: #fff;
        font-size: 0.9375rem;
        font-weight: 300; }
    .news-post__content {
        padding: 1rem 1.25rem 1.5rem;
        border: 1px solid #ebebeb;
        border-top: none;
        -webkit-border-bottom-left-radius: 0.25rem;
        -moz-border-bottom-left-radius: 0.25rem;
        -o-border-bottom-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
        -webkit-border-bottom-right-radius: 0.25rem;
        -moz-border-bottom-right-radius: 0.25rem;
        -o-border-bottom-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem; }
    .news-post__title {
        margin-bottom: 0.125rem; }
    .news-post__title a {
        color: #363636; }
    .news-post__title a:hover {
        color: #fb646f; }
    .news-post__tags {
        margin-bottom: 0.625rem; }
    .news-post__tags li {
        display: inline-block; }
    .news-post__tags li a {
        color: #999;
        font-size: 0.9375rem;
        font-family: "Nunito", sans-serif;
        font-weight: 300; }
    .news-post__tags li a:hover {
        color: #fb646f; }
    @media (max-width: 1580px) {
        .news-post__title {
            font-size: 1.0625rem; } }

    .news-post:hover {
        box-shadow: 0 8px 25px #ededed;
        -webkit-box-shadow: 0 8px 25px #ededed;
        -moz-box-shadow: 0 8px 25px #ededed;
        -o-box-shadow: 0 8px 25px #ededed; }

    /*------------------------------------------------- */
    /* =  article-post module
/*------------------------------------------------- */
    .article-post {
        padding: 4rem 2rem 4rem 0; }
    .article-post__excerpt {
        display: inline-block;
        color: #fb646f;
        font-size: 1.25rem;
        font-weight: 300;
        margin: 0 0 0.25rem; }
    .article-post__title {
        color: #fff; }
    .article-post__description {
        color: #cccccc; }

    /*------------------------------------------------- */
    /* =  team post module
/*------------------------------------------------- */
    .team-post {
        margin-bottom: 2rem;
        padding: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 14px 14px 36px -20px rgba(46,45,46,1);
        -moz-box-shadow: 14px 14px 36px -20px rgba(46,45,46,1);
        box-shadow: 14px 14px 36px -20px rgba(46,45,46,1);
    }
    .team-post__gal {
        position: relative; }
    .team-post__gal img {
        width: 100%;
        height: auto; }
    .team-post__gal-hover {
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: rgba(255, 255, 255, 0.4);
        opacity: 0;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .team-post__social li {
        display: inline-block;
        margin: 0 0.125rem 0; }
    .team-post__social li a {
        display: inline-block;
        color: #fff;
        width: 2rem;
        height: 2rem;
        font-size: 0.75rem;
        line-height: 1.75rem;
        border: 2px solid transparent;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .team-post__social li a.facebook {
        background: #6666cc; }
    .team-post__social li a.twitter {
        background: #3399cc; }
    .team-post__social li a.instagram {
        background: #cc66cc; }
    .team-post__social li a.linkedin {
        background: #3399cc; }
    .team-post__social li a:hover {
        background: transparent !important;
        border-color: #fff; }
    .team-post__content {
        padding-top: 1.25rem; }
    .team-post__name {
        margin-bottom: 0; }
    .team-post__role {
        display: inline-block;
        color: #666666;
        font-size: 0.9375rem;
        font-weight: 300;
        margin: 0 0 0.5rem; }
    .team-post:hover .team-post__gal-hover {
        opacity: 1;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px; }

    /*------------------------------------------------- */
    /* =  category post module
/*------------------------------------------------- */
    .category-post {
        position: relative; }
    .category-post__image {
        width: 100%;
        height: auto;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .category-post__content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 1.875rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .category-post__title {
        color: #fff;
        margin-bottom: 0.25rem; }
    .category-post__title a {
        color: #fff; }
    .category-post__title a:hover {
        text-decoration: underline !important; }
    .category-post__list-num {
        color: #cccccc;
        font-size: 0.9375rem;
        font-weight: 300;
        margin: 0; }
    .category-post__list-num:hover {
        color: #fb646f; }
    .category-post:hover .category-post__content {
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.12);
        -webkit-box-shadow: 0 8px 15px rgba(0, 0, 0, 0.12);
        -moz-box-shadow: 0 8px 15px rgba(0, 0, 0, 0.12);
        -o-box-shadow: 0 8px 15px rgba(0, 0, 0, 0.12); }

    /*------------------------------------------------- */
    /* =  explore module
/*------------------------------------------------- */
    .explore__box {
        padding: 1.25rem 0 4.375rem;
        position: relative; }
    .explore__box .item {
        width: 50%;
        padding: 0 0.9375rem;
        margin-bottom: 2rem; }

    .explore__wrap.iso-call {
        margin: 0 -0.9375rem; }

    .explore__wrap.iso-call.list-version {
        margin: 0; }
    .explore__wrap.iso-call.list-version .item {
        width: 100%;
        padding: 0; }

    .explore__filter-title {
        margin-bottom: 1.25rem;
        line-height: 2.5rem; }
    .explore__filter-title span {
        color: #666666; }
    .explore__filter-title a {
        float: right;
        width: 2.5rem;
        height: 2.5rem;
        border: 1px solid transparent;
        line-height: 2.5rem;
        color: #ccc;
        font-size: 1.0625rem;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        text-align: center;
        margin-left: 0.25rem; }
    .explore__filter-title a.active {
        color: #fb646f;
        border-color: #fb646f; }

    .explore__box:after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 1px;
        right: -30px;
        background: #f5f5f5; }

    .explore__box-side:after {
        display: none; }

    .explore__filter {
        padding-top: 1.25rem;
        padding-left: 1.25rem; }

    .explore__filter-side {
        padding-left: 0rem; }

    .explore__form {
        margin: 0;
        padding: 0; }

    .explore__form-title {
        line-height: 2.375rem;
        margin-bottom: 1.25rem; }

    .explore__form-input {
        display: block;
        width: 100%;
        padding: 0.625rem 1.25rem;
        color: #ccc;
        font-size: 0.9375rem;
        font-weight: 300;
        background: #ffffff;
        outline: none;
        border: 1px solid #dddddd;
        margin: 0 0 1.25rem;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }

    .explore__form-input:hover {
        border-color: #fb646f; }

    .explore .select2-container--default {
        margin-bottom: 1.25rem; }

    .explore .select2-container--default .select2-selection--single {
        border: 1px solid #dddddd;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px; }

    .explore .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0.5rem 1.25rem;
        color: #ccc;
        font-weight: 300; }

    .explore .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 0.75rem; }

    .explore__form-desc {
        font-size: 0.9375rem;
        margin-bottom: 1.25rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eeeeee; }
    .explore__form-desc a {
        color: #999999;
        float: right;
        font-weight: 300; }
    .explore__form-desc a i {
        font-size: 13px;
        margin-left: 0.25rem; }
    .explore__form-desc a:hover {
        color: #fb646f; }

    .explore__form-advanced {
        display: none; }
    .explore__form-advanced span {
        display: inline-block; }

    .explore__form-price-list {
        display: inline-block;
        margin-bottom: 1.25rem; }
    .explore__form-price-list li {
        display: inline-block;
        margin-left: 0.25rem; }
    .explore__form-price-list li a {
        color: #999;
        font-size: 0.8125rem;
        padding: 0.625rem;
        box-shadow: 0 2px 4px #f0f0f0;
        -webkit-box-shadow: 0 2px 4px #f0f0f0;
        -moz-box-shadow: 0 2px 4px #f0f0f0;
        -o-box-shadow: 0 2px 4px #f0f0f0;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px; }
    .explore__form-price-list li a.active,
    .explore__form-price-list li a:hover {
        background: #fb646f;
        color: #fff; }

    .explore__form-checkbox-list {
        overflow: hidden;
        margin-bottom: 1.25rem;
        padding-top: 1.25rem;
        border-top: 1px solid #eeeeee; }
    .explore__form-checkbox-list li {
        float: left;
        width: 50%;
        position: relative;
        list-style: none;
        margin-bottom: 0.25rem; }

    .explore__form-checkbox-list-side {
        padding-bottom: 1rem;
        border-bottom: 1px solid #eeeeee; }

    .explore__input-checkbox {
        width: 1.25rem;
        height: 1.25rem;
        margin-right: 0.25rem;
        opacity: 0;
        position: relative;
        z-index: 2; }

    .explore__checkbox-style {
        display: inline-block;
        position: absolute;
        top: 3px;
        left: 0;
        width: 1.25rem;
        height: 1.25rem;
        border: 1px solid #dddddd;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        margin-bottom: 0 !important; }

    .explore__checkbox-style:after {
        content: '';
        position: absolute;
        top: 0.3125rem;
        left: 0.1875rem;
        width: 0.75rem;
        height: 0.4rem;
        border-left: 1px solid #fb646f;
        border-bottom: 1px solid #fb646f;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        opacity: 0; }

    .explore__input-checkbox:checked + .explore__checkbox-style:after {
        opacity: 1; }

    .explore__checkbox-text {
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 300;
        margin-bottom: 0 !important; }

    .explore__advertise {
        text-align: center;
        margin-bottom: 1.5rem; }
    .explore__advertise img {
        max-width: 100%;
        height: auto; }

    .explore__advertise-title {
        display: block;
        font-size: 13px; }

    .explore__side-content {
        width: 40%;
        padding: 5.5rem 3.125rem; }

    .explore__map-side {
        width: 60%;
        position: fixed;
        top: 60px;
        bottom: 0;
        right: 0; }
    .explore__map-side #map {
        width: 100%;
        height: 100%; }

    @media (max-width: 1580px) {
        .explore__side-content, .explore__map-side {
            width: 50%; } }

    @media (max-width: 1400px) {
        .explore__side-content {
            width: 60%; }
        .explore__map-side {
            width: 40%; } }

    @media (max-width: 1199px) {
        .explore__side-content {
            width: 70%; }
        .explore__map-side {
            width: 30%; } }

    @media (max-width: 991px) {
        .explore__side-content {
            width: 100%; }
        .explore__map-side {
            width: 100%;
            position: relative;
            height: 300px; }
        .explore__box:after {
            display: none; }
        .explore__filter {
            padding-left: 0; } }

    @media (max-width: 767px) {
        .explore__side-content {
            padding-left: 1rem;
            padding-right: 1rem; }
        .explore__box .item {
            width: 100%; } }

    @media (max-width: 576px) {
        .explore__side-content {
            padding-left: 1rem;
            padding-right: 1rem; }
        .explore__box-side .item {
            width: 100% !important; } }

    /*------------------------------------------------- */
    /* =  listing detail module
/*------------------------------------------------- */
    .listing-detail {
        padding-top: 3.75rem; }
    .listing-detail__gal {
        position: relative; }
    .listing-detail__gal img {
        width: 100% !important;
        height: auto; }
    .listing-detail__gal-box {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding-bottom: 2rem; }
    .listing-detail__buttons {
        text-align: right;
        padding-top: 2.75rem; }
    .listing-detail__buttons a {
        margin-left: 0.25rem;
        padding-left: 1rem;
        padding-right: 1rem;
        margin-bottom: 0.125rem; }
    .listing-detail__buttons a i {
        margin-right: 0.25rem; }
    .listing-detail__buttons a.btn-default-red {
        border-color: #17286E; }
    .listing-detail__buttons a.btn-default-red:hover {
        border-color: #17286E;
        box-shadow: 0 7px 12px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 7px 12px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 7px 12px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 7px 12px rgba(0, 0, 0, 0.1); }
    .listing-detail__rate {
        display: inline-block;
        padding: 0.5rem 0.625rem;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        background: #71b95e;
        color: #fff;
        font-size: 1rem;
        line-height: 1rem;
        line-height: 1.375rem; }
    .listing-detail__rate span {
        font-size: 0.625rem; }
    .listing-detail__title {
        color: #fff;
        margin-bottom: 0.25rem; }
    .listing-detail__title-black {
        color: #363636;
        overflow: hidden; }
    .listing-detail__title-black > span {
        display: inline-block;
        margin-top: 0.5rem;
        margin-right: 0.5rem;
        float: left; }
    .listing-detail__address {
        color: #bbbbbb; }
    .listing-detail__address i {
        margin-right: 0.5rem; }
    .listing-detail__title-box {
        padding: 1.5rem 0 1rem;
        border-bottom: 1px solid #ebebeb;
        margin-bottom: -1px; }
    .listing-detail__buttons-icons {
        padding-top: 2rem; }
    .listing-detail__buttons-icons a {
        padding: 0.175rem 0.5rem;
        background: #f7f7f7;
        color: #fb646f;
        font-size: 1.125rem !important;
        border-color: transparent;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .listing-detail__buttons-icons a i {
        margin-right: 0; }
    .listing-detail__buttons-icons a:hover {
        color: #fff;
        background: #fb646f; }
    .listing-detail__dollar-rate {
        display: inline-block;
        margin: 0 0.5rem; }
    .listing-detail__dollar-rate i {
        margin: 0; }
    .listing-detail__dollar-rate i.red-col {
        color: #fb646f; }
    .listing-detail__scroll-menu {
        border-bottom: 1px solid #ebebeb; }
    .listing-detail__scroll-menu li {
        display: inline-block; }
    .listing-detail__scroll-menu li a {
        color: #999999;
        font-size: 1.0625rem;
        font-weight: 300;
        padding: 1.25rem 1rem;
        border-bottom: 1px solid transparent;
        margin-bottom: -1px; }
    .listing-detail__scroll-menu li a.active,
    .listing-detail__scroll-menu li a:hover {
        color: #363636;
        border-bottom: 1px solid #fb646f; }
    .listing-detail__menu-top-border {
        border-bottom: none;
        position: relative;
        z-index: 2; }
    .listing-detail__menu-top-border li a {
        border-bottom: none;
        border-top: 1px solid transparent;
        margin-bottom: 0; }
    .listing-detail__menu-top-border li a.active,
    .listing-detail__menu-top-border li a:hover {
        border-top: 1px solid #fb646f;
        border-bottom: none; }
    .listing-detail__content-box {
        padding: 2rem 0;
        padding-right: 1.875rem;
        border-right: 1px solid #f5f5f5;
        margin-right: -1.875rem; }
    .listing-detail__content-box-nopadding {
        padding-top: 0; }
    .listing-detail__content-description {
        color: #666666; }
    .listing-detail__content-description.with-border-top {
        padding-top: 1rem;
        border-top: 1px solid #eeeeee; }
    .listing-detail__overview {
        margin-bottom: 2rem; }
    .listing-detail__gallery {
        margin-bottom: 2rem; }
    .listing-detail__gallery-inner {
        padding-top: 0.5rem;
        margin: 0 -0.3125rem; }
    .listing-detail__gallery-inner .item {
        margin: 0.3125rem; }
    .listing-detail__gallery-inner .item img {
        width: 100%;
        height: auto; }
    .listing-detail__gallery-inner .owl-theme .owl-controls .owl-buttons {
        padding: 0 0.625rem; }
    .listing-detail__gallery-inner .owl-theme .owl-controls .owl-buttons div {
        background: transparent;
        border: transparent;
        color: #ffffff; }
    .listing-detail__gallery-inner .owl-theme .owl-controls .owl-buttons div:hover {
        color: #fb646f; }
    .listing-detail__gallery-inner .owl-theme .owl-controls .owl-buttons div.owl-prev::after {
        content: '\f111';
        font-family: 'LineAwesome';
        font-size: 1.25rem; }
    .listing-detail__gallery-inner .owl-theme .owl-controls .owl-buttons div.owl-next::after {
        content: '\f112';
        font-family: 'LineAwesome';
        font-size: 1.25rem; }
    .listing-detail__content-title a {
        float: right;
        color: #fb646f;
        font-size: 0.9375rem;
        font-weight: 300; }
    .listing-detail__content-title a i {
        margin-right: 0.25rem; }
    .listing-detail__content-title a:hover {
        text-decoration: underline !important; }
    .listing-detail #mapSingle {
        height: 200px;
        width: 100%;
        margin-bottom: 1.5rem; }
    .listing-detail__galleria {
        overflow: hidden;
        margin-bottom: 2rem;
        position: relative; }
    .listing-detail__galleria .item-image {
        <<<<<<< HEAD
        width: 69%;
    =======
    width: 99%;
    >>>>>>> Martinaa
    float: left;
        padding-left: 1px;
        padding-bottom: 1px; }
    .listing-detail__galleria .item-image img {
        width: 100%;
        height: auto; }
    .listing-detail__galleria .item-image.small-size {
        <<<<<<< HEAD
        width: 31%; }
    =======
    width: 1%; }
    >>>>>>> Martinaa
    .listing-detail__galleria .item-image:first-child {
        padding-left: 0; }
    .listing-detail__galleria > a {
        position: absolute;
        bottom: 1.25rem;
        left: 1.25rem;
        color: #fff;
        font-size: 0.9375rem;
        font-weight: 300; }
    .listing-detail__galleria > a i {
        font-size: 1.125rem;
        margin-right: 0.5rem; }
    .listing-detail__galleria > a:hover {
        color: #fb646f; }
    .listing-detail__photos {
        padding-bottom: 2.5rem; }
    .listing-detail__photos a.load-others {
        padding-top: 1rem;
        color: #fb646f;
        font-size: 0.9375rem;
        font-weight: 300; }
    .listing-detail__photos a.load-others i {
        font-size: 1.125rem;
        margin-right: 0.5rem; }
    .listing-detail__photos a.load-others:hover {
        text-decoration: underline !important; }
    .listing-detail__photos-inner {
        margin-left: -5px;
        margin-right: -5px; }
    .listing-detail__photos-inner .item {
        width: 33.33333%;
        padding: 5px; }
    .listing-detail__photos-inner .item img {
        width: 100%;
        height: auto; }
    .listing-detail__fullwidth-gal {
        overflow: hidden;
        display: flex; }
    .listing-detail__fullwidth-gal li {
        list-style: none; }
    .listing-detail__fullwidth-gal li img {
        width: 100%;
        height: auto; }
    @media (max-width: 991px) {
        .listing-detail__content-box {
            padding-right: 0;
            border-right: none;
            margin-right: 0; } }
    @media (max-width: 767px) {
        .listing-detail__buttons {
            text-align: left;
            padding-top: 1rem; } }

    /*------------------------------------------------- */
    /* =  reviews-list module
/*------------------------------------------------- */
    .reviews-list {
        padding-top: 0.625rem; }
    .reviews-list__item {
        list-style: none; }
    .reviews-list__item-box {
        margin-bottom: 1.875rem;
        padding-bottom: 1.875rem;
        border-bottom: 1px solid #eeeeee; }
    .reviews-list__item-image {
        float: left;
        width: 3.125rem;
        height: 3.125rem;
        margin-right: 1.25rem;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .reviews-list__item-content {
        overflow: hidden; }
    .reviews-list__item-title {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 600;
        line-height: 1.25rem;
        margin: 0; }
    .reviews-list__item-location, .reviews-list__item-date {
        display: inline-block;
        color: #666;
        font-size: 0.9375rem;
        font-weight: 300;
        line-height: 1.25rem;
        margin: 0 0 1rem; }
    .reviews-list__item-date {
        float: right;
        color: #999999;
        font-weight: 200; }
    .reviews-list__item-rating {
        display: inline-block;
        padding: 0.3rem 0.5rem;
        background: rgba(122, 201, 101, 0.9);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
        margin-left: 0.25rem; }
    .reviews-list__item-rating.average-rat {
        background: #bdbc60; }
    .reviews-list__item-rating.solid-rat {
        background: #cc9334; }
    .reviews-list__item-rating.low-rat {
        background: #fb646f; }
    .reviews-list__item-description {
        color: #666666;
        margin-bottom: 1.25rem; }
    .reviews-list__item-reply {
        float: right;
        padding: 0.25rem 0.5rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 200;
        border: 1px solid #ebebeb;
        -webkit-border-radius: 1.25rem;
        -moz-border-radius: 1.25rem;
        -ms-border-radius: 1.25rem;
        border-radius: 1.25rem; }
    .reviews-list__item-reply i {
        font-size: 1rem;
        float: left;
        margin-right: 0.25rem;
        margin-top: 0.125rem; }
    .reviews-list__item-reply:hover {
        color: #fb646f;
        border-color: #fb646f; }
    .reviews-list__item-helpful {
        padding: 0.25rem 0.5rem;
        padding-right: 2.5rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 200;
        border: 1px solid #ebebeb;
        position: relative;
        -webkit-border-radius: 0.125rem;
        -moz-border-radius: 0.125rem;
        -ms-border-radius: 0.125rem;
        border-radius: 0.125rem; }
    .reviews-list__item-helpful i {
        font-size: 1rem;
        float: left;
        margin-right: 0.25rem;
        margin-top: 0.125rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .reviews-list__item-helpful span {
        position: absolute;
        right: 0;
        top: 0;
        padding: 0.25rem 0;
        text-align: center;
        color: #666666;
        font-size: 0.875rem;
        display: inline-block;
        width: 2rem;
        border-left: 1px solid #ebebeb;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .reviews-list__item-helpful.active, .reviews-list__item-helpful:hover {
        color: #363636;
        border-color: #3399ff; }
    .reviews-list__item-helpful.active i, .reviews-list__item-helpful:hover i {
        color: #3399ff; }
    .reviews-list__item-helpful.active span, .reviews-list__item-helpful:hover span {
        border-left-color: #3399ff;
        background: #3399ff;
        color: #fff; }
    @media (max-width: 767px) {
        .reviews-list__item-date {
            float: none;
            display: block; } }

    .reviews-list.with-depth {
        padding-left: 4.375rem; }

    @media (max-width: 767px) {
        .reviews-list.with-depth {
            padding-left: 0; } }

    /*------------------------------------------------- */
    /* =  Author wrapper module
/*------------------------------------------------- */
    .author-wrapper {
        margin-bottom: 2rem; }
    .author-wrapper__profile {
        margin-bottom: 1.25rem; }
    .author-wrapper__content {
        display: flex; }
    .author-wrapper__image {
        margin-right: 1.25rem; }
    .author-wrapper__image img {
        <<<<<<< HEAD
        width: 50px;
        height: 50px;
    =======
    width: 140px;
        height: 120px;
    >>>>>>> Martinaa
    -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .author-wrapper__title {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 600;
        line-height: 1.25rem;
        padding-top: 0.375rem;
        <<<<<<< HEAD
        margin: 0; }
    =======
    margin-top: auto;
    margin-bottom: auto; }
    >>>>>>> Martinaa
    .author-wrapper__title a {
        color: #363636; }
    .author-wrapper__title a:hover {
        color: #fb646f; }
    .author-wrapper__title span {
        display: block;
        color: #666666;
        font-weight: 300; }
    .author-wrapper__btn {
        float: right;
        margin-top: 0.375rem; }
    .author-wrapper__list {
        overflow: hidden; }
    .author-wrapper__list li {
        float: left;
        list-style: none;
        color: #666666;
        font-size: 0.875rem;
        padding-left: 1rem;
        padding-right: 1rem;
        border-left: 1px solid #ebebeb;
        font-weight: 400;
        min-width: 3rem; }
    .author-wrapper__list li span {
        display: block;
        color: #363636; }
    .author-wrapper__list li:first-child {
        padding-left: 0;
        border-left: none; }
    @media (max-width: 1199px) {
        .author-wrapper__list li {
            min-width: 2rem;
            padding: 0 0.5rem; } }
    @media (max-width: 991px) {
        .author-wrapper__list li {
            min-width: 3rem; } }
    @media (max-width: 767px) {
        .author-wrapper__list li {
            padding: 0 0.75rem; } }

    .author-wrapper-border {
        padding: 0.5rem;
        background: #fff;
        border: 1px solid #ebebeb;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .author-wrapper-border .author-wrapper__list {
        padding-top: 0.5rem;
        margin-top: -0.5rem;
        border-top: 1px solid #ebebeb; }

    /*------------------------------------------------- */
    /* =  user page module
/*------------------------------------------------- */
    .user-detail {
        margin-top: 3.9375rem; }
    .user-detail__profile {
        padding: 1.5rem 0;
        border-bottom: 1px solid #ebebeb; }
    .user-detail__profile-box {
        display: flex; }
    .user-detail__profile-image {
        margin-right: 1.875rem; }
    .user-detail__profile-image img {
        width: 70px;
        height: 70px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .user-detail__profile-title {
        color: #363636;
        font-size: 2.25rem;
        font-weight: 600;
        line-height: 2rem;
        padding-top: 0.375rem;
        margin: 0.125rem 0 0; }
    .user-detail__profile-title a {
        color: #363636; }
    .user-detail__profile-title a:hover {
        color: #fb646f; }
    .user-detail__profile-title span {
        display: block;
        color: #cccccc;
        font-size: 0.9375rem;
        font-weight: 300; }
    .user-detail__profile-btn {
        float: right;
        margin-top: 0.625rem;
        border-color: #d7d7d7;
        padding: 0.625rem 1.5rem; }
    .user-detail__profile-btn i {
        float: left;
        margin-top: 0.125rem;
        font-size: 1.125rem; }
    .user-detail__profile-btn:hover, .user-detail__profile-btn.following {
        border-color: #fb646f;
        background: #fb646f;
        box-shadow: 0 8px 14px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 8px 14px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 8px 14px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 8px 14px rgba(0, 0, 0, 0.1); }
    .user-detail__profile-list {
        float: right;
        overflow: hidden;
        margin-right: 2rem;
        margin-top: 0.625rem; }
    .user-detail__profile-list li {
        float: left;
        list-style: none;
        color: #666666;
        font-size: 0.9375rem;
        padding-left: 1rem;
        padding-right: 1rem;
        border-left: 1px solid #ebebeb;
        font-weight: 300;
        min-width: 3.5rem; }
    .user-detail__profile-list li span {
        font-size: 1.25rem;
        display: block;
        color: #363636; }
    .user-detail__profile-list li:first-child {
        padding-left: 0;
        border-left: none; }
    .user-detail__scroll-menu {
        position: relative;
        z-index: 2;
        margin-top: -1px; }
    .user-detail__scroll-menu li {
        display: inline-block; }
    .user-detail__scroll-menu li a {
        color: #999999;
        font-size: 1.0625rem;
        font-weight: 300;
        padding: 1.25rem 1rem;
        border-top: 1px solid transparent; }
    .user-detail__scroll-menu li a.active,
    .user-detail__scroll-menu li a:hover {
        color: #363636;
        border-top: 1px solid #fb646f; }
    .user-detail__mylist {
        padding: 1.5rem 0; }
    .user-detail__subtitle {
        margin-bottom: 1.5rem;
        font-weight: 400; }
    .user-detail__subtitle span {
        color: #999999; }
    .user-detail__mylist-box {
        margin-left: -0.9375rem;
        margin-right: -0.9375rem; }
    .user-detail__mylist-box .item {
        padding: 0 0.9375rem;
        width: 33.33333%; }
    .user-detail__review, .user-detail__follow {
        padding: 1.875rem 0;
        background: #fafafa;
        border-top: 1px solid #ebebeb;
        border-bottom: 1px solid #ebebeb; }
    .user-detail__review .owl-theme .owl-controls .owl-buttons div, .user-detail__follow .owl-theme .owl-controls .owl-buttons div {
        border: none;
        background: transparent;
        color: #ccc; }
    .user-detail__review .owl-theme .owl-controls .owl-buttons div:hover, .user-detail__follow .owl-theme .owl-controls .owl-buttons div:hover {
        color: #fb646f; }
    .user-detail__review .owl-theme .owl-controls .owl-buttons div.owl-prev, .user-detail__follow .owl-theme .owl-controls .owl-buttons div.owl-prev {
        margin-left: -2.5rem; }
    .user-detail__review .owl-theme .owl-controls .owl-buttons div.owl-next, .user-detail__follow .owl-theme .owl-controls .owl-buttons div.owl-next {
        margin-right: -2.5rem; }
    .user-detail__review .owl-theme .owl-controls, .user-detail__follow .owl-theme .owl-controls {
        position: initial;
        top: initial;
        margin-top: 0; }
    .user-detail__review .owl-theme .owl-controls .owl-pagination, .user-detail__follow .owl-theme .owl-controls .owl-pagination {
        display: block;
        position: absolute;
        bottom: 0;
        width: 100%; }
    .user-detail__review .owl-theme .owl-controls .owl-buttons, .user-detail__follow .owl-theme .owl-controls .owl-buttons {
        position: absolute;
        width: 100%;
        top: 50%;
        margin-top: -1.25rem; }
    .user-detail__review-box, .user-detail__follow-box {
        margin-left: -0.9375rem;
        margin-right: -0.9375rem; }
    .user-detail__review-box .item, .user-detail__follow-box .item {
        padding: 0 0.9375rem;
        padding-bottom: 2.5rem; }
    .user-detail__cities {
        padding: 1.875rem 0; }
    .user-detail__cities-box {
        margin-left: -0.9375rem;
        margin-right: -0.9375rem; }
    .user-detail__cities-box .item {
        padding: 0 0.9375rem;
        width: 25%; }
    .user-detail a.text-btn span {
        color: #fb646f; }
    .user-detail a.text-btn i {
        font-size: 0.75rem;
        margin-right: 0.25rem; }
    .user-detail__favorites {
        padding: 0 0 2rem; }
    .user-detail__favorites h2.user-detail__subtitle {
        padding-top: 1.5rem;
        border-top: 1px solid #ebebeb; }
    .user-detail__favorites .center-button {
        padding-top: 1rem; }
    .user-detail__favorites-box {
        margin-left: -0.9375rem;
        margin-right: -0.9375rem; }
    .user-detail__favorites-box .item {
        padding: 0 0.9375rem;
        width: 33.33333%; }
    .user-detail__follow {
        padding-top: 1rem; }
    .user-detail__follow .author-wrapper-border {
        margin-bottom: 0; }
    .user-detail__follow .owl-theme .owl-controls .owl-buttons {
        margin-top: -2.75rem; }
    .user-detail__follow-box .item {
        padding-bottom: 3rem; }
    @media (max-width: 991px) {
        .user-detail__profile-btn {
            margin-top: -2rem; }
        .user-detail__profile-list {
            float: none;
            margin-top: 1.5rem;
            margin-right: 0; }
        .user-detail__profile-list li {
            min-width: 3rem; }
        .user-detail__scroll-menu li a {
            font-size: 1rem;
            padding: 1.25rem 0.5rem; }
        .user-detail__mylist-box .item, .user-detail__favorites-box .item, .user-detail__cities-box .item {
            width: 50%; } }
    @media (max-width: 767px) {
        .user-detail__mylist-box .item, .user-detail__favorites-box .item {
            width: 100%;
            padding-bottom: 1rem; } }
    @media (max-width: 576px) {
        .user-detail__profile-btn {
            margin-top: 1.5rem;
            float: none; }
        .user-detail__cities-box .item {
            width: 100%; } }

    /*------------------------------------------------- */
    /* =  review-item module
/*------------------------------------------------- */
    .review-item {
        border: 1px solid #ebebeb;
        background: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.03);
        -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.03);
        -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.03); }
    .review-item__post {
        padding: 1.25rem;
        border-bottom: 1px solid #eeeeee;
        display: flex; }
    .review-item__content {
        padding: 1.25rem; }
    .review-item__post-image {
        margin-right: 1.25rem; }
    .review-item__image {
        width: 4.375rem;
        height: auto; }
    .review-item__post-title {
        font-size: 0.9375rem;
        margin-bottom: 0; }
    .review-item__post-title a {
        color: #363636; }
    .review-item__post-title a:hover {
        color: #fb646f; }
    .review-item__post-location {
        font-size: 0.8125rem;
        color: #ccc;
        padding-bottom: 0.375rem;
        margin-bottom: 0.25rem;
        border-bottom: 1px solid #eeeeee;
        line-height: 1rem; }
    .review-item__post-reviews {
        display: inline-block;
        font-size: 0.8125rem;
        color: #999999;
        line-height: 1rem;
        font-weight: 300; }
    .review-item__post-reviews i {
        color: #cccccc; }
    .review-item__title {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 600;
        line-height: 1.25rem;
        margin: 0; }
    .review-item__date {
        display: inline-block;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 200;
        line-height: 1.25rem;
        margin: 0 0 1rem; }
    .review-item__rating {
        display: inline-block;
        padding: 0.3rem 0.5rem;
        background: rgba(122, 201, 101, 0.9);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
        margin-right: 0.25rem; }
    .review-item__rating.average-rat {
        background: #bdbc60; }
    .review-item__rating.solid-rat {
        background: #cc9334; }
    .review-item__rating.low-rat {
        background: #fb646f; }
    .review-item__description {
        color: #666666;
        margin-bottom: 1.25rem; }
    .review-item__reply {
        float: right;
        padding: 0.25rem 0.5rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 200;
        border: 1px solid #ebebeb;
        -webkit-border-radius: 1.25rem;
        -moz-border-radius: 1.25rem;
        -ms-border-radius: 1.25rem;
        border-radius: 1.25rem; }
    .review-item__reply i {
        font-size: 1rem;
        float: left;
        margin-right: 0.25rem;
        margin-top: 0.125rem; }
    .review-item__reply:hover {
        color: #fb646f;
        border-color: #fb646f; }
    .review-item__helpful {
        padding: 0.25rem 0.5rem;
        padding-right: 2.5rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 200;
        border: 1px solid #ebebeb;
        position: relative;
        -webkit-border-radius: 0.125rem;
        -moz-border-radius: 0.125rem;
        -ms-border-radius: 0.125rem;
        border-radius: 0.125rem; }
    .review-item__helpful i {
        font-size: 1rem;
        float: left;
        margin-right: 0.25rem;
        margin-top: 0.125rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .review-item__helpful span {
        position: absolute;
        right: 0;
        top: 0;
        padding: 0.25rem 0;
        text-align: center;
        color: #666666;
        font-size: 0.875rem;
        display: inline-block;
        width: 2rem;
        border-left: 1px solid #ebebeb;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .review-item__helpful.active, .review-item__helpful:hover {
        color: #363636;
        border-color: #3399ff; }
    .review-item__helpful.active i, .review-item__helpful:hover i {
        color: #3399ff; }
    .review-item__helpful.active span, .review-item__helpful:hover span {
        border-left-color: #3399ff;
        background: #3399ff;
        color: #fff; }
    @media (max-width: 767px) {
        .review-item__date {
            float: none;
            display: block; } }

    /*------------------------------------------------- */
    /* =  cities post module
/*------------------------------------------------- */
    .cities-post {
        margin-bottom: 1.25rem; }
    .cities-post__image {
        width: 100%;
        height: auto;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        margin-bottom: 1rem; }
    .cities-post__title {
        margin-bottom: 0; }
    .cities-post__title a {
        color: #363636; }
    .cities-post__title a:hover {
        color: #fb646f; }
    .cities-post__list {
        margin-bottom: 0.5rem; }
    .cities-post__list li {
        display: inline-block;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 300;
        margin-right: 0.25rem; }
    .cities-post__list li:before {
        content: '';
        display: inline-block;
        width: 2px;
        height: 3px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        background: #999999;
        margin-right: 0.5rem;
        float: left;
        margin-top: 0.625rem; }
    .cities-post__list li:first-child:before {
        display: none; }
    .cities-post__link {
        font-size: 0.9375rem; }

    /*------------------------------------------------- */
    /* =  add listing module
/*------------------------------------------------- */
    .add-listing {
        padding-top: 60px; }
    .add-listing__title-box {
        padding: 1.875rem 0;
        border-bottom: 1px solid #ebebeb; }
    .add-listing__title {
        margin-bottom: 0; }
    .add-listing__form {
        margin: 0;
        padding-bottom: 3rem; }
    .add-listing__form-box {
        background: #fafafa;
        border: 1px solid #ebebeb;
        margin-bottom: 1.875rem;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .add-listing__form-title {
        padding: 1rem 1.875rem;
        border-bottom: 1px solid #ebebeb;
        margin: 0; }
    .add-listing__form-content {
        padding: 1.5rem 1.875rem 0; }
    .add-listing__label {
        display: block;
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 400;
        margin-bottom: 0.75rem; }
    .add-listing__label span {
        color: #999999; }
    .add-listing__label.with-padding-top {
        padding: 0.625rem 0; }
    .add-listing__input, .add-listing__textarea {
        display: block;
        width: 100%;
        padding: 0.625rem 1.25rem;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 300;
        background: #ffffff;
        outline: none;
        border: 1px solid #dddddd;
        margin: 0 0 1.875rem;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .add-listing__input:focus, .add-listing__textarea:focus {
        border-color: #fb646f; }
    .add-listing__textarea {
        height: 7rem; }
    .add-listing__input-file-box {
        position: relative;
        margin-bottom: 1.875rem; }
    .add-listing__input-file {
        width: 100%;
        height: 150px;
        position: relative;
        z-index: 2;
        cursor: pointer;
        opacity: 0; }
    .add-listing__input-file-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 1px dashed #dddddd;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center; }
    .add-listing__input-file-wrap i {
        font-size: 2.5rem;
        color: #ccc; }
    .add-listing__input-file-wrap p {
        color: #ccc;
        margin-bottom: 0; }
    .add-listing__submit {
        padding: 0.625rem 1.875rem;
        color: #fb646f;
        font-size: 0.9375rem;
        font-weight: 600;
        background: transparent;
        outline: none;
        border: 2px solid #d7d7d7;
        margin: 0 0 1.875rem;
        cursor: pointer;
        -webkit-border-radius: 1.75rem;
        -moz-border-radius: 1.75rem;
        -ms-border-radius: 1.75rem;
        border-radius: 1.75rem;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .add-listing__submit i {
        margin-right: 0.25rem; }
    .add-listing__submit:hover {
        color: #ffffff;
        background: #fb646f;
        border-color: #fb646f;
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -webkit-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -moz-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -o-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06); }
    .add-listing .select2-container--default {
        margin-bottom: 1.25rem;
        background: #fff; }
    .add-listing .select2-container--default .select2-selection--single {
        border: 1px solid #dddddd;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px; }
    .add-listing .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0.4375rem 1.25rem;
        color: #999999;
        font-weight: 300; }
    .add-listing .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 0.625rem; }
    .add-listing .center-button {
        padding-top: 1.25rem; }

    /*------------------------------------------------- */
    /* =  page title module
/*------------------------------------------------- */
    .page-title {
        margin-top: 3.875rem;
        padding: 2rem 0;
        border-bottom: 1px solid #ebebeb; }
    .page-title__title {
        margin-bottom: 0; }
    .page-title__description {
        color: #ccc;
        font-weight: 300; }

    /*------------------------------------------------- */
    /* =  blog post module
/*------------------------------------------------- */
    .blog-post {
        margin-bottom: 2rem; }
    .blog-post__image {
        width: 100%;
        height: auto;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        margin-bottom: 0.75rem; }
    .blog-post__list {
        margin-bottom: 0.75rem; }
    .blog-post__list-item {
        display: inline-block;
        margin-right: 0.25rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 300; }
    .blog-post__list-item i {
        color: #ccc; }
    .blog-post__list-item a {
        color: #999999; }
    .blog-post__list-item a:hover {
        color: #fb646f; }
    .blog-post__title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem; }
    .blog-post__title a {
        color: #363636; }
    .blog-post__title a:hover {
        text-decoration: underline !important; }
    .blog-post__description {
        color: #666666; }
    .blog-post__tags i {
        color: #ccc; }
    .blog-post__tags a {
        color: #999999; }
    .blog-post__tags a:hover {
        color: #363636;
        text-decoration: underline !important; }

    /*------------------------------------------------- */
    /* =  sidebar module
/*------------------------------------------------- */
    .sidebar {
        padding: 2rem 0;
        padding-left: 1.25rem;
        border-left: 1px solid #f5f5f5;
        margin-left: -1px; }
    .sidebar__widget {
        margin-bottom: 1.25rem; }
    .sidebar__widget-title {
        /* font-size: 0.9375rem; */
        font-size: 1.4375rem;
        margin-bottom: 1.25rem;
        padding-bottom: 0.875rem;
        border-bottom: 1px solid #eeeeee; }
    .sidebar__category-list li {
        display: block;
        margin-bottom: 0.375rem; }
    .sidebar__category-list li a {
        color: #666;
        font-size: 0.9375rem;
        font-family: "Nunito", sans-serif;
        font-weight: 300; }
    .sidebar__category-list li a:before {
        content: '\f112';
        font-family: 'LineAwesome';
        font-size: 0.625rem;
        color: #ccc;
        margin-right: 1.25rem; }
    .sidebar__category-list li a:hover {
        color: #fb646f; }
    .sidebar__category-list li:last-child {
        margin-bottom: 0; }
    .sidebar__tags-list li {
        display: inline-block;
        margin-bottom: 0.25rem; }
    .sidebar__tags-list li a {
        padding: 0.25rem 0.625rem;
        color: #999999;
        font-size: 0.875rem;
        font-family: "Nunito", sans-serif;
        font-weight: 200;
        border: 1px solid #ebebeb;
        -webkit-border-radius: 1px;
        -moz-border-radius: 1px;
        -ms-border-radius: 1px;
        border-radius: 1px;
        text-transform: lowercase; }
    .sidebar__tags-list li a:hover {
        color: #fb646f; }
    .sidebar__instagram-list {
        overflow: hidden; }
    .sidebar__instagram-list li {
        display: inline-block;
        margin-bottom: 0.625rem;
        margin-right: 0.625rem;
        float: left; }
    .sidebar__instagram-list li a img {
        max-width: 4.6875rem;
        height: auto; }
    .sidebar__instagram-list li a:hover {
        opacity: 0.7; }
    .sidebar__instagram-list li:nth-child(4n) {
        margin-right: 0; }
    .sidebar__popular-list li {
        display: flex;
        margin-bottom: 1.25rem; }
    .sidebar__popular-list li img {
        margin-right: 1.25rem;
        width: 3.125rem;
        height: 3.125rem; }
    .sidebar__popular-list-title {
        font-size: 0.9375rem;
        font-weight: 300;
        line-height: 1rem;
        padding-top: 0.4rem;
        margin: 0; }
    .sidebar__popular-list-title a {
        color: #666; }
    .sidebar__popular-list-title a:hover {
        color: #fb646f; }
    .sidebar__popular-list-desc {
        font-size: 13px;
        margin-bottom: 0; }
    .sidebar__advertise {
        text-align: center; }
    .sidebar__advertise img {
        max-width: 100%;
        height: auto; }
    .sidebar__advertise-title {
        display: block;
        font-size: 13px; }
    .sidebar__listing-list li {
        display: block;
        color: #666;
        font-size: 0.9375rem;
        font-weight: 300;
        line-height: 1.75rem; }
    .sidebar__listing-list li i {
        display: inline-block;
        font-size: 1rem;
        color: #ccc;
        margin-right: 0.25rem; }
    .sidebar__listing-list li span.color-close {
        color: #fb646f; }
    .sidebar__listing-list li div {
        margin-left: 1.5rem; }
    .sidebar__listing-list li div p {
        margin-bottom: 0;
        color: #666; }
    .sidebar__listing-list li div p span.right-align {
        float: right; }
    .sidebar__map-widget .sidebar__widget-title {
        margin-bottom: 0;
        padding-bottom: 0.615rem;
        border-bottom: none; }
    .sidebar__map-widget #mapSingle {
        height: 325px; }
    @media (max-width: 1199px) {
        .sidebar__instagram-list li {
            margin-right: 0.625rem !important; } }

    @media (max-width: 991px) {
        .sidebar {
            padding: 0 0 2rem;
            border-left: none;
            margin-left: 0px; } }

    /*------------------------------------------------- */
    /* =  single post module
/*------------------------------------------------- */
    .single-post__image {
        width: 100%;
        height: auto;
        margin-bottom: 1.5rem; }

    .single-post__list-item {
        display: inline-block;
        margin-right: 0.25rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 300; }
    .single-post__list-item i {
        color: #ccc; }
    .single-post__list-item a {
        color: #999999; }
    .single-post__list-item a:hover {
        color: #fb646f; }

    .single-post__description {
        margin-bottom: 1.25rem;
        color: #666; }

    .single-post__quote {
        padding: 1rem 0;
        color: #363636;
        font-size: 1.25rem;
        font-weight: 600;
        font-style: italic;
        padding-left: 70px;
        position: relative; }

    .single-post__quote:before {
        content: '"';
        color: #fb646f;
        font-size: 3.75rem;
        display: inline-block;
        font-family: "Permanent Marker", cursive;
        position: absolute;
        font-style: normal;
        top: 1.25rem;
        left: 1rem; }

    .single-post__tags {
        margin: 1rem 0; }
    .single-post__tags i {
        color: #ccc; }
    .single-post__tags a {
        color: #999999; }
    .single-post__tags a:hover {
        color: #363636;
        text-decoration: underline !important; }

    .single-post__share-list {
        margin: 1rem 0 2rem;
        text-align: right;
        color: #999999; }
    .single-post__share-list i {
        color: #ccc; }
    .single-post__share-list a {
        font-size: 0.9375rem;
        margin-left: 0.5rem; }
    .single-post__share-list a.twitter i {
        color: #5ab4d6; }
    .single-post__share-list a.facebook i {
        color: #5252d4; }
    .single-post__share-list a.pinterest i {
        color: #d74040; }
    .single-post__share-list a:hover {
        opacity: 0.7; }

    .single-post__line-title {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 600;
        padding-bottom: 1rem;
        margin: 0 0 1.25rem;
        line-height: 1rem;
        border-bottom: 1px solid #eeeeee; }

    @media (max-width: 767px) {
        .single-post__share-list {
            text-align: left; } }

    .author-post-box {
        margin-bottom: 2.5rem;
        padding-bottom: 1.25rem;
        border-bottom: 1px solid #eeeeee; }
    .author-post-box__content {
        display: flex; }
    .author-post-box__image {
        margin-right: 1.25rem; }
    .author-post-box__image img {
        width: 50px;
        height: 50px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }
    .author-post-box__title {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 600;
        line-height: 1.25rem;
        padding-top: 0.375rem;
        margin: 0; }
    .author-post-box__title a {
        color: #363636; }
    .author-post-box__title a:hover {
        color: #fb646f; }
    .author-post-box__title span {
        display: block;
        color: #666666;
        font-weight: 300; }
    .author-post-box__btn {
        float: right;
        margin-top: 0.375rem; }

    .other-posts {
        margin-bottom: 2.5rem;
        padding-bottom: 2.5rem;
        border-bottom: 1px solid #eeeeee;
        display: flex;
        position: relative; }
    .other-posts__prev, .other-posts__next {
        display: flex;
        width: 50%;
        align-items: center;
        padding: 0.5rem 0; }
    .other-posts__prev i, .other-posts__next i {
        font-size: 20px;
        color: #999999;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .other-posts__prev:hover i, .other-posts__next:hover i {
        color: #fb646f; }
    .other-posts__next {
        text-align: right;
        flex-direction: row-reverse; }
    .other-posts__prev i {
        margin-right: 1rem; }
    .other-posts__next i {
        margin-left: 1rem; }
    .other-posts__desc {
        margin-bottom: 0; }
    .other-posts__title {
        margin-bottom: 0; }

    .other-posts:after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 2.5rem;
        left: 50%;
        width: 1px;
        background: #eeeeee; }

    @media (max-width: 576px) {
        .other-posts {
            display: block; }
        .other-posts__prev, .other-posts__next {
            display: flex;
            width: 100%;
            text-align: left; }
        .other-posts:after {
            display: none; } }

    .comments__list-item {
        list-style: none;
        margin-bottom: 1.875rem;
        padding-top: 1.875rem;
        border-top: 1px solid #eeeeee; }

    .comments__list-item:first-child {
        padding-top: 0;
        border-top: none; }

    .comments__list-item-image {
        float: left;
        width: 3.125rem;
        height: 3.125rem;
        margin-right: 1.25rem;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px; }

    .comments__list-item-content {
        overflow: hidden; }

    .comments__list-item-title {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 600;
        line-height: 1.25rem;
        margin: 0; }

    .comments__list-item-location, .comments__list-item-date {
        display: inline-block;
        color: #666;
        font-size: 0.9375rem;
        font-weight: 300;
        line-height: 1.25rem;
        margin: 0 0 1rem; }

    .comments__list-item-date {
        float: right;
        color: #999999;
        font-weight: 200; }

    .comments__list-item-reply {
        float: right;
        padding: 0.25rem 0.5rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 200;
        border: 1px solid #ebebeb;
        -webkit-border-radius: 1.25rem;
        -moz-border-radius: 1.25rem;
        -ms-border-radius: 1.25rem;
        border-radius: 1.25rem; }
    .comments__list-item-reply i {
        font-size: 1rem;
        float: left;
        margin-right: 0.25rem;
        margin-top: 0.125rem; }

    .comments__list-item-reply:hover {
        color: #fb646f; }

    /*------------------------------------------------- */
    /* =  contact form module
/*------------------------------------------------- */
    .contact-form {
        padding: 1.875rem;
        background: #fafafa;
        margin-bottom: 1.875rem;
        border: 1px solid #ebebeb;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px; }
    .contact-form__input-text, .contact-form__textarea {
        display: block;
        width: 100%;
        padding: 0.625rem 1.25rem;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 300;
        background: #ffffff;
        outline: none;
        border: 1px solid #dddddd;
        margin: 0 0 1.875rem;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .contact-form__input-text:hover, .contact-form__textarea:hover {
        border-color: #17286E; }
    .contact-form__textarea {
        height: 6.25rem; }
    .contact-form__submit {
        padding: 0.625rem 2rem;
        color: #17286E;
        font-size: 0.9375rem;
        font-weight: 600;
        background: transparent;
        outline: none;
        border: 2px solid #d7d7d7;
        margin: 0;
        cursor: pointer;
        -webkit-border-radius: 1.75rem;
        -moz-border-radius: 1.75rem;
        -ms-border-radius: 1.75rem;
        border-radius: 1.75rem;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .contact-form__submit:hover {
        color: #ffffff;
        background: #fb646f;
        border-color: #fb646f;
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -webkit-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -moz-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -o-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06); }

    /*------------------------------------------------- */
    /* =  contact form module (in review added elems)
/*------------------------------------------------- */
    .contact-form__rate {
        margin-bottom: 0; }

    .contact-form__rate-bx {
        display: inline-block;
        margin-right: 0.5rem;
        font-size: 18px;
        color: #cccccc; }
    .contact-form__rate-bx i {
        margin-right: -0.125rem; }
    .contact-form__rate-bx i.active,
    .contact-form__rate-bx i.selected {
        color: #fb646f; }

    .contact-form__rate-bx-show {
        display: inline-block;
        color: #999999;
        font-weight: 300;
        font-size: 1rem;
        margin-bottom: 1.5rem; }

    .contact-form__upload-btn {
        text-align: right;
        position: relative; }
    .contact-form__upload-btn span {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.25rem 0.625rem;
        color: #999999;
        font-size: 0.875rem;
        font-weight: 200;
        border: 1px solid #cccccc;
        -webkit-border-radius: 1.25rem;
        -moz-border-radius: 1.25rem;
        -ms-border-radius: 1.25rem;
        border-radius: 1.25rem;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }
    .contact-form__upload-btn span i {
        font-size: 1rem;
        float: left;
        margin-right: 0.25rem;
        margin-top: 0.125rem; }

    .contact-form__input-file {
        display: inline-block;
        width: 136px;
        opacity: 0;
        position: relative;
        z-index: 2; }

    .contact-form__input-file:hover + span {
        color: #fb646f;
        border-color: #fb646f; }

    @media (max-width: 767px) {
        .contact-form__upload-btn {
            text-align: left;
            margin-bottom: 2rem; }
        .contact-form__upload-btn span {
            left: 0;
            right: initial; } }

    .inner-review {
        padding: 2rem 0;
        background: transparent;
        border: none;
        border-top: 1px solid #cccccc;
        border-bottom: 1px solid #ebebeb; }
    .inner-review__form {
        overflow: hidden; }
    .inner-review__form img {
        float: left;
        width: 2.5rem;
        height: 2.5rem; }
    .inner-review__form-box {
        margin-left: 4.5rem; }

    .inner-review.without-border {
        padding-top: 0;
        border-top: none; }

    /*------------------------------------------------- */
    /* =  contact post module
/*------------------------------------------------- */
    .contact-post {
        display: flex;
        margin-top: 2.625rem; }
    .contact-post i {
        color: #fb646f;
        font-size: 1.125rem;
        margin-right: 1.875rem; }
    .contact-post__title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem; }
    .contact-post__description {
        margin-bottom: 0;
        font-size: 1rem;
        color: #666666; }

    @media (max-width: 767px) {
        .contact-post {
            margin-top: 0;
            margin-bottom: 2.625rem; } }

    /*------------------------------------------------- */
    /* =  sign form module
/*------------------------------------------------- */
    .sign-form__label {
        color: #363636;
        font-size: 0.9375rem;
        font-weight: 400;
        margin-bottom: 0.75rem; }

    .sign-form__input-text {
        display: block;
        width: 100%;
        padding: 0.625rem 1.25rem;
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 300;
        background: #ffffff;
        outline: none;
        border: 1px solid #dddddd;
        margin: 0 0 1.875rem;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out; }

    .sign-form__input-text:hover {
        border-color: #fb646f; }

    .sign-form__checkbox {
        display: inline-block;
        position: relative;
        margin-bottom: 1.5rem; }

    .sign-form__input-checkbox {
        width: 1.25rem;
        height: 1.25rem;
        margin-right: 0.25rem;
        opacity: 0;
        position: relative;
        z-index: 2; }

    .sign-form__checkbox-style {
        display: inline-block;
        position: absolute;
        top: 3px;
        left: 0;
        width: 1.25rem;
        height: 1.25rem;
        border: 1px solid #dddddd;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px; }

    .sign-form__checkbox-style:after {
        content: '';
        position: absolute;
        top: 0.3125rem;
        left: 0.1875rem;
        width: 0.75rem;
        height: 0.4rem;
        border-left: 1px solid #fb646f;
        border-bottom: 1px solid #fb646f;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        opacity: 0; }

    .sign-form__input-checkbox:checked + .sign-form__checkbox-style:after {
        opacity: 1; }

    .sign-form__checkbox-text {
        color: #999999;
        font-size: 0.9375rem;
        font-weight: 300; }

    .sign-form__forget-link {
        float: right;
        margin-bottom: 1.875rem;
        color: #666;
        font-size: 0.9375rem;
        font-weight: 300;
        text-decoration: underline !important; }

    .sign-form__submit {
        width: 100%;
        padding: 0.625rem 2rem;
        color: #17286E;
        font-size: 0.9375rem;
        font-weight: 600;
        background: transparent;
        outline: none;
        border: 2px solid #d7d7d7;
        margin: 0 0 0.875rem;
        cursor: pointer;
        margin-left: -10px;
        -webkit-border-radius: 1.75rem;
        -moz-border-radius: 1.75rem;
        -ms-border-radius: 1.75rem;
        border-radius: 1.75rem;
        box-shadow: 0 3px 8px rgb(0 0 0 / 2%);
        -webkit-box-shadow: 0 3px 8px rgb(0 0 0 / 2%);
        -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        -o-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
    }

    .sign-form__submit:hover {
        color: #ffffff;
        background: #17286E;
        border-color: #17286E;
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -webkit-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -moz-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06);
        -o-box-shadow: 0 5px 14px rgba(0, 0, 0, 0.06); }

    .sign-form__text {
        text-align: center;
        margin-bottom: 1.875rem; }

    .sign-form__social {
        text-align: center; }
    .sign-form__social li {
        display: inline-block;
        margin: 0 0.125rem; }
    .sign-form__social li a {
        background: #f7f7f7;
        font-size: 0.9375rem;
        width: 2.5rem;
        height: 2.5rem;
        line-height: 2.7rem;
        text-align: center;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
    .sign-form__social li a.facebook {
        color: #7073e5; }
    .sign-form__social li a.facebook:hover {
        color: #fff;
        background: #7073e5; }
    .sign-form__social li a.google {
        color: #e6545f; }
    .sign-form__social li a.google:hover {
        color: #fff;
        background: #e6545f; }

    /*------------------------------------------------- */
    /* =  Footer */
    /*------------------------------------------------- */
    .footer__up-part {
        padding: 3rem 0 1rem; }

    .footer__widget {
        margin-bottom: 2rem; }
    .footer__widget img {
        margin-bottom: 0.75rem; }

    .footer__widget-title {
        margin-bottom: 0.5rem;
        padding-top: 0.5rem; }

    .footer__widget-title-white {
        color: #fff; }

    .footer__subscribe-form {
        margin: 0;
        position: relative; }

    .footer__subscribe-input {
        width: 100%;
        margin: 0;
        outline: none;
        border: none;
        padding: 0.75rem 1.25rem;
        background: transparent;
        border-bottom: 1px solid #adadad; }

    .footer__subscribe-button {
        float: right;
        border: none;
        background: none;
        outline: none;
        margin-top: -2.5rem;
        position: relative;
        z-index: 2;
        color: #999999;
        font-size: 1.25rem;
        margin-right: 1rem;
        cursor: pointer; }

    .footer__subscribe-button-primary {
        color: #fb646f; }

    .footer__subscribe-button:hover {
        color: #fb646f; }

    .footer__down-part {
        padding: 1.25rem 0;
        border-top: 1px solid #edeef0; }

    .footer__down-part-black {
        border-top: 1px solid #666666; }

    .footer__copyright {
        margin-bottom: 0; }

    .footer__social-list {
        text-align: right; }
    .footer__social-list li {
        display: inline-block;
        margin-left: 1rem; }
    .footer__social-list li a {
        color: #666666;
        font-size: 1rem; }
    .footer__social-list li a:hover {
        color: #fb646f; }

    @media (max-width: 767px) {
        .footer__social-list {
            margin-top: 10px;
            text-align: left; }
        .footer__social-list li {
            margin-left: 0;
            margin-right: 1rem; } }

    .footer-black {
        background: #333333; }


    .tblog
    {
        padding: 144px 0px;
        background-color: #FBFBFB;

    }


    .tblogtitle
    {
        margin-bottom: 96px;
    }
    .tblogtitle h2
    {
        font-weight: 700;
        letter-spacing: 1.3px;
        line-height: 46px;
    }
    .tblogtitle p
    {
        font-weight: 400;
        letter-spacing: 1.2px;
        line-height: 21px;
        margin-top: 14px;
    }

    .tblog2
    {

        background-color: white;
        /* height: 300px; */
        border-radius: 10px;

        padding: 5px;
        -webkit-box-shadow: 14px 14px 36px -20px rgba(46,45,46,1);
        -moz-box-shadow: 14px 14px 36px -20px rgba(46,45,46,1);
        box-shadow: 14px 14px 36px -20px rgba(46,45,46,1);
    }


    .tblog3 img
    {
        width: 100%;
        height:100% !important;
        /* background-size: cover;
  background-image: url(); */
        transition: transform 0.5s ;


    }
    .tblog3
    {
        overflow: hidden;
        /* height: 300px; */
    }
    .tblog3:hover img
    {
        transform: scale(1.1,1.1);

    }

    .tblog4
    {
        padding: 30px;
    }

    .tblog4 div
    {
        color: #4c4c4c;
        font-weight: 600;
        font-size: 12px;
        line-height: 18px;
        margin-bottom: 12px;
    }

    .tblog4 a
    {
        color: black;
        font-weight: 600;
        font-size: 12px;
        line-height: 18px;
        margin-bottom: 12px;

    }
    .tblog4 a h5
    {
        color: black;
        font-weight: 600;
        font-size: 14px;
        line-height: 21px;
        margin-bottom: 12px;
    }

    .portfolio-grid
    {
        padding-bottom: 30px;
    }

    .grid-item
    {
        position: relative;
        overflow: hidden;
        display: block;
    }

    .twork-overlay
    {
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(255 113 0 / 80%);
        opacity: 0;
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .grid-item:hover .twork-overlay
    {
        opacity: 1;
    }
    .grid-item:hover .twork-overlay .twork-overlayp
    {
        opacity: 1;
    }
    .grid-item .twork-overlay .twork-overlayp
    {
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
        transform: translate(-50%,-50%);
        transition: all 0.4s ease 0.2s;
        opacity: 0;
    }
    .grid-item .twork-overlay .twork-overlayp h3
    {
        color: #fff;
    }
    .search-btn{
        background-color: white;
        height: 50px ;
        width: 100px ;
        text-align: center ;
        font-size: 15px ;
        border-radius: 50px ;
        color: #fa8c3d ;
        border: solid 1px #fa8c3d;
    }
    .search-btn:hover{
        background-color: #fa8c3d;
        color: white;
    }
    .search-btn:focus{
        outline: none;
    }
    .shadow1{
        -webkit-box-shadow: 14px 14px 36px -20px rgba(46,45,46,0.3);
        -moz-box-shadow: 14px 14px 36px -20px rgba(46,45,46,0.3);
        box-shadow: 14px 14px 36px -20px rgba(46,45,46,0.3);
    }
    .shadow2{
        -webkit-box-shadow: -2px 14px 28px -8px rgba(128,128,128,1);
        -moz-box-shadow: -2px 14px 28px -8px rgba(128,128,128,1);
        box-shadow: -2px 14px 28px -8px rgba(128,128,128,1);
    }
    .love{
        border-radius: 50px;
        border: solid 1px #17286E;
        width: 90%;
        height: 50px;
        padding-top:13px ;
        color: #17286E;
        margin-left: 10px;
        text-align: center;
        font-family: Arial;
    }
    .love:hover{
        background-color:  #17286E ;
        color: white;
        font-weight: bolder;
    }
    .love-fill{
        background-color: #17286E;
        border-radius: 50px;
        border: solid 1px #17286E;
        width: 90%;
        height: 50px;
        padding-top:13px ;
        color: #FFF;
        margin-left: 10px;
        text-align: center;

    }
    .love-fill:hover{
        background-color:  #FFF;
        color: #17286E;

    }
    .dis-container{
        height: 200px;
    }
    .search-table{
        width: 70% ;
        border-radius: 10px ;
        height: 100px ;
    }
    #map{
        height: 700px;

    }

    @media (max-width: 576px){
        #map{
            height: 400px;

        }
    }

    .Almarai{
        font-family: 'Almarai', sans-serif;
    }
    .Nunito{
        font-family: "Nunito", sans-serif;
    }
    .tnava{
        color: #000 !important;
    }
    .botton{
        width: 120px;
        height: 50px;
        border-radius: 50px;
        background-color: #FFF;
        color: #17286E;
        text-align: center;
        padding-top: 12px;
    }
    .top-sharing{
        background: white ;
        height: 400px;
        margin-left: 35px;
        border-radius: 20px;

    }

    .discover1 {
        border: 1px solid gray;
    //width: 107%;
        -webkit-animation-name: salama;
        -webkit-animation-duration: 5s;
        -webkit-animation-direction: alternate;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .discover {
        border: 1px solid gray;
        -webkit-animation-name: salama;
        -webkit-animation-duration: 5s;
        -webkit-animation-direction: alternate;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        padding: 18rem 0 2.5rem;
        background-size: cover;
    }

    @-webkit-keyframes salama {
        0% {
            background-image: url('../upload/bac1.jpg');
            background-size: cover;
        }
        50% {
            background-image: url('../upload/bac2.jpg');
            background-size: cover;
        }
        100% {
            background-image: url('../upload/bac3.jpg');
            background-size: cover;
        }

    }
    .margin{
        height: 35px;
        margin: 0px 10px 0px 10px;
    }

    @media (max-width:1198px) {
        .margin{
            margin: 10px 0px 10px 0px;
        }

    }
    @media (max-width:769px) {
        .margin{
            margin: 10px -10px 10px -10px;
        }

    }
    .comments{

        padding:20px;
        margin-bottom: 10px;
        -webkit-box-shadow: 14px 17px 5px 0px rgba(163,163,163,1);
        -moz-box-shadow: 14px 17px 5px 0px rgba(163,163,163,1);
        box-shadow: 14px 17px 5px 0px rgba(163,163,163,1);
        margin: 0px 0px 50px 0px;
        background-color: #FFF;
    }
    .contact-form__input-text{
        color:#17286E;

    }


</style>

@section('content')
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
            <div class="container">
        @if ( LaravelLocalization::getCurrentLocaleName() == 'English')
                    <hr>
                <center>
                    <h1 class="contact-page__title" style="font-family: Swis721_Hv_BT_Heavy">
                        Contact Us
                    </h1>
                </center>

                <hr>

                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">

                        <!-- Contact form module -->
                        <form class="contact-form" id="contact-form" method="post" action="{{route('site.contact')}}">
                            @csrf

                            <input class="contact-form__input-text" type="text" name="user_email" id="mail" placeholder="Email Address" {{ old('user_email') }} />
                            <input class="contact-form__input-text" type="text" name="subject" id="subject" placeholder="Subject" {{ old('subject') }} />
                            <textarea class="contact-form__input-text" name="message" id="comment" placeholder="Message" >{{ old('message') }}</textarea>

                            {{--							<input class="contact-form__submit" type="submit" name="submit-contact" id="submit_contact" value="Submit Message" />--}}
                            <button  class="sign-form__submit"  style="width:50%; margin-left:150px;"  name="submit-contact"  type="submit">

                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                Submit Message
                            </button>
                        </form>
                        <!-- End Contact form module -->

                    </div>

                    <div class="col-lg-3 offset-lg-1 col-md-4">

                        <!-- contact-post-module -->
                        <div class="contact-post">
                            <i class="la la-map-marker"></i>
                            <div class="contact-post__content">
                                <h2 class="contact-post__title">
                                    Location:
                                </h2>
                                <p class="contact-post__description">
                                    Al Khobar, Saudi Arabia
                                </p>
                            </div>
                        </div>
                        <!-- End contact-post-module -->

                        <!-- contact-post-module -->
                        <div class="contact-post">
                            <i class="la la-phone"></i>
                            <div class="contact-post__content">
                                <h2 class="contact-post__title">
                                    Phone:
                                </h2>
                                <p class="contact-post__description">
                                    00966544649428
                                </p>
                            </div>
                        </div>
                        <!-- End contact-post-module -->

                        <!-- contact-post-module -->
                        <div class="contact-post">
                            <i class="la la-envelope"></i>
                            <div class="contact-post__content">
                                <h2 class="contact-post__title">
                                    Email:
                                </h2>
                                <p class="contact-post__description">
                                    FALATMAH@GMAIL.COM
                                </p>
                            </div>
                        </div>
                        <!-- End contact-post-module -->

                    </div>

                </div>
    @elseif ( LaravelLocalization::getCurrentLocaleName() == 'Arabic')

            <center>
                <hr>
                <h1 class="contact-page__title" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 50px">
                    تواصل معنا

                </h1>
                <hr>
            </center>

            <div class="row">
                <div class="col-lg-8 col-md-8 text-right" dir="rtl">

                    <!-- Contact form module -->
                    <form class="contact-form" id="contact-form" method="post" action="{{route('site.contact')}}">
                        @csrf

                        <input class="contact-form__input-text" type="text" name="user_email" id="mail" placeholder="البريد الالكتروني" {{ old('user_email') }} />
                        <input class="contact-form__input-text" type="text" name="subject" id="subject" placeholder="محتوي الرساله" {{ old('subject') }} />
                        <input class="contact-form__input-text" name="message" id="comment" placeholder="الرساله" {{ old('message') }}/>
                        {{--							<input class="contact-form__submit" type="submit" name="submit-contact" id="submit_contact" value="Submit Message" />--}}
                        <button  class="sign-form__submit"  style="width:50%; margin-right:150px;"  name="submit-contact"  type="submit">

                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            ارسال الرساله
                        </button>
                    </form>
                    <!-- End Contact form module -->

                </div>

                <div class="col-lg-3 offset-lg-1 col-md-4 text-right" style="margin-left: 10px;" dir="rtl">

                    <!-- contact-post-module -->
                    <div class="contact-post text-right" dir="rtl">
                        <i class="la la-map-marker"></i>
                        <div class="contact-post__content text-right" dir="rtl">
                            <h2 class="contact-post__title text-right" dir="rtl" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 30px">
                                المكان
                            </h2>
                            <p class="contact-post__description">
                                Al Khobar, Saudi Arabia
                            </p>
                        </div>
                    </div>
                    <!-- End contact-post-module -->

                    <!-- contact-post-module -->
                    <div class="contact-post text-right" dir="rtl">
                        <i class="la la-phone"></i>
                        <div class="contact-post__content text-right" dir="rtl">
                            <h2 class="contact-post__title" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 30px">
                                رقم الهاتف
                            </h2>
                            <p class="contact-post__description text-right" dir="rtl">
                                00966544649428
                            </p>
                        </div>
                    </div>
                    <!-- End contact-post-module -->

                    <!-- contact-post-module -->
                    <div class="contact-post text-right" dir="rtl">
                        <i class="la la-envelope"></i>
                        <div class="contact-post__content text-right" dir="rtl">
                            <h2 class="contact-post__title text-right" dir="rtl" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 30px">
                                البريد الالكتروني
                            </h2>
                            <p class="contact-post__description text-right" dir="rtl">
                                FALATMAH@GMAIL.COM
                            </p>
                        </div>
                    </div>
                    <!-- End contact-post-module -->

                </div>

            </div>


    @else
                    <center>
                        <hr>
                        <h1 class="contact-page__title" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 50px">
                            تواصل معنا

                        </h1>
                        <hr>
                    </center>

                    <div class="row">
                        <div class="col-lg-8 col-md-8 text-right" dir="rtl">

                            <!-- Contact form module -->
                            <form class="contact-form" id="contact-form" method="post" action="{{route('site.contact')}}">
                                @csrf

                                <input class="contact-form__input-text" type="text" name="user_email" id="mail" placeholder="{{__('home.email')}} " {{ old('user_email') }} />
                                <input class="contact-form__input-text" type="text" name="subject" id="subject" placeholder="{{__('home.subject')}}" {{ old('subject') }} />
                                <input class="contact-form__input-text" name="message" id="comment" placeholder="{{__('home.messages')}}" {{ old('message') }}/>
                                {{--							<input class="contact-form__submit" type="submit" name="submit-contact" id="submit_contact" value="Submit Message" />--}}
                                <button  class="sign-form__submit"  style="width:50%; margin-right:150px;"  name="submit-contact"  type="submit">

                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    {{__('home.confirm_send')}}
                                </button>
                            </form>
                            <!-- End Contact form module -->

                        </div>

                        <div class="col-lg-3 offset-lg-1 col-md-4 text-right" style="margin-left: 10px;" dir="rtl">

                            <!-- contact-post-module -->
                            <div class="contact-post text-right" dir="rtl">
                                <i class="la la-map-marker"></i>
                                <div class="contact-post__content text-right" dir="rtl">
                                    <h2 class="contact-post__title text-right" dir="rtl" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 30px">
                                        {{__('home.address')}}

                                    </h2>
                                    <p class="contact-post__description">
                                        Al Khobar, Saudi Arabia
                                    </p>
                                </div>
                            </div>
                            <!-- End contact-post-module -->

                            <!-- contact-post-module -->
                            <div class="contact-post text-right" dir="rtl">
                                <i class="la la-phone"></i>
                                <div class="contact-post__content text-right" dir="rtl">
                                    <h2 class="contact-post__title" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 30px">
                                        {{__('home.phone')}}
                                    </h2>
                                    <p class="contact-post__description text-right" dir="rtl">
                                        00966544649428
                                    </p>
                                </div>
                            </div>
                            <!-- End contact-post-module -->

                            <!-- contact-post-module -->
                            <div class="contact-post text-right" dir="rtl">
                                <i class="la la-envelope"></i>
                                <div class="contact-post__content text-right" dir="rtl">
                                    <h2 class="contact-post__title text-right" dir="rtl" style="font-family: 'Microsoft Uighur' ;font-weight: bolder; font-size: 30px">
                                      {{__('home.email')}}
                                    </h2>
                                    <p class="contact-post__description text-right" dir="rtl">
                                        FALATMAH@GMAIL.COM
                                    </p>
                                </div>
                            </div>
                            <!-- End contact-post-module -->

                        </div>

                    </div>

                @endif
            </div>
@endsection

